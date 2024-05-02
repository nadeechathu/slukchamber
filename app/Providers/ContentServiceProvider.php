<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Component;
use App\Models\Configuration;
use App\Models\Element;
use App\Models\GalleryImage;
use App\Models\Membership;
use App\Models\Page;
use App\Models\Parameter;
use App\Models\Post;
use App\Models\Product;
use App\Models\SystemModule;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Http;
use View;
use App\Models\Service;
use Illuminate\Support\Facades\Schema;

class ContentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */

    public $commonContent;
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {


        $content = [];

        if(Schema::hasTable('system_modules')){

            $system_modules =  SystemModule::where('status',1)->pluck('name')->toArray();

            $content['system_modules'] = $system_modules;
        }

        $memberships = Membership::where('status', 1)->get();

        $content['membershipHeaderMenus'] = $memberships;


        $this->commonContent = $content;

        View::share('commonContent', $this->commonContent);

    }
}
