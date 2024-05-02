@extends('web.layouts.app')
@section('content')

    <div class="container-fluid ">
        <div class="row">
            <div class="col-12 px-0">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{ asset('themes/default/images/about-us/about-us-banner.png') }}" alt="SL-UK Chamber of Commerce.">
                            <div class="carousel-caption inner-caption">
                                <h1 class=" font-36 outfit-font fw-bold text-blue text-start ">Director<span class="underline"> Board</span></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach($directors as $index => $director)
    @if($index % 2 == 0)
    <div class="container-fluid py-5 light-blue"  >
        <div class="container">
            <div class="row justify-content-start align-items-center">
                <div class="col-lg-8 col-sm-8">
                    <h2 class="blue-text font-27 pb-1 fw-bolder open-sans-font">
                        {{$director->name}}
                       </h2>
                       <h4 class="blue-text font-16 fw-bolder  outfit-font pb-1">{{$director->designation}}</h4>
                       @if($director->email != null)
                       <p class="font-13 pb-3 open-sans-font fw-bolder">  <i class="fa fa-envelope font-16 pe-2 text-black"></i> <a href="mailto:{{ $director->email }}" class="text-black hoverA">{{ $director->email }}</a></p>
                       @endif
                       <p class="font-14 pb-2 open-sans-font fw-500">
                        {{$director->description}}
                       </p>
                </div>
                <div class="col-lg-3 col-sm-4 col-6 mx-auto">
                    <img src="{{ asset($director->image) }}" class="w-100 rounded-circle mx-auto" alt="SL-UK Chamber of Commerce.">
                </div>

            </div>

        </div>
    </div>
    @else
    <div class="container-fluid py-5 " >
        <div class="container">
            <div class="row justify-content-lg-end align-items-center text-lg-end">

                <div class="col-lg-3 col-sm-4  col-6 d-none d-sm-block">
                    <img src="{{ asset($director->image) }}" class="w-100 rounded-circle mx-auto" alt="SL-UK Chamber of Commerce.">
                </div>
                <div class="col-lg-8 col-sm-8">
                    <h2 class="blue-text font-27 pb-1 fw-bolder open-sans-font">
                        {{$director->name}}
                       </h2>
                       <h4 class="blue-text font-16 fw-bolder  outfit-font pb-1">{{$director->designation}}</h4>
                       @if($director->email != null)
                       <p class="font-13 pb-3 open-sans-font fw-bolder">    <i class="fa fa-envelope font-16 pe-2 text-black"></i> <a href="mailto:{{ $director->email }}" class="text-black hoverA">{{ $director->email }}</a></p>
                       @endif
                       <p class="font-14 pb-2 open-sans-font fw-500">
                        {{$director->description}}
                       </p>
                </div>
                <div class="col-lg-3 col-6 d-block d-sm-none mx-auto">
                    <img src="{{ asset($director->image) }}" class="w-100 rounded-circle mx-auto" alt="SL-UK Chamber of Commerce.">
                </div>
            </div>

        </div>
    </div>
    @endif
    @endforeach
@endsection
