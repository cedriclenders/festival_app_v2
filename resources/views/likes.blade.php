@extends('layouts.app')

@section('content')
    <div class="header header-fixed header-logo-center">
        <a href="/performances" class="header-title">Likes</a>
        <a href="/" data-back-button class="header-icon header-icon-1"><i class="fas fa-arrow-left"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-4"><i class="fas fa-lightbulb"></i></a>
    </div>
    <div class="page-content header-clear-medium">
        <div class="card card-style">
            <div class="content">
            @foreach($festival->days() as $day)
                @foreach($performances as $performance)
                    @if(Carbon\Carbon::parse($day)->format('F j') == $performance->timeslot->startDate())
                        @if($performance->isAuthUserLikedPost())
                            <h3 class="mb-3">{{ Carbon\Carbon::parse($day)->format('F j')}}</h3> 
                            @break                       
                        @endif
                    @endif
                @endforeach
                @foreach($performances as $performance)
                    @if(Carbon\Carbon::parse($day)->format('F j') == $performance->timeslot->startDate())
                        @if($performance->isAuthUserLikedPost())
                            <a href="/performance/{{$performance->id}}" class="d-flex pb-4">
                                <div class="align-self-center">
                                    <img
                                    @if($performance->performer->photos->count()) 
                                    src="{{ config('admin.admin_url') }}{{ $performance->performer->photos->first()->path }}" 
                                    @endif
                                    class="rounded-sm fit" width="50" height="50">
                                </div>
                                <div class="align-self-center ps-3">
                                    <h5 class="mb-n1">{{$performance->performer->name}}</h5>
                                    <p class="font-600 opacity-40 mb-0"><b class="text-uppercase">{{$performance->stage->name}}</b>&ensp;{{$performance->timeslot->startTime()}} - {{$performance->timeslot->endTime()}}</p>
                                </div>
                                <div class="align-self-center ms-auto">
                                    <i class="fa fa-info-circle font-24 color-highlight"></i>
                                </div>
                            </a>                                 
                        @endif
                    @endif
                @endforeach
        @endforeach
             </div>
        </div>
    </div>
@endsection