@extends('layouts.app')

@section('content')
<div class="header header-fixed header-logo-center">
        <a class="header-title">Add Marker</a>
        <a href="/markers" data-back-button class="header-icon header-icon-1"><i class="fas fa-arrow-left"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-4"><i class="fas fa-lightbulb"></i></a>
</div>
<div class="page-content header-clear-medium">
    <div class="card card-style">
        <div class="content mb-0">
            <h2>Marker info</h2>
            <p class="mb-4">
                Walk to the place where you want to add a marker. Fill in the form and press save.
            </p>
            <form method="POST" action="{{url('store-marker')}}">
                @csrf
            <div class="input-style input-style-always-active has-borders has-icon validate-field">
                <i class="fa fa-user font-12"></i>
                <input type="text" id="name" name="name" class="form-control" placeholder="Name Marker" required>
                <label for="name" class="color-blue-dark font-13">Name</label>
                <i class="fa fa-times disabled invalid color-red-dark"></i>
                <i class="fa fa-check disabled valid color-green-dark"></i>
            </div>
            <div class="input-style input-style-always-active has-borders validate-field">
                <select name="icon" id="icon">
                    <option value="/icons/wc.png">🚾&emsp;WC</option>
                    <option value="/icons/tent.png">⛺&emsp;Tent</option>
                    <option value="/icons/food.png">🍽️&emsp;Food</option>
                    <option value="/icons/drink.png">🍺&emsp;Drinks</option>
                    <option value="/icons/love.png">♥️&emsp;Love</option>
                    <option value="/icons/car.png">🚗&emsp;Car</option>
                    <option value="/icons/music.png">🎵&emsp;Music</option>
                </select>
                <label for="icon" class="color-blue-dark font-13">Icon</label>
                <i class="fa fa-times disabled invalid color-red-dark"></i>
                <i class="fa fa-check disabled valid color-green-dark"></i>
                <em>(required)</em>
            </div>
            <input style="display:none" type="text" id="long-coordinate" name="long" class="form-control" required>
            <input style="display:none" type="text" id="lat-coordinate" name="lat" class="form-control" required>
            <button  type="submit" class="btn btn-full bg-green-dark btn-m text-uppercase rounded-sm shadow-l mb-3 mt-4 font-900">Save Costum Marker</button>
            </form>
        </div>
    </div>
      
    <div class="card card-style">
        <div id="map" class="map-half"></div> 
    </div>
    
</div>

@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/location.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBrQsfEb0xqDCxuElEgT9m-HmpwzO4_bAs&callback=init" async="false" defer ></script>
@endsection