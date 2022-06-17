
    $(document).on('click','#saveLike',function(){
        var _performance=$(this).data('performance');
        var vm=$(this);
        // Run Ajax
        $.ajax({
            url:"/like-performance/"+_performance,
            type:"GET",
            dataType:'json',
            data:{
                _token:"{{ csrf_token() }}"
            },  
            complete: function() {
                vm.attr('data-type', 'dislike');
                vm.attr('id', 'saveDislike');
                vm.children().attr('class', 'fa fa-heart fa-3x color-red-dark');
            }
        });
    });
    
        $(document).on('click','#saveDislike',function(){
        var _performance=$(this).data('performance');
        var vm=$(this);
        // Run Ajax
        $.ajax({
            url:"/unlike-performance/"+_performance,
            type:"GET",
            dataType:'json',
            data:{
                _token:"{{ csrf_token() }}"
            },  
            complete: function() {
                vm.attr('data-type', 'like');
                vm.attr('id', 'saveLike');
                
                vm.children().attr('class', 'far fa-heart fa-3x color-red-dark').fadeIn('slow');
            }
        });
    });
    
    function faqFilter() {
        var input, filter, wrapper, question, a, i, txtValue;
        input = document.getElementById("faqSearch");
        filter = input.value.toUpperCase();
        wrapper = document.getElementById("questions-questionst");
        faq = wrapper.getElementsByClassName("question");
        for (i = 0; i < faq.length; i++) {
            question = faq[i].getElementsByTagName("h5")[0];
            answer = faq[i].getElementsByClassName("collapse")[0];
            txtValue = question.textContent || question.innerText;
            txtValue += answer.textContent || answer.innerText
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                faq[i].style.display = "";
            } else {
                faq[i].style.display = "none";
            }
        }
    }
    
    $("#formDaysFilter").change(function(){ 
        let amountOfDivs = $(this).children("option").length;
        let indexDay = $(this).children("option:selected").val();
        for (let i= 0; i < amountOfDivs; i++) {
            if(i == indexDay)
            {
                $("#festival-wrapper-day-"+i).show();
            }
            else
            {
                $("#festival-wrapper-day-"+i).hide();
            } 
        }   
    });
    
    /**
     * Create google maps Map instance.
     * @param {number} lat
     * @param {number} lng
     * @return {Object}
     */
     const createMap = ({ lat, lng }) => {
        return new google.maps.Map(document.getElementById('map'), {
          center: { lat, lng },
          zoom: 15
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
        return new google.maps.Marker({ map, position, icon, title });
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
            const image = "icons/walking.gif";
            const map = createMap(initialPosition);
            var marker = createMarker({ 
                map, position: initialPosition, icon: image, title: "Test", 
            });
            results = JSON.parse(results);
            for(var i = 0; i < results.length; i++) {
                var resultPosition = { lat: results[i].lat, lng: results[i].long };
                this["marker"+i] = createMarker({ 
                    map, position: resultPosition, icon: results[i].emoji_path, title: results[i].name, 
                });
           }
        
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
    

    
    
      
    
     
    