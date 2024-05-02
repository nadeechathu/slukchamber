<div class="container-fluid py-5">
    <div class="container">
       <div class="row">
          <div class="col-12">
             <h4 class="red-text font-24 fw-bolder  outfit-font pb-1">SL-UK Chamber of Commerce</h4>
             <h2 class="blue-text font-30 pb-2 fw-bolder open-sans-font">Areas we focused on</h2>
             <p class="font-15  open-sans-font fw-500">
                 Expertise in Finance, Innovation, and Community - Our service excels in diverse, impactful focus areas.
             </p>
          </div>
       </div>
       <div class="row justify-content-center">

         @foreach($services as $service)
          <div class="col-lg-4    text-center pt-lg-5 pt-3">
             <img class="d-block mx-auto hvr-grow pb-2" width="150" src="{{ asset($service->service_images->banner_image) }}" alt="SL-UK Chamber of Commerce">
              <div class="service_description p-2">
                  <div class="row align-items-center">
                      <div class="col-12">
                          <p class="font-16 fw-500  outfit-font">{{$service->title}}</p>
                      </div>
                  </div>

              </div>

          </div>
         @endforeach

       </div>
    </div>
 </div>
