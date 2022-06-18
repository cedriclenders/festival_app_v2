<div id="footer-bar" class="footer-bar-1">
    <a href="/" class="{{ Request::is('/') ? 'active-nav' : '' }}"><i class="fa fa-home"></i><span>Home</span></a>
    <a href="/performances" class="{{ Request::is('performances') ? 'active-nav' : '' }}"><i class="fa fa-music"></i><span>Performances</span></a>
    <a href="/likes" class="{{ Request::is('likes') ? 'active-nav' : '' }}"><i class="fa fa-heart"></i><span>Likes</span></a>
    <a href="/markers" class="{{ Request::is('markers') ? 'active-nav' : '' }}"><i class="fa fa-map-marker-alt"></i><span>Markers</span></a>
    <a href="/faqs" class="{{ Request::is('faqs') ? 'active-nav' : '' }}"><i class="fa fa-circle-question"></i><span>FAQ</span></a>
    <a href="#" data-menu="menu-settings"><i class="fa fa-cog"></i><span>Settings</span></a>
</div>