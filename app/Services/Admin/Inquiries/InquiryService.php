<?php

namespace App\Services\Admin\Inquiries;

//requests

use Illuminate\Http\Request;

//interfaces
use App\Interfaces\Admin\Inquiries\InquiryInterface;
use App\Models\DirectorBoard;

class InquiryService implements InquiryInterface
{

    /**
     * Display a listing of posts.
     */
    public function index(Request $request)
    {

        $directors = DirectorBoard::getAllInquiriesForFilters($request);

        $directors->appends(request()->query())->links();

        return $directors;
    }

   
}
