<?php

namespace App\Providers;


use App\Interfaces\Admin\Modules\ModuleInterface;
use App\Interfaces\Admin\Roles\RolePermissionHistoryInterface;
use App\Models\RolePermissionHistory;
use App\Services\Admin\Modules\ModuleService;
use App\Services\Admin\Roles\RolePermissionHistoryService;
use Illuminate\Support\ServiceProvider;

//admin interfaces
use App\Interfaces\Admin\Categories\CategoryImageInterface;
use App\Interfaces\Admin\Categories\CategoryInterface;
use App\Interfaces\Admin\Elements\ElementInterface;
use App\Interfaces\Admin\Configurations\ConfigurationInterface;
use App\Interfaces\Admin\Permissions\PermissionInterface;
use App\Interfaces\Admin\Posts\PostImageInterface;
use App\Interfaces\Admin\Posts\PostInterface;
use App\Interfaces\Admin\Memberships\MembershipInterface;
use App\Interfaces\Admin\Roles\RoleInterface;
use App\Interfaces\Admin\Services\ServiceImageInterface;
use App\Interfaces\Admin\Services\ServicesInterface;
use App\Interfaces\Admin\Testimonials\TestimonialInterface;
use App\Interfaces\Admin\Users\UserInterface;
use App\Interfaces\Admin\Parameters\ParameterInterface;
use App\Interfaces\Admin\Components\ComponentHasElementInterface;
use App\Interfaces\Admin\Components\ComponentInterface;
use App\Interfaces\Admin\Components\ComponentNameInterface;
use App\Interfaces\Admin\Pages\PageHasComponentInterface;
use App\Interfaces\Admin\GalleryImages\GalleryImageInterface;
use App\Interfaces\Admin\Inquiries\InquiryInterface;
use App\Interfaces\Admin\DirectorBoards\DirectorBoardInterface;

//admin services
use App\Services\Admin\Categories\CategoryImageService;
use App\Services\Admin\Categories\CategoryService;
use App\Services\Admin\Permissions\PermissionService;
use App\Services\Admin\Posts\PostImageService;
use App\Services\Admin\Posts\PostService;
use App\Services\Admin\Memberships\MembershipService;
use App\Services\Admin\Roles\RoleService;
use App\Services\Admin\Services\ServicesImageService;
use App\Services\Admin\Services\ServicesService;
use App\Services\Admin\Testimonials\TestimonialService;
use App\Services\Admin\Users\UserService;
use App\Services\Admin\Elements\ElementService;
use App\Services\Admin\Configurations\ConfigurationService;
use App\Services\Admin\Parameters\ParameterService;
use App\Services\Admin\Components\ComponentHasElementsService;
use App\Services\Admin\Components\ComponentService;
use App\Services\Admin\Pages\PageHasComponentsService;
use App\Services\Admin\GalleryImages\GalleryImageService;
use App\Services\Admin\Components\ComponentNameService;
use App\Services\Admin\Inquiries\InquiryService;
use App\Services\Admin\DirectorBoards\DirectorBoardService;

//web interfaces
use App\Interfaces\WebClient\Home\HomeInterface;
use App\Interfaces\WebClient\Pages\PageInterface;
use App\Interfaces\Mails\MailInterface;

//web services
use App\Services\WebClient\Home\HomeService;
use App\Services\WebClient\Pages\PageService;
use App\Services\Mails\MailService;


//api interfaces
use App\Interfaces\Api\V1\CategoryAPIInterface;
use App\Interfaces\Api\V1\ServiceAPIInterface;
use App\Interfaces\Api\V1\PostAPIInterface;
use App\Interfaces\Api\V1\TestimonialAPIInterface;
use App\Interfaces\Api\V1\PostCategoryAPIInterface;
use App\Interfaces\Api\V1\AuthAPIInterface;
use App\Interfaces\Api\V1\PageAPIInterface;
use App\Interfaces\Api\V1\MasterAPIInterface;
use App\Models\Inquiry;
//api services
use App\Services\Api\V1\CategoryAPIService;
use App\Services\Api\V1\ServiceAPIService;
use App\Services\Api\V1\PostAPIService;
use App\Services\Api\V1\TestimonialAPIService;
use App\Services\Api\V1\PostCategoryAPIService;
use App\Services\Api\V1\AuthAPIService;
use App\Services\Api\V1\MasterAPIService;
use App\Services\Api\V1\PageAPIService;

use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //use bootstrap pagination
        Paginator::useBootstrap();

        //admin
        $this->app->bind(PostInterface::class, PostService::class);
        $this->app->bind(PostImageInterface::class, PostImageService::class);
        $this->app->bind(MembershipInterface::class, MembershipService::class);
        $this->app->bind(InquiryInterface::class, InquiryService::class);
        $this->app->bind(DirectorBoardInterface::class, DirectorBoardService::class);
        $this->app->bind(RoleInterface::class, RoleService::class);
        $this->app->bind(UserInterface::class, UserService::class);
        $this->app->bind(ServicesInterface::class, ServicesService::class);
        $this->app->bind(ServiceImageInterface::class, ServicesImageService::class);
        $this->app->bind(TestimonialInterface::class, TestimonialService::class);
        $this->app->bind(PermissionInterface::class, PermissionService::class);
        $this->app->bind(CategoryInterface::class, CategoryService::class);
        $this->app->bind(CategoryImageInterface::class, CategoryImageService ::class);
        $this->app->bind(ElementInterface::class, ElementService ::class);
        $this->app->bind(ComponentInterface::class, ComponentService::class);
        $this->app->bind(ComponentHasElementInterface::class, ComponentHasElementsService::class);
        $this->app->bind(CategoryImageInterface::class, CategoryImageService::class);
        $this->app->bind(ConfigurationInterface::class, ConfigurationService::class);
        $this->app->bind(PageInterface::class, PageService::class);
        $this->app->bind(PageHasComponentInterface::class, PageHasComponentsService::class);
        $this->app->bind(ParameterInterface ::class, ParameterService::class);
        $this->app->bind(GalleryImageInterface::class, GalleryImageService::class);
        $this->app->bind(ModuleInterface::class, ModuleService::class);
        $this->app->bind(ComponentNameInterface::class, ComponentNameService::class);
        $this->app->bind(RolePermissionHistoryInterface::class, RolePermissionHistoryService::class);

        //web
        $this->app->bind(HomeInterface::class, HomeService::class);
        $this->app->bind(MailInterface::class, MailService::class);

        //api
        $this->app->bind(CategoryAPIInterface::class, CategoryAPIService ::class);
        $this->app->bind(PostAPIInterface::class, PostAPIService ::class);
        $this->app->bind(ServiceAPIInterface::class, ServiceAPIService ::class);
        $this->app->bind(TestimonialAPIInterface::class, TestimonialAPIService ::class);
        $this->app->bind(PostCategoryAPIInterface::class, PostCategoryAPIService ::class);
        $this->app->bind(AuthAPIInterface::class, AuthAPIService::class);
        $this->app->bind(PageAPIInterface::class, PageAPIService::class);
        $this->app->bind(MasterAPIInterface::class, MasterAPIService::class);

     }
}
