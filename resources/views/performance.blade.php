@extends('layouts.app')

@section('content')
    <div class="header header-fixed header-logo-center">
        <a class="header-title">{{$performance->performer->name}}</a>
        <a href="#" data-toggle-theme class="header-icon header-icon-4"><i class="fas fa-lightbulb"></i></a>
    </div>
    <div class="page-content header-clear-medium">
        <div class="splide single-slider slider-no-arrows slider-no-dots" id="single-slider-home">
            <div class="splide__track">
                <div class="splide__list">
                    @foreach($performance->performer->photos as $photo)
                        <div class="splide__slide">
                            <div class="card rounded-m shadow-l mx-3">
                                <div class="card-overlay bg-gradient"></div>
                                <img class="img-fluid" src="{{ config('admin.admin_url') }}{{ $photo->path }}">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div> 
        <div class="card card-style">
            <div class="content">
                {!! $performance->performer->description !!}
            </div>   
        </div>

        <div class="card card-style">
            <div class="content">          
                <h2 class="font-700">Info</h2>
                <div class="card-top m-3">
                    @if($performance->isAuthUserLikedPost())
                        <div data-performance="{{$performance->id}}" id="saveDislike" class="float-end"><i class="fa fa-heart fa-3x color-red-dark"></i></div>
                    @else
                        <div data-performance="{{$performance->id}}" id="saveLike" class="float-end"><i class="far fa-heart fa-3x color-red-dark" ></i></div>
                    @endif
                </div>  
                <div class="row mb-0">
                    <div class="col-6">
                        <div class="d-flex">
                            <div class="align-self-center">
                                <i style="width:20px" class="fa fa-calendar color-teal-dark font-23 me-3 text-center"></i>
                            </div>
                            <div class="align-self-center">
                                <span class="d-block font-10 mb-n3 pb-1 color-theme opacity-50">Date</span>
                                <strong class="d-block font-12 pb-1 color-theme">{{$performance->timeslot->startDate()}}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex">
                            <div class="align-self-center">
                                <i style="width:20px" class="fa fa-clock color-red-dark font-23 me-3 text-center"></i>
                            </div>
                            <div class="align-self-center">
                                <span class="d-block font-10 mb-n3 pb-1 color-theme opacity-50">Time</span>
                                <strong class="d-block font-12 pb-1 color-theme">{{$performance->timeslot->startTime()}} - {{$performance->timeslot->endTime()}}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-2"></div>
                    <div class="col-6">
                        <div class="d-flex">
                            <div class="align-self-center">
                                <i style="width:20px" class="fa fa-map-marker color-yellow-dark font-23 me-3 text-center"></i>
                            </div>
                            <div class="align-self-center">
                                <span class="d-block font-10 mb-n3 pb-1 color-theme opacity-50">Place</span>
                                <strong class="d-block font-12 pb-1 color-theme">{{ $performance->stage->name }}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex">
                            <div class="align-self-center">
                                <i style="width:20px" class="fa fa-music color-green-dark font-23 me-3 text-center"></i>
                            </div>
                            <div class="align-self-center">
                                <span class="d-block font-10 mb-n3 pb-1 color-theme opacity-50">Genre</span>
                                <strong class="d-block font-12 pb-1 color-theme">{{ $performance->performer->genre->name }}</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-style">
                <div class="responsive-iframe">
                    <iframe src='{{$performance->performer->youtube_link}}' frameborder='0' allowfullscreen></iframe>
                </div>
        </div>  
        <div class="card card-style">
            <iframe class="map" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBrQsfEb0xqDCxuElEgT9m-HmpwzO4_bAs&q={{$performance->stage->lat}},{{$performance->stage->long}}&zoom=16&maptype=satellite" allowfullscreen></iframe>
        </div>            
    </div>  
@endsection
    

