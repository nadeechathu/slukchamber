<?php

namespace app\Http\Controllers\Admin\Testimonials;

use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Testimonials\UpdateTestimonialRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

//requests
use App\Http\Requests\Admin\Testimonials\CreateTestimonialRequest;

//interfaces
use App\Interfaces\Admin\Testimonials\TestimonialInterface;

//models
use App\Models\Testimonial;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
{

    /**
     * Display a listing of Testimonials.
     */

    private TestimonialInterface $testimonialInterface;
    //Used services
    public function __construct(TestimonialInterface $testimonialInterface)
    {
        $this->middleware('auth');
        $this->testimonialInterface = $testimonialInterface;
    }

    /**
     * Display a listing of Testimonials.
     */
    public function index(Request $request)
    {
        try {
            if (Auth::user()->can('view-testimonials')) {

                $searchKey = $request->searchKey;

                $testimonials = $this->testimonialInterface->index($request);

                $statuses = StatusEnum::cases(); //Active statuses

                // return $testimonials;
                return view('admin.testimonials.all_testimonials', compact('testimonials', 'searchKey'));

            } else {

                return view('admin.errors.403_forbidden');
            }
        } catch (\Exception $exception) {

            return back()->with('error', $exception->getMessage());
        }
    }
    /**
     * Show the form for creating a new testimonial.
     */
    public function createUi()
    {
        if (Auth::user()->can('create-testimonials')) {

            $statuses = StatusEnum::cases(); //Active statuses

            return view('admin.testimonials.create_testimonial',compact('statuses'));

        } else {

            return view('admin.errors.403_forbidden');
        }
    }
    /**
     * Store a newly created testimonial in storage.
     */
    public function create(CreateTestimonialRequest $request)
    {
        try {
            if (Auth::user()->can('create-testimonials')) {

                DB::beginTransaction();
                //creating testimonial
                $testimonials = $this->testimonialInterface->create($request);

                DB::commit();

                return redirect()->route('admin.testimonials.all')->with('success', 'Testimonial created successfully !');

            } else {

                return view('admin.errors.403_forbidden');
            }
        } catch (\Exception $exception) {

            DB::rollBack();

            return back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function updateUi($id)
    {
        try {
            if (Auth::user()->can('edit-testimonials')) {

                $testimonial = Testimonial::find($id);

                $statuses = StatusEnum::cases(); //Active statuses

                return view('admin.testimonials.edit_testimonial', compact('testimonial','statuses'));

            } else {

                return view('admin.errors.403_forbidden');
            }
        } catch (\Exception $exception) {

            return back()->with('error', $exception->getMessage());
        }
    }
    public function update(UpdateTestimonialRequest $request, $id)
    {
        try {
            if (Auth::user()->can('edit-testimonials')) {

                DB::beginTransaction();

                //updating testimonial
                $testimonial = $this->testimonialInterface->update($request, $id);

                DB::commit();

                return redirect()->route('admin.testimonials.all')->with('success', 'Testimonial updated successfully !');

            } else {

                return view('admin.errors.403_forbidden');
            }
        } catch (\Exception $exception) {

            DB::rollBack();

            return back()->with('error', $exception->getMessage());
        }

    }
    public function destroy($slug)
    {
        try {
            if (Auth::user()->can('delete-testimonials')) {

                DB::beginTransaction();

                $testimonial = $this->testimonialInterface->destroy($slug);

                DB::commit();

                return redirect()->route('admin.testimonials.all')->with('success', 'Testimonial deleted successfully !');

            } else {

                return view('admin.errors.403_forbidden');
            }
        } catch (\Exception $exception) {

            DB::rollBack();

            return back()->with('error', $exception->getMessage());
        }

    }
}
