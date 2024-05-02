<div class="container-fluid membership-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center pb-lg-3">
                <h4 class="red-text font-24 fw-bolder  outfit-font pb-1">Become a Member</h4>
                <h2 class="blue-text font-30 pb-2 fw-bolder open-sans-font">SL-UK Chamber of Commerce</h2>
                <p class="font-15  open-sans-font fw-500">
                    Membership of the Chamber is open to any individual in business and corporate including professionals who are interested in promoting their business activities and bilateral trade between Sri Lanka and U.K.
                </p>
            </div>
        </div>
        <div class="row pt-4">

            @foreach($memberships as $membership)
            <div class="col-lg-4 col-12 text-center pb-lg-0 pb-3">
                <img class="d-block rounded-3 mx-auto w-50" src="{{ asset($membership->banner_image) }}" alt="SL-UK Chamber of Commerce">
                <h5 class="font-20 fw-bolder pt-2 pb-3  outfit-font">{{$membership->title}}</h5>
                <p class="font-14  open-sans-font fw-500 fst-italic">{{$membership->short_description}}</p>
               <div class="col-12 hvr-forward">
                <a  href="{{route('web.memberships',$membership->slug)}}" class=" blue-text">
                    <div class="row justify-content-center pt-2">

                        <div class="col-lg-4 col-sm-2 col-4  px-lg-0 ">
                           <p class="  font-16 outfit-font fw-bolder pt-1">Read More </p>
                        </div>
                        <div class="col-1 px-lg-0 px-sm-3 px-1">
                            <img class="d-block mt-1  w-100" src="{{ asset('themes/default/images/read-more-btn.png') }}" alt="SL-UK Chamber of Commerce">
                        </div>

                      </div>
                    </a>

               </div>


            </div>
            @endforeach

        </div>
    </div>
  </div>
