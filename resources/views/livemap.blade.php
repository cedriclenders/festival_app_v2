@extends('layouts.app')

@section('content')
<div class="header header-fixed header-logo-center">
        <a class="header-title">My Locations</a>
        <a href="#" data-toggle-theme class="header-icon header-icon-4"><i class="fas fa-lightbulb"></i></a>
</div>
<div class="page-content header-clear-medium">
    
    <div class="card card-style">
        <div id="map" class="map-fullscreen"></div> 
    </div>
    <div class="card card-style">
        <a href="/add-marker" class="btn shadow-bg shadow-bg-m btn-m btn-full rounded-s text-uppercase font-900 shadow-s bg-red-light">Add Marker</a>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('js/location.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBrQsfEb0xqDCxuElEgT9m-HmpwzO4_bAs&callback=init" async="false" defer ></script>
@endsection