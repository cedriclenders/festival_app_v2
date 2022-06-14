@extends('layouts.app')

@section('content')
<div class="header header-fixed header-logo-center">
    <a href="/performances" class="header-title">Performances</a>
    <a href="/" data-back-button class="header-icon header-icon-1"><i class="fas fa-arrow-left"></i></a>
    <a href="#" data-toggle-theme class="header-icon header-icon-4"><i class="fas fa-lightbulb"></i></a>
</div>
<div class="page-content header-clear-medium">
    <div class="content">
        <h2>Day</h2>
        <div class="input-style has-borders no-icon">
            <select id="formDaysFilter">
                @foreach($festival->days() as $key => $day)
                    <option value="{{$day}}">{{ Carbon\Carbon::parse($day)->format('F j')}}</option>
                @endforeach
            </select>
            <span><i class="fa fa-chevron-down"></i></span>
            <em></em>
        </div>
    </div>
    @if($performances->count())
    <div class="card card-style bg-theme pb-0">
        <div id="tab-group-1">
            <div class="tab-controls tabs-small" data-highlight="bg-blue-dark">
                <a href="#" data-active data-bs-toggle="collapse" data-bs-target="#tab-O">All</a>
                @foreach($festival->stages() as $key => $stage)
                    <a href="#" data-bs-toggle="collapse" data-bs-target="#tab-{{$key+1}}">{{ $stage->name }}</a>
                @endforeach
            </div>
                    <div data-bs-parent="#tab-group-1" class="collapse pt-3 show" id="tab-O">
                        @foreach($performances as $performance)
                            @if($performance->isAuthUserLikedPost())
                            <div class="card card-style">
                                <div data-card-height="200" class="card shadow-l mb-0" 
                                @if($performance->performer->photos->count())
                                style="background-image: url('{{ config('admin.admin_url') }}{{ $performance->performer->photos->first()->path }}')"
                                @endif>
                                    
                                    <div class="card-top m-3">
                                        @if($performance->isAuthUserLikedPost())
                                        <a class="like-button" href="/unlike-performance/{{$performance->id}}"><i class="fa fa-heart fa-3x color-red-dark float-end"></i></a>
                                        @else
                                        <a class="like-button"  href="/like-performance/{{$performance->id}}"><i class="far fa-heart fa-3x color-red-dark float-end" ></i></a>
                                        @endif
                                    </div>  
                                    
                                    <div class="card-bottom ms-3">
                                        
                                        <p class="color-white font-5 opacity-80 mb-n1"><i class="far fa-calendar"></i> {{$performance->timeslot->startDate()}} <i class="ms-3 far fa-clock"></i> {{$performance->timeslot->startTime()}} - {{$performance->timeslot->endTime()}}</p>
                                        <p class="color-white font-5 opacity-80 mb-2"><i class="fa fa-map-marker-alt"></i> {{$performance->stage->name}} </p>
                                    </div>
                                    <div class="card-overlay bg-gradient opacity-90 rounded-0"></div>
                                </div>
                            
                                <div class="content mb-0">
                                    <div class="float-start">
                                        <h2 class="mb-n1">{{$performance->performer->name}}</h2>
                                        <p class="font-3 mb-2 pb-1"><i class="fa fa-music me-2"></i> {{$performance->performer->genre->name}}</p>
                                    </div>
                                    <a href="/performance/{{ $performance->id }}" class="float-end btn bg-highlight rounded-xl shadow-xl text-uppercase font-900 font-11 mt-2">More Info</a>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                @foreach($festival->stages() as $key => $stage)
                    <div data-bs-parent="#tab-group-1" class="collapse pt-3" id="tab-{{$key+1}}">
              
                    @foreach($performances as $performance)
                    @if($performance->isAuthUserLikedPost())
                        @if($performance->stage->name == $stage->name)
                            <div class="card card-style">
                                <div data-card-height="200" class="card shadow-l mb-0" 
                                @if($performance->performer->photos->count())
                                style="background-image: url('{{ config('admin.admin_url') }}{{ $performance->performer->photos->first()->path }}')"
                                @endif>
                                    
                                    <div class="card-top m-3">
                                        @if($performance->isAuthUserLikedPost())
                                        <a class="like-button" href="/unlike-performance/{{$performance->id}}"><i class="fa fa-heart fa-3x color-red-dark float-end"></i></a>
                                        @else
                                        <a class="like-button"  href="/like-performance/{{$performance->id}}"><i class="far fa-heart fa-3x color-red-dark float-end" ></i></a>
                                        @endif
                                    </div>  
                                    
                                    <div class="card-bottom ms-3">
                                        
                                        <p class="color-white font-5 opacity-80 mb-n1"><i class="far fa-calendar"></i> {{$performance->timeslot->startDate()}} <i class="ms-3 far fa-clock"></i> {{$performance->timeslot->startTime()}} - {{$performance->timeslot->endTime()}}</p>
                                        <p class="color-white font-5 opacity-80 mb-2"><i class="fa fa-map-marker-alt"></i> {{$performance->stage->name}} </p>
                                    </div>
                                    <div class="card-overlay bg-gradient opacity-90 rounded-0"></div>
                                </div>
                            
                                <div class="content mb-0">
                                    <div class="float-start">
                                        <h2 class="mb-n1">{{$performance->performer->name}}</h2>
                                        <p class="font-3 mb-2 pb-1"><i class="fa fa-music me-2"></i> {{$performance->performer->genre->name}}</p>
                                    </div>
                                    <a href="/performance/{{ $performance->id }}" class="float-end btn bg-highlight rounded-xl shadow-xl text-uppercase font-900 font-11 mt-2">More Info</a>
                                </div>
                            </div>
                        @endif
                    @endif
                    @endforeach
                    </div>
            @endforeach
        </div>
    </div>
    @endif 
</div>   

<script>
    $("#formDaysFilter").val($("#formDaysFilter option:first").val());
</script>
@endsection