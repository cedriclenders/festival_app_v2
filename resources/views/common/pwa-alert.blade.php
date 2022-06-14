<!-- Be sure this is on your main visiting page, for example, the index.html page-->
    <!-- Install Prompt for Android -->
    <div id="menu-install-pwa-android" class="menu menu-box-bottom menu-box-detached rounded-l">
        <div class="boxed-text-l mt-4 pb-3">
            <img class="rounded-l mb-3" src="app/icons/icon-128x128.png" alt="img" width="90">
            <h4 class="mt-3">Add Sticky on your Home Screen</h4>
            <p>
                Install Sticky on your home screen, and access it just like a regular app. It really is that simple!
            </p>
            <a href="#" class="pwa-install btn btn-s rounded-s shadow-l text-uppercase font-900 bg-highlight mb-2">Add to Home Screen</a><br>
            <a href="#" class="pwa-dismiss close-menu color-gray-dark text-uppercase font-900 opacity-60 font-10 pt-2">Maybe later</a>
            <div class="clear"></div>
        </div>
    </div>   

    <!-- Install instructions for iOS -->
    <div id="menu-install-pwa-ios" 
        class="menu menu-box-bottom menu-box-detached rounded-l">
        <div class="boxed-text-xl mt-4 pb-3">
            <img class="rounded-l mb-3" src="app/icons/icon-128x128.png" alt="img" width="90">
            <h4 class="mt-3">Add {{$festival->name}} on your home screen</h4>
            <p class="mb-0 pb-0">
                Install the {{ $festival->name }} app, and access it like a regular app. Open your Safari menu and tap "Add to Home Screen".
            </p>
            <div class="clearfix pt-3"></div>
            <a href="#" class="pwa-dismiss close-menu color-highlight text-uppercase font-700">Maybe later</a>
        </div>
    </div>