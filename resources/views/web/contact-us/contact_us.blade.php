@extends('web.layouts.app')
@section('content')

    <div class="container-fluid ">
        <div class="row">
            <div class="col-12 px-0">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{ asset('themes/default/images/contact-us/contact-us-banner.png') }}" alt="SL-UK Chamber of Commerce.">
                            <div class="carousel-caption inner-caption">
                                <h1 class=" font-36 outfit-font fw-bold text-blue text-start ">CO<span class="underline">NTACT US &nbsp</span></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="container" id="contactUsDiv">
            <div class="row justify-content-center">
                <div class="col-lg-7 pb-lg-5 pb-sm-3">
                    <h3 class="text-blue fw-medium outfit-font text-center font-30 py-3">Reach out to us for any <span class="underline"> inquiry &nbsp</span></h3>
                    <div class="row">
                        <div class="col-md-12">
                            @include('web.common.alerts')
                        </div>
                    </div>
                    <form class="mb-3" method="POST" action="{{route('web.save.contact')}}">
                        @csrf
                        <div class="my-3">
                            <input type="text" class="form-control outfit-font contact-form-fields py-3" name="full_name" value="{{old('full_name')}}" required placeholder="Full Name *">
                        </div>
                        <div class="row">
                            <div class="my-3 col-md-6">
                                <input type="email" class="form-control outfit-font contact-form-fields py-3" id="email" value="{{old('inquiry_email')}}"  name="inquiry_email"  required placeholder="Your Email *">
                            </div>
                            <div class="my-3 col-md-6">
                                <input type="tel" class="form-control outfit-font contact-form-fields py-3" id="phone" oninput="this.value = this.value.replace(/[^0-9.+]/g, '').substr(0,);" name="phone"  value="{{old('phone')}}" required placeholder="Your Phone Number *">
                            </div>
                        </div>

                        <div class="my-3">
                            <input type="text" class="form-control outfit-font contact-form-fields py-3" id="subject" value="{{old('inquiry_subject')}}" name="inquiry_subject"  required placeholder="Subject *">
                        </div>
                        <div class="my-3">
                            <textarea  class="form-control outfit-font contact-form-fields py-3" name="inquiry_message" rows="7" required  placeholder="Message*">{{ old('inquiry_message') }}</textarea>
                        </div>
                        <div class="mb-3 mt-1 text-end">
                            <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_SITEKEY')}}"></div>
                   </div>
                        <button type="submit" class="py-2 rounded-2 border-0 outfit-font text-white bg-dark-blue fs-5 w-100" role="button"  id="contact-submit-btn">Submit</button>
                    </form>
                </div>



            </div>
            <div class="row justify-content-center">

            <div class="col-lg-7 col-sm-12">
                <div class="row justify-content-evenly">
                    <div class="col-lg-8 col-sm-7 mb-3">
                        <div class="row align-items-center">
                            <div class="col-lg-2 col-sm-2 col-2 text-end">
                                <img src="{{ asset('themes/default/images/contact-us/location-icon.png') }}" class="d-block w-100" alt="">
                            </div>
                            <div class="col-10">
                                <h5 class="text-blue outfit-font fw-bold fs-18">Location:</h5>
                                <p class="text-gray outfit-font font-13">
                                    85. Great Portland Street,<br>
                                    London W1W 7LT.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-5  mb-3">
                        <div class="row align-items-center">
                            <div class="col-lg-3 col-sm-2 col-2 text-end">
                                <img src="{{ asset('themes/default/images/contact-us/email-icon.png') }}" class="d-block w-100" alt="">
                            </div>
                            <div class="col-9">
                                <h5 class="text-blue outfit-font fw-bold fs-18">Email:</h5>
                                <p class="text-gray outfit-font font-13">hello@slukchamber.co.uk</p>
                            </div>
                        </div>
                    </div>



                </div>
                </div>
            </div>

        </div>
    </div>


@endsection
