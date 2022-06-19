@extends('layouts.app')

@section('content')
    <div class="header header-fixed header-logo-center">
        <h2 class="header-title" style="font-size: 20px;">{{$festival->name}}</h2>
        <a href="#" data-toggle-theme class="header-icon header-icon-4"><i class="fas fa-lightbulb"></i></a>
    </div>

    <div class="page-content header-clear-medium">
        <div class="splide single-slider slider-no-arrows slider-no-dots" id="single-slider-home">
            <div class="splide__track">
                <div class="splide__list">
                    @foreach($festival->photos as $photo)
                        <div class="splide__slide">
                            <div class="card rounded-m shadow-l mx-3">
                                <div class="card-overlay bg-gradient"></div>
                                <img class="img-fluid" src="{{ config('admin.admin_url') }}storage/{{ $photo->path }}">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div> 

        <div class="card card-style">
            <div class="content">
                {!! $festival->description !!}
            </div>
        </div>

        <div class="card card-style">
            <iframe class="map" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBrQsfEb0xqDCxuElEgT9m-HmpwzO4_bAs&q={{$festival->lat}},{{$festival->long}}&zoom=16&maptype=satellite" allowfullscreen></iframe>
        </div>
        
        <div class="card card-style mb-3">
            <div class="d-flex">
                <div class="ps-3 ms-2 align-self-center">
                    <h1 class="pt-4">Performances</h1>
                    <p class="font-11 opacity-50 mt-n2 mb-1">Discover what {{$festival->name}} has to offer for you.</p>
                    <a href="/performances" class="btn btn-m btn-half mb-3 rounded-xl text-uppercase font-900 shadow-s bg-red-light">Go</a>
                </div>
                <div class="ms-auto me-4 align-self-center">
                    <i class="fa fa-music color-yellow-light fa-4x mt-4 mb-4 pe-2"></i>
                </div>
            </div>
        </div>
    </div>  

       


    @endsection
    

