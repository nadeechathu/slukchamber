<?php

namespace app\Http\Controllers\Admin\Inquiries;

use App\Enums\CategoryTypesEnum;
use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

//requests


//interfaces
use App\Interfaces\Admin\Inquiries\InquiryInterface;

//models
use Illuminate\Support\Facades\Auth;

class InquiryController extends Controller
{
    private InquiryInterface $inquiryInterface;

    //Used services
    public function __construct(InquiryInterface $inquiryInterface)
    {
        $this->middleware('auth');
        $this->inquiryInterface = $inquiryInterface;
    }

    /**
     * Display a listing of memberships.
     */
    public function index(Request $request)
    {
        try {
            if (Auth::user()->can('view-inquiries')) {

                $searchKey = $request->searchKey;

                $inquiries = $this->inquiryInterface->index($request);

                return view('admin.inquiries.all_inquiries', compact('inquiries','searchKey'));

            } else {
                return view('admin.errors.403_forbidden');
            }
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }

    }


}
