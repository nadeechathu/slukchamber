@extends('web.layouts.app')
@section('content')

    <div class="container-fluid ">
        <div class="row">
            <div class="col-12 px-0">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{ asset('themes/default/images/events/events-banner.png') }}" alt="SL-UK Chamber of Commerce.">
                            <div class="carousel-caption inner-caption">
                                <h1 class=" font-36 outfit-font fw-bold text-blue text-start ">E<span class="underline">VENTS &nbsp</span></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="container">
            <div class="row pt-3">
                <div class="col-lg-6  col-sm-12">
                    <img src="{{ asset($event->postImages[0]->banner_image) }}" class="w-100 p-2 me-3 rounded-3 bg-white shadow"  alt="...">
                </div>
                <div class="col-lg-6 col-sm-12 pt-3">
                    <h5 class="outfit-font fw-bold font-30 pb-2 ps-2">{{$event->title}}</h5>
                    <p class="card-text open-sans-font font-13 ps-2">{{$event->description}}</p>

                    <p class="py-3 ">
                        <a href="{{ route('web.contact-us') }}" class="py-2 rounded-2 border-0 outfit-font text-white bg-dark-blue font-16 px-4   hvr-shrink">
                            Raise an Inquiry
                        </a>
                    </p>
                </div>
            </div>


            <div class="row  py-lg-5 py-sm-3 py-2">
                <div class="col-lg-3 col-sm-4 py-2">
                    <div class="row align-items-center px-lg-0 px-3">
                        <div class="col-2">
                            <img src="{{ asset('themes/default/images/events/calendar-icon.png') }}" width="25" alt="">
                        </div>
                        <div class="col-9">
                            <h5 class="outfit-font fw-bold font-18 p-0">{{$event->published_date}}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2  col-sm-4 py-2 d-none">
                    <div class="row align-items-center px-lg-0 px-3">
                        <div class="col-2">
                            <img src="{{ asset('themes/default/images/events/clock-icon.png') }}" width="25" alt="">
                        </div>
                        <div class="col-9">
                            <h5 class="outfit-font fw-bold font-18 p-0">{{$event->time}}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-sm-4 py-2 d-none">
                    <div class="row align-items-center px-lg-0 px-3">
                        <div class="col-lg-1  col-sm-2 col-2">
                            <img src="{{ asset('themes/default/images/events/location-icon.png') }}" width="25" alt="">
                        </div>
                        <div class="col-lg-11 col-sm-9 col-9">
                            <h5 class="outfit-font fw-bold font-18 p-0 text-start">{{$event->location}}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
