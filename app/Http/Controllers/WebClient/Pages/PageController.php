<?php

namespace App\Http\Controllers\WebClient\Pages;

use App\Http\Controllers\Controller;
use App\Interfaces\WebClient\Pages\PageInterface;
use App\Interfaces\Mails\MailInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\RecaptchaChecker;


//requests
use App\Http\Requests\WebClient\ContactUs\CreateContactUsRequest;
use Exception;

class PageController extends Controller
{
    private PageInterface $pageInterface;
    private MailInterface $mailInterface;

    public function __construct(PageInterface $pageInterface, MailInterface $mailInterface)
    {
       $this->pageInterface = $pageInterface;
       $this->mailInterface = $mailInterface;
    }


    public function loadAboutUs()
    {
        try{

            return view('web.about-us.about_us');

        }catch(\Exception $exception){


            return view('common.errors.error_500');
        }
    }

    public function loadDirectBoard()
    {
        try{

            $directors = $this->pageInterface->directorArchive();

            return view('web.about-us.direct_board', compact('directors'));

        }catch(\Exception $exception){

            $error = $exception->getMessage();

            return view('web.errors.error_500',compact('error'));
        }
    }



    public function loadContactUs()
    {
        try{

            return view('web.contact-us.contact_us');

        }catch(\Exception $exception){


            return view('common.errors.error_500');
        }
    }

    public function loadPrivacyPolicy()
    {
        try{

            return view('web.privacy-policy.index');

        }catch(\Exception $exception){

            $error = $exception->getMessage();

            return view('web.errors.error_500',compact('error'));
        }
    }


    public function saveContact(CreateContactUsRequest $request) {

        try {

            DB::beginTransaction();

             //creating contact
             $data = $this->pageInterface->saveContact($request);

             if($data['status']){

                $this->mailInterface->contactMail($data['payload']);

             }

             DB::commit();

             return redirect('/contact-us/#contactUsDiv')->with($data['status'] ? 'success':'error',$data['message']);

        } catch(Exception $exception) {

            DB::rollBack();

            $error = $exception->getMessage();
            // dd($exception);

            return view('web.errors.error_500',compact('error'));
        }
    }

    public function loadEvents()
    {
        try{

            $indexData = $this->pageInterface->eventArchive();

            $events = $indexData['events'];

            return view('web.events.events', compact('events'));

        }catch(\Exception $exception){


            return view('common.errors.error_500');
        }
    }
    public function loadEventSingle($slug)
    {
        try{

            $event = $this->pageInterface->singleEvent($slug);

            return view('web.events.event_single',compact('event'));

        }catch(\Exception $exception){

            return view('common.errors.error_500');
        }
    }

    public function loadMembership(Request $request)
    {
        try{

            $memberDiv = $request->s;

            $memberships = $this->pageInterface->membershipArchive();

            return view('web.memberships.index',compact('memberships', 'memberDiv'));

        }catch(\Exception $exception){

            $error = $exception->getMessage();

            return view('web.errors.error_500',compact('error'));
        }
    }
}
