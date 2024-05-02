<div class="container-fluid py-3 {{!isset($homeHeader) ? 'non_header-section':' header-section'}}">
    <div class="container">
<div class="shink-fix">
        <div class="header-div">
       <div class="row">
          <div class="col-lg-2 logo-section">
             <a href="{{ route('web.home')}}" class=" " title="SL-UK Chamber of Commerce | Home page">
             <img class="d-block " src="{{ asset('themes/default/images/logo.png') }}" alt="SL-UK Chamber of Commerce.">
             </a>
          </div>
          <div class="col-lg-10">
             <div class="row justify-content-end">
                <div class="col-lg-12">
                   <nav class="navbar navbar-expand-lg float-lg-end pt-lg-5 pt-2">
                      <button class="navbar-toggler border-white nav-mobile " type="button" data-bs-toggle="collapse"
                         data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                         aria-label="Toggle navigation">
                      <i class="fa fa-bars text-white py-1"></i>
                      </button>
                      <div class="collapse navbar-collapse nav-custom" id="navbarNav">
                         <ul class="navbar-nav">
                            <li class="nav-item me-lg-3 px-1">
                               <a class="nav-link  text-white font-15 fw-500  open-sans-font {{ request()->is('/') ? 'active' : '' }}"
                                  aria-current="page" href="{{ route('web.home')}}">Home</a>
                            </li>


                            <li class="nav-item  me-lg-3 px-1 dropdown ">
                                <a class="nav-link dropdown-toggle text-white font-15 fw-500  open-sans-font {{ request()->is('about-us') ? 'active' : '' }}"
                                   href="#" id="navbarDropdownMenuLink" role="button"
                                   data-bs-toggle="dropdown" aria-expanded="false">
                                   About Us
                                </a>

                                <ul class="dropdown-menu bg-blue  border-0" aria-labelledby="navbarDropdownMenuLink">

                                   <li><a class="dropdown-item nav-link  text-white font-13 fw-500  open-sans-font" href="{{ route('web.about-us')}}">
                                    SL-UK Chamber </a></li>
                                    <li><a class="dropdown-item  nav-link  text-white font-13 fw-500  open-sans-font" href="{{ route('web.direct-board')}}">
                                        Director Board</a></li>
                                </ul>

                             </li>


                            <li class="nav-item  me-lg-3 px-1 dropdown">
                               <a class="nav-link dropdown-toggle text-white font-15 fw-500  open-sans-font {{ request()->is('memberships') ? 'active' : '' }}"
                                  href="#" id="navbarDropdownMenuLink" role="button"
                                  data-bs-toggle="dropdown" aria-expanded="false">
                               Membership
                               </a>

                               <ul class="dropdown-menu bg-blue  border-0" aria-labelledby="navbarDropdownMenuLink">
                                 @foreach($commonContent['membershipHeaderMenus'] as $membership)
                                  <li><a class="dropdown-item nav-link  text-white font-13 fw-500  open-sans-font" href="{{ route('web.memberships',['s' => $membership->slug])}}">{{$membership->title}}</a></li>
                                 @endforeach
                               </ul>

                            </li>
                            <li class="nav-item  me-lg-3 px-1">
                               <a class="nav-link text-white font-15 fw-500  open-sans-font {{ request()->is('events') ? 'active' : '' }}"
                                  href="{{ route('web.events')}}">Events</a>
                            </li>
                            <li class="nav-item  px-lg-0 px-1 pe-0">
                               <a class="nav-link  text-white font-15 fw-500  open-sans-font {{ request()->is('contact-us') ? 'active' : '' }}"
                                  href="{{ route('web.contact-us')}}">Contact Us</a>
                            </li>
                         </ul>
                      </div>
                   </nav>
                </div>
             </div>
          </div>
        </div>
    </div>
       </div>
       <div class="row align-items-start banner-section">
          <div class="col-lg-7 padding-banner">
             <h1 class="text-white font-30 outfit-font pb-lg-4 pb-3 fw-bolder">Strengthening Bonds & Fostering Growth</h1>
             <p class="text-white font-15 open-sans-font pb-3 fw-500">We have been facilitating dynamic UK-Sri Lanka collaborations. Explore our advocacy, networking, and resource initiatives. Embrace responsible and prosperous business endeavours with us.
             </p>
             <div class="col-lg-5 col-sm-5 col-10 hvr-forward">
                <a     href="{{ route('web.about-us')}}" class="text-white">
                   <div class="row justify-content-start pt-2">
                      <div class="col-4 px-0 ">
                         <p class="  font-16 outfit-font fw-bolder pt-1"    >Read More </p>
                      </div>
                      <div class="col-1 px-0">
                         <img class="d-block mt-1  w-100" src="{{ asset('themes/default/images/read-more-btn.png') }}" alt="SL-UK Chamber of Commerce">
                      </div>
                   </div>
                </a>
             </div>
          </div>
       </div>
    </div>
 </div>
