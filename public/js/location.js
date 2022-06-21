/**
     * Create google maps Map instance.
     * @param {number} lat
     * @param {number} lng
     * @return {Object}
     */
   const createMap = ({ lat, lng }) => {
    return new google.maps.Map(document.getElementById('map'), {
      center: { lat, lng },
      zoom: 17,
      mapTypeId: google.maps.MapTypeId.ROADMAP, 
      styles: [ 
        { 
          "featureType": "poi", 
          "stylers": [ 
            { "visibility": "off" } 
          ] 
        } 
      ] 
    });
  };
  
  /**
   * Create google maps Marker instance.
   * @param {Object} map
   * @param {Object} position
   * @param {Object} icon
   * @param {Object} title
   * @return {Object}
   */
  const createMarker = ({ map, position, icon, title }) => {
    return new google.maps.Marker({ map, position, icon, title});
  };

  const createMarkerWithLabel = ({ map, position, title, label }) => {
    return new google.maps.Marker({ map, position, title, label});
  };
  /**
   * Track the user location.
   * @param {Object} onSuccess
   * @param {Object} [onError]
   * @return {number}
   */
  const trackLocation = ({ onSuccess, onError = () => { } }) => {
    if ('geolocation' in navigator === false) {
      return onError(new Error('Geolocation is not supported by your browser.'));
    }
  
    return navigator.geolocation.watchPosition(onSuccess, onError, {
      enableHighAccuracy: true,
      timeout: 5000,
      maximumAge: 0
    });
  };
  
  /**
   * Get position error message from the given error code.
   * @param {number} code
   * @return {String}
   */
  const getPositionErrorMessage = code => {
    switch (code) {
      case 1:
        return 'Permission denied.';
      case 2:
        return 'Position unavailable.';
      case 3:
        return 'Timeout reached.';
    }
  }
  
  /**
   * Initialize the application.
   * Automatically called by the google maps API once it's loaded.
  */

 function init() {

    $.ajax(
        {
            url: "/getMarkerData",
            type: 'GET',
            dataType: 'text',
            success: function (results) {
                
                initialize(results);
            }
        });

    function initialize(results) { 
     
        const initialPosition = { lat: 59.32, lng: 17.84 };
        
        const map = createMap(initialPosition);

      
        var marker = createMarker({ 
            map, position: initialPosition, icon: {
              path: google.maps.SymbolPath.CIRCLE,
              scale: 10,
              fillOpacity: 1,
              strokeWeight: 3,
              fillColor: '#5384ED',
              strokeColor: '#ffffff',
            }, title: "Test", 
            
        });
       
        results = JSON.parse(results);
        for(var i = 0; i < results.length; i++) {
            var resultPosition = { lat: results[i].lat, lng: results[i].long };
            this["marker"+i] = createMarker({ 
                map, position: resultPosition, icon: results[i].emoji_path, title: results[i].name,
            });
       }

       $.ajax(
        {
            url: "/getStagesData",
            type: 'GET',
            dataType: 'text',
            success: function (results) {
              results = JSON.parse(results);
              for(var i = 0; i < results.length; i++) {
                  var resultPosition = { lat: parseFloat(results[i].lat), lng: parseFloat(results[i].long) };
                  this["marker"+i] = createMarkerWithLabel({ 
                      map, position: resultPosition,title: results[i].name,label: {
                        text: results[i].name,
                        fontSize: '18px',
                        color: "#222222",
                      },  
                  });
             }
            
            }
        });
    
    const $long = document.getElementById('long-coordinate');
    const $lat = document.getElementById('lat-coordinate');
  
    let watchId = trackLocation({
      onSuccess: ({ coords: { latitude: lat, longitude: lng } }) => {
        marker.setPosition({ lat, lng });     
        map.panTo({ lat, lng });
        if( $long ) {
            $long.setAttribute('value', lng);
          }
        if ($lat) {
            $lat.setAttribute('value', lat);
        }
      }
    });
    }   
};