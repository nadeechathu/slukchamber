<div class="container-fluid py-5 news-section">
    <div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h4 class="red-text font-24 fw-bolder  outfit-font pb-1">Events</h4>
            <h2 class="blue-text font-30 pb-2 fw-bolder open-sans-font">Upcoming & Past Events</h2>
            <p class="font-15  open-sans-font fw-500">
                Elevate your business connections with the Sri Lanka-UK Chamber of Commerce. Explore advocacy, networking, and resources for prosperous collaborations.
            </p>
        </div>
    </div>

<div class="row pt-4">
    <div class="event-Carousel owl-carousel">

        @foreach($events as $event)
        <div class="item ">
        <a   href="{{route('web.events.event-single',$event->slug)}}" class="hvr-shrink">
            <img class="d-block rounded-3" src="{{ asset($event->postImages[0]->banner_image) }}" alt="SL-UK Chamber of Commerce">
<h4 class="text-center  blue-text font-20 pt-3 pb-2 fw-bolder open-sans-font" >{{$event->title}}</h4>
        </a>
        </div>
        @endforeach

    </div>




</div>




      </div>
  </div>
@if(count($news) <= 0)
<div class="border-5 border-bottom border-light p-0 m-0">&nbsp</div>
@endif