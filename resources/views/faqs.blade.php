@extends('layouts.app')

@section('content')
    <div class="header header-fixed header-logo-center">
        <a class="header-title">FAQ</a>
        <a href="#" data-toggle-theme class="header-icon header-icon-4"><i class="fas fa-questionghtbulb"></i></a>
    </div>

    <div class="page-content header-clear-medium">
        <div class="search-box search-header bg-theme card-style me-3 ms-3">
            <i class="fa fa-search"></i>
            <input type="text" id="faqSearch" onkeyup="faqFilter()" class="border-0" placeholder="What are you looking for? ">
            <a href="#" class="clear-search disabled mt-0"><i class="fa fa-times color-red-dark"></i></a>
        </div>

        
        <div class="card card-style">      
            <div class="content">
                <h1>Questions</h1>
                
                <div id="questions-questionst">
                @foreach($faqs as $key => $faq)
                    <div class="question">
                        <div class="divider mt-3 mb-3"></div>
                            <h5 href="#FAQ{{$key}}" data-bs-toggle="collapse" role="button" class="font-600">
                                {{$faq->question}}
                                <i class="fa fa-angle-down float-end me-2 mt-1 opacity-50 font-10"></i>
                            </h5>
                        <div class="collapse" id="FAQ{{$key}}">
                            {!!$faq->answer!!}
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>  
 


    @endsection
    

