
<div id="jsScroll" class="scroll visible" onclick="scrollToTop();">
    <i class="fa fa-chevron-up icon-bottom"></i>
    </div>

<div class="container-fluid footer-section pt-5 pb-4">
    <div class="container">
       <div class="row">
          <div class="col-lg-3">
             <a href="{{ route('web.home')}}" class="hvr-grow" title="SL-UK Chamber of Commerce | Home page">
             <img class="d-block" src="{{ asset('themes/default/images/footer-logo.png') }}" alt="SL-UK Chamber of Commerce.">
             </a>
             <p class="pt-2 font-14 fw-500 open-sans-font black-text">
                 The Sri Lanka-United Kingdom Chamber of Commerce in London (SL-UKCC) was established in October 2021, as a member-based trade group to facilitate and promote business activities between the UK and Sri Lanka via platforms of networking and industry advocacy.
             </p>
          </div>
          <div class="col-lg-2 col-sm-4  pt-lg-0 pt-sm-0 pt-3">
             <h4 class="py-lg-4 py-sm-4 py-2 font-20 fw-bold open-sans-font">Quick links</h4>
             <ul>
                <li class="pb-2"><a class="font-15 fw-bolder open-sans-font black-text hover-A" href="{{ route('web.home')}}">Home</a></li>
                <li class="pb-2"><a class="font-15 fw-bolder open-sans-font black-text hover-A" href="{{ route('web.about-us')}}">About Us</a></li>
               @if(count($commonContent['membershipHeaderMenus']) > 0)
                <li class="pb-2"><a class="font-15 fw-bolder open-sans-font black-text hover-A" href="{{ route('web.memberships',['s' => $commonContent['membershipHeaderMenus'][0]->slug])}}">Membership</a></li>
               @endif
                <li class="pb-2"><a class="font-15 fw-bolder open-sans-font black-text hover-A" href="{{ route('web.events')}}">Events</a></li>
                <li class="pb-2"><a class="font-15 fw-bolder open-sans-font black-text hover-A" href="{{ route('web.contact-us')}}">Contact Us</a></li>
             </ul>
          </div>
          <div class="col-lg-3 col-sm-4">
             <h4 class="py-lg-4 py-sm-4 py-2 font-20 fw-bold open-sans-font">Memberships</h4>
             <ul>
                 @foreach($commonContent['membershipHeaderMenus'] as $membership)
                     <li class="pb-2"><a class="font-15 fw-bolder open-sans-font black-text hover-A" href="{{route('web.memberships',['s' => $membership->slug])}}">{{$membership->title}}</a></li>
                 @endforeach
                </ul>
          </div>
          <div class="col-lg-2 col-sm-4">
             <h4 class="py-lg-4 py-sm-4 py-2 font-20 fw-bold open-sans-font">Legal</h4>
             <ul>
                <li class="pb-2"><a class="font-15 fw-bolder open-sans-font black-text hover-A" href="{{ route('web.privacy-policy')}}">Privacy Policy</a></li>
                {{-- <li class="pb-2"><a class="font-15 fw-bolder open-sans-font black-text hover-A" href="">Terms and Conditions</a></li>
                <li class="pb-2"><a class="font-15 fw-bolder open-sans-font black-text hover-A" href="">Support Policy</a></li> --}}
             </ul>
          </div>
          <div class="col-lg-2 col-sm-6">
             <h4 class="py-lg-4 py-sm-4 py-2 font-20 fw-bold open-sans-font">Contact us</h4>


{{--              contact number --}}


{{--             <div class="row pb-lg-3 pb-sm-2 pb-1">--}}
{{--                <div class="col-1">--}}
{{--                   <i class="fa fa-phone font-phone  text-black"></i>--}}
{{--                </div>--}}
{{--                <div class="col-10">--}}
{{--                   <p class="font-14 fw-bolder open-sans-font text-black"> <a class="text-black hoverA" href="tel:+94 777 7777--}}
{{--                      ">+44 000 000 00--}}
{{--                      </a>--}}
{{--                   </p>--}}
{{--                </div>--}}
{{--             </div>--}}


             <div class="row pb-lg-3 pb-sm-2 pb-1">
                <div class="col-1">
                   <i class="fa fa-envelope font-16 pe-2 text-black"></i>
                </div>
                <div class="col-10">
                   <p class="font-14 fw-bolder open-sans-font text-black"> <a class="text-black hoverA" href="mailto:hello@slukchamber.co.uk">hello@slukchamber.co.uk</a>
                   </p>
                </div>
             </div>
             <div class="row pb-2">
                <div class="col-1">
                   <i class="fa fa-map-marker icon-size  text-black"></i>
                </div>
                <div class="col-10">
                   <p class="font-13 fw-bolder open-sans-font text-black">85. Great Portland Street,<br>
                    London W1W 7LT.
                   </p>
                </div>
             </div>
             <div class="pt-3 ">
                <a class="social-button text-black hvr-wobble-bottom" href="#" target="_blank">
                <i class="fab fa-facebook-f font-14 "></i>
                </a>
                <a class="social-button text-white hvr-wobble-bottom" href="#" target="_blank">
                <i class="fab fa-instagram font-14 text-black"></i>
                </a>
                <a class="social-button text-white hvr-wobble-bottom" href="https://www.linkedin.com/company/sri-lanka-united-kingdom-chamber-of-commerce/" target="_blank">
                <i class="fab fa-linkedin font-14 text-black"></i>
                </a>
                <a class="social-button text-white hvr-wobble-bottom" href="#" target="_blank">
                <i class="fab fa-youtube font-14 text-black"></i>
                </a>
             </div>
          </div>
       </div>
       <div class="row pt-lg-4 pt-3">
          <div class="col-lg-8">
             <p class="text-lg-start text-center font-13 fw-bolder open-sans-font text-black">Copyright © <?php echo date('Y'); ?> SL-UK Chamber of Commerce. All Rights Reserved | Company registration Number: 13632442</p>
          </div>
          <div class="col-lg-4">
             <p class="text-lg-end text-center font-13 fw-bolder open-sans-font">Design & Developed by <a href="https://www.informationedge.com/" target="_blank" class="text-black hover-A">Information Edge
                </a>
             </p>
          </div>
       </div>
    </div>
 </div>
