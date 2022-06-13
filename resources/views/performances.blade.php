@extends('layouts.app')

@section('content')
<div class="header header-fixed header-logo-center">
    <a href="index.html" class="header-title">Performances</a>
    <a href="#" data-back-button class="header-icon header-icon-1"><i class="fas fa-arrow-left"></i></a>
    <a href="#" data-toggle-theme class="header-icon header-icon-4"><i class="fas fa-lightbulb"></i></a>
</div>
<div class="page-content header-clear-medium">

    @foreach($performances as $performance)
    <div class="card card-style">
        <div data-card-height="200" class="card shadow-l mb-0" style="background-image: url('{{ config('admin.admin_url') }}{{ $performance->performer->photos->first()->path }}')">
            <div class="card-top m-3">
                <i class="fa fa-heart fa-3x color-red-dark float-end"></i>
                <i class="far fa-heart fa-3x color-red-dark float-end"></i>
            </div>
            
            <div class="card-bottom ms-3">
                
                <p class="color-white font-5 opacity-80 mb-n1"><i class="far fa-calendar"></i> {{$performance->timeslot->startDate()}} <i class="ms-3 far fa-clock"></i> {{$performance->timeslot->startTime()}} - {{$performance->timeslot->endTime()}}</p>
                <p class="color-white font-5 opacity-80 mb-2"><i class="fa fa-map-marker-alt"></i> {{$performance->stage->lat}}, {{$performance->stage->long}} </p>
            </div>
            <div class="card-overlay bg-gradient opacity-90 rounded-0"></div>
        </div>
        <div class="content mb-0">
            <div class="float-start">
                <h2 class="mb-n1">{{$performance->performer->name}}</h2>
                <p class="font-3 mb-2 pb-1"><i class="fa fa-music me-2"></i> {{$performance->performer->genre->name}}</p>
            </div>
            <a href="/performance/{{ $performance->id }}" class="float-end btn btn-s bg-highlight rounded-xl shadow-xl text-uppercase font-900 font-11 mt-2">More Info</a>
        </div>
    </div>
    @endforeach

</div>   
@endsection