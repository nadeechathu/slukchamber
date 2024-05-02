<?php

namespace App\Http\Controllers\WebClient\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\WebClient\Home\HomeInterface;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private HomeInterface $homeInterface;

    public function __construct(HomeInterface $homeInterface)
    {
       $this->homeInterface = $homeInterface;
    }

    /**
     * Show the application homepage
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        try{
            $homeHeader = 1;

            $indexData = $this->homeInterface->index();

            $memberships = $indexData['memberships'];
            $services = $indexData['services'];
            $events = $indexData['events'];
            $news = $indexData['news'];

            return view('web.home.home',compact('homeHeader', 'memberships', 'services', 'events', 'news'));

        }catch(\Exception $exception){
 
            $error = $exception->getMessage();

            return view('web.errors.error_500',compact('error'));
        }
    }
}
