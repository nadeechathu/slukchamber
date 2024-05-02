<?php

namespace App\Services\Admin\Testimonials;

//requests

use App\Enums\StatusEnum;
use App\Http\Requests\Admin\Testimonials\CreateTestimonialRequest;
use App\Http\Requests\Admin\Testimonials\UpdateTestimonialRequest;
use Illuminate\Http\Request;

//models
use App\Models\Testimonial;

//interfaces
use App\Interfaces\Admin\Testimonials\TestimonialInterface;

class TestimonialService implements TestimonialInterface
{
    /**
     * Display a listing of testimonials.
     */
    public function index(Request $request)
    {
        $testimonials = Testimonial::getAllTestimonialsForFilters($request);
        $testimonials->appends(request()->query())->links();
        return $testimonials;
    }
    /**
     * Show the form for creating a new testimonial.
     */
    public function createUi()
    {
        
    }
    /**
     * Store a newly created testimonial in storage.
     */
    public function create(CreateTestimonialRequest $request)
    {
        $testimonial = new Testimonial();
        $testimonial->title = $request->title;
        $testimonial->description = $request->description;
        $testimonial->slug = $request->slug;
        $testimonial->user_id = 1; //TODO . change 1 to  $request->user_id;
        $testimonial->status = $request->status;
        $testimonial->save();
        return $testimonial;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function updateUi(Request $id)
    {
        $testimonial = Testimonial::find($id);
        return $testimonial;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTestimonialRequest $request, $id)
    {
        $testimonial = Testimonial::find($id);
        $testimonial->title = $request->title;
        $testimonial->description = $request->description;
        $testimonial->slug = $request->slug;
        // $testimonial->user_id = $request->user_id;//set user_id to update user in testimonial
        $testimonial->status = $request->status;
        $testimonial->save();

        return $testimonial;
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $deletedCount = Testimonial::where('slug', $slug)->delete();
        return $deletedCount;
    }

}
