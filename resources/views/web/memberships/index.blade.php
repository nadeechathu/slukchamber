@extends('web.layouts.app')
@section('content')

    {{-- <div class="container-fluid h-100 member-banner d-flex align-items-center">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <h1 class="banner-heading outfit-font fw-bold text-blue text-start pt-lg-5">Memb<span class="underline">ership</span></h1>
                </div>
            </div>
        </div>
    </div> --}}



    <div class="container-fluid ">

            <div class="row">
                <div class="col-12 px-0">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img class="d-block w-100" src="{{ asset('themes/default/images/membership/membership-banner.jpg') }}" alt="SL-UK Chamber of Commerce.">
                            <div class="carousel-caption inner-caption">
                                <h1 class=" font-36 outfit-font fw-bold text-blue text-start ">Memb<span class="underline">ership</span></h1>
                              </div>
                          </div>

                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">

                      </div>
                </div>
            </div>


    </div>

    <div class="container-fluid1">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="font-15 pb-2 open-sans-font fw-medium text-center pt-4">Membership of the Chamber is open to any individual in business and corporate including professionals who are interested in promoting their business activities and bilateral trade between Sri Lanka and U.K.</p>
                    <p class="font-15 pb-2 open-sans-font fw-medium text-center pt-3 pb-4">As a paid up Member you will be able to promote and develop your business, network and acquire contacts and clients through events held by the chamber and gain insights and promote your business/platform through marketing and branding.</p>
                </div>
            </div>
        </div>
    </div>


<input type="hidden" value="{{$memberDiv}}" id="scrollToElement">

    @foreach($memberships as $index => $membership)
    @if($index % 2 == 0)
    <div class="container-fluid py-4 light-blue" id="membership-{{ $membership->slug }}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                   <h2 class="blue-text font-30 pb-2 fw-bolder open-sans-font">
                    {{$membership->title}}
                   </h2>
                   <h3 class="red-text font-24 pb-2 fw-bolder open-sans-font">
                    {{$membership->price}}
                   </h3>
                   <p class="font-15 pb-2 open-sans-font fw-500">
                    {{$membership->description}}
                   </p>
                    <button type="button" class="py-2 hvr-forward px-3 rounded-2 border-0 outfit-font text-white bg-dark-blue fs-5"><a href="{{ asset($membership->pdf_file) }}" target="_blank" download class="text-white">Download the Application</a></button>
                </div>
            </div>

        </div>
    </div>
    @else
    <div class="container-fluid py-4 bg-white" id="membership-{{ $membership->slug }}">
        <div class="container">
            <div class="row">
                <div class="col-12 text-lg-end">
                   <h2 class="blue-text font-30 pb-2 fw-bolder open-sans-font">
                   {{$membership->title}}
                   </h2>
                    <h3 class="red-text font-24 pb-2 fw-bolder open-sans-font">
                        {{$membership->price}}
                    </h3>
                   <p class="font-15 pb-2 open-sans-font fw-500">
                   {{$membership->description}}
                   </p>
                   <button type="button" class="py-2 hvr-forward px-3 rounded-2 border-0 outfit-font text-white bg-dark-blue fs-5"><a href="{{ asset($membership->pdf_file) }}" target="_blank" download class="text-white">Download the Application</a></button>
                </div>
            </div>

        </div>
    </div>




    @endif
   @endforeach
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="font-15 pb-2 open-sans-font text-center fw-medium">Once you have completed the application to join, please scan and send it to: <span class="fw-bold"><a
                                href="mailto:secretary@slukchamber.co.uk">secretary@slukchamber.co.uk</a></span></p>
                </div>
            </div>
        </div>
    </div>

@endsection


