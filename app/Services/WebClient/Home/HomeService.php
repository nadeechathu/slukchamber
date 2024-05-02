<?php

namespace App\Services\webClient\Home;

use App\Enums\CategoryTypesEnum;
use Illuminate\Http\Request;

//interfaces
use App\Interfaces\WebClient\Home\HomeInterface;
use App\Models\DirectorBoard;
use App\Models\Membership;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Service;

class HomeService implements HomeInterface
{

    /**
     * Display a listing of posts.
     */
    public function index()
    {

        $memberships = Membership::where('status', 1)->get();
        
        $services = Service::with('service_images')->where('status', 1)->get();

        $events = Post::with('categories','postImages')
        ->whereHas('categories',function($query) {

            $query->where('categories.type',CategoryTypesEnum::EVENTS);

        })
        ->where('is_featured', 1)
        ->where('status', 1)
        ->orderBy('published_date', 'DESC')
        ->get();

        $news = Post::with('categories','postImages')
        ->whereHas('categories',function($query) {

            $query->where('categories.type',CategoryTypesEnum::NEWS);

        })
        ->where('is_featured', 1)
        ->where('status', 1)
        ->orderBy('published_date', 'DESC')
        ->get();

       

        $data = [
        
            'memberships' => $memberships,
            'services' => $services,
            'events' => $events,
            'news' => $news
        ];

        return $data;
    }

}
