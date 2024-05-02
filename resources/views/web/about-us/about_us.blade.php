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
                                <h1 class=" font-36 outfit-font fw-bold text-blue text-start ">A<span class="underline">BOUT US &nbsp</span></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-lg-5 py-sm-2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 col-sm-12">
                    <h3 class="text-blue outfit-font font-30 py-3">Welcome to SL-UK Chamber of <span class="underline">Commerce</span></h3>
                    <p class="open-sans-font font-15 pb-3">The Sri Lanka-United Kingdom Chamber of Commerce in London (SL-UKCC) was established in October 2021, as a member-based trade group to facilitate and promote business activities between the UK and Sri Lanka via platforms of networking and industry advocacy.</p>
                    <p class="open-sans-font font-15 pb-3">The Chamber maintains close relations with relevant industry bodies, business enterprises and government representatives. It also aims to work with professionals who have an interest in commerce, industry, trade, services, transport and education.</p>
                </div>
                <div class="col-lg-4 col-sm-6 mx-sm-auto">
                    <img src="{{ asset('themes/default/images/about-us/flags1.png') }}" class="w-100" alt="">
                </div>
            </div>
        </div>
    </div>



    <div class="container-fluid py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="row">
                        <div class="col-lg-3 col-sm-3 p-lg-4 p-2">
                            <div class="red-border">
                                <h1 class="outfit-font text-small-center font-44 fw-bolder">3+</h1>
                                <p class="outfit-font text-small-center font-16 fw-light">Years Experience</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-3 p-lg-4 p-2">
                            <div class="red-border-2">
                                <h1 class="outfit-font text-small-center font-44 fw-bolder">500+</h1>
                                <p class="outfit-font text-small-center font-16 fw-light">Positive Reviews</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-3 p-lg-4 p-2">
                            <div class="red-border">
                                <h1 class="outfit-font text-small-center font-44 fw-bolder">200+</h1>
                                <p class="outfit-font text-small-center font-16 fw-light">Trusted Partners</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-3 p-lg-4 p-2">
                            <div class="">
                                <h1 class="text-small-center outfit-font font-44 fw-bolder">80%</h1>
                                <p class="text-small-center outfit-font font-16 fw-light">Early Goal Achievements</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
