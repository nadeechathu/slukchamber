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
   <div class="row">
      <div class="col-12">
         <h3 class="text-blue fw-medium outfit-font font-30 py-3">All <span class="underline"> Events &nbsp</span></h3>
      </div>
   </div>
   <div class="row">
      @foreach($events as $event)
      <div class="col-lg-3 col-sm-6 event-row">
         <div class="card hvr-shadow hover-grow border-0 shadow-sm hvr-shadow">
            <img src="{{ asset($event->postImages[0]->banner_image) }}" class="card-img-top p-2 rounded" alt="...">
            <div class="card-body p-2">
               <h5 class="card-title pt-0 outfit-font fw-bold font-16">{{ ucwords(substr($event->title, 0, 50))  }} {{strlen($event->title) > 50 ? '...':''}}</h5>
               <p class="card-text open-sans-font font-12">{{ substr($event->short_description, 0, 170) }} {{strlen($event->short_description) > 170 ? '...':''}}</p>
               <div class="row py-2 align-items-center">
                  <div class="col-12">
                     <a href="{{ route('web.events.event-single', ['slug' => $event->slug])}}" class="outfit-font fw-bold font-16 text-blue">Find Out More<img src="{{ asset('themes/default/images/events/arrow-icon.png') }}" class="ps-3" alt=""></a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      @endforeach
      {{-- <div class="row justify-content-center align-items-center py-4">
         <div class="col-6">
            <button class="py-2 rounded-2 border-0 outfit-font text-white bg-dark-blue font-14 w-100" role="button"  id="">View All Events </button>
         </div>
      </div> --}}
   </div>
</div>
</div>
@endsection
