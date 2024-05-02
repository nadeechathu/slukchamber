<?php

namespace App\Services\webClient\Pages;

use App\Enums\CategoryTypesEnum;
use App\Http\Requests\WebClient\ContactUs\CreateContactUsRequest;
use Illuminate\Http\Request;

//interfaces
use App\Interfaces\WebClient\Pages\PageInterface;
use App\Mail\ContactEmail;
use App\Models\DirectorBoard;
use App\Models\Inquiry;
use App\Models\Membership;
use App\Models\Post;
use App\Models\RecaptchaChecker;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Scalar\MagicConst\Dir;

class PageService implements PageInterface
{

    /**
     * Display a listing of events.
     */
    public function eventArchive()
    {

        $events = Post::with('categories','postImages')
        ->whereHas('categories',function($query) {

            $query->where('categories.type',CategoryTypesEnum::EVENTS);

        })
        ->orderBy('published_date', 'DESC')
        ->get();

        $data = [

            'events' => $events
        ];

        return $data;
    }


    public function singleEvent($slug) {

        $event = Post::with('categories','postImages')
        ->where('slug', $slug)
        ->first();

        return $event;

    }


    public function membershipArchive()
    {
        $memberships = Membership::where('status', 1)->get();

        return $memberships;
    }

    public function saveContact(CreateContactUsRequest $request) {



        $input = $request->all();

        $recaptchaCheckResponse = RecaptchaChecker::checkRecaptchaVaidity($input['g-recaptcha-response']);


        if($recaptchaCheckResponse != null){

            if(!$recaptchaCheckResponse['success']){

                return array(
                    'status' => false,
                    'message' => 'Please mark recaptcha security checks and try again',
                    'payload' => null
                );
            }

            $inquiry = new Inquiry;

            $inquiry->full_name = $request->full_name;
            $inquiry->inquiry_email = $request->inquiry_email;
            $inquiry->phone = $request->phone;
            $inquiry->inquiry_subject = $request->inquiry_subject;
            $inquiry->inquiry_message = $request->inquiry_message;
            $inquiry->status = 1;

            $savedInquiry = Inquiry::create($inquiry->toArray());

            return array(
                'status' => true,
                'message' => 'Inquiry submitted successfully !',
                'payload' => $savedInquiry
            );

        }else{

            return array(
                'status' => false,
                'message' => 'Something went wrong. Please try again shortly',
                'payload' => null
            );
        }

    }

    public function directorArchive()
    {
        $directors = DirectorBoard::where('status', 1)->get();

        return $directors;
    }

}
