@if(count($news) > 0)
<div class="container-fluid py-5">
    <div class="container">
       <div class="row">
        <div class="col-lg-7">
            <h4 class="red-text font-24 fw-bolder  outfit-font pb-1">News</h4>
            <h2 class="blue-text font-30 pb-2 fw-bolder open-sans-font">Our Latest News</h2>
            <p class="font-15 blue-text open-sans-font fw-500">
                Stay informed with the latest updates on UK-Sri Lanka collaborations. Discover impactful news shaping the business landscape in our news section.
            </p>
        </div>
       </div>


<div class="row ">
    <div class="news-Carousel owl-carousel">

        @foreach($news as $newsOne)
        <div class="item p-2 rounded-3 mt-3 mb-5 border-1 border-dark shadow-sm ">
          <a href="" class="hvr-shrink blue-text">
            <img class="d-block rounded-3" src="{{ asset($newsOne->postImages[0]->banner_image) }}" alt="SL-UK Chamber of Commerce">
            <h4 class="font-16  open-sans-font fw-bold pt-2 pb-2">{{$newsOne->title}}</h4>
            <p class="text-gray font-14 fw-light">
                {{$newsOne->short_description}}
            </p>
            <div class="row py-3">
                <div class="col-2">
                    <img class="d-block w-65 " src="{{ asset('themes/default/images/calender.png') }}" alt="SL-UK Chamber of Commerce">
                </div>
                <div class="col-10 px-0">
                    <p class="font-15 open-sans-font fw-bolder pt-lg-1">{{ $newsOne->published_date }}</p>
                </div>
            </div>
          </a>

        </div>
        @endforeach

    </div>
</div>

      </div>
  </div>
@endif