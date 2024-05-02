<?php

use App\Http\Controllers\Admin\Categories\CategoryController;
use App\Http\Controllers\Admin\Components\ComponentController;
use App\Http\Controllers\Admin\Elements\ElementController;
use App\Http\Controllers\Admin\Configurations\ConfigurationController;
use App\Http\Controllers\Admin\GalleryImages\GalleryImageController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\Modules\SystemModuleController;
use App\Http\Controllers\Admin\Pages\PageController;
use App\Http\Controllers\Admin\Pages\PageHasComponentsController;
use App\Http\Controllers\Admin\Permissions\PermissionController;
use App\Http\Controllers\Admin\Posts\PostController;
use App\Http\Controllers\Admin\Memberships\MembershipController;
use App\Http\Controllers\Admin\Inquiries\InquiryController;
use App\Http\Controllers\Admin\Roles\RoleController;
use App\Http\Controllers\Admin\Services\ServicesController;
use App\Http\Controllers\Admin\Testimonials\TestimonialController;
use App\Http\Controllers\Admin\Users\UserController;
use App\Http\Controllers\Admin\Parameters\ParameterController;
use App\Http\Controllers\Admin\DirectorBoards\DirectorBoardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::group(['prefix'=>'admin'], function(){
    Route::get('/login', function () {
        return view('auth.login');
    });

    Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
    Route::get('/profile', [UserController::class, 'profile'])->name('admin.profile');

    //Roles
    Route::get('/roles', [RoleController::class, 'index'])->name('admin.roles.all');
    Route::get('/roles/create', [RoleController::class, 'createUi'])->name('admin.roles.new');
    Route::post('/roles/create', [RoleController::class, 'create'])->name('admin.roles.create');
    Route::get('/roles/update/{id}', [RoleController::class, 'updateUi'])->name('admin.roles.edit');
    Route::put('/roles/update/{id}', [RoleController::class, 'update'])->name('admin.roles.update');
    Route::get('/roles/delete/{id}', [RoleController::class, 'destroy'])->name('admin.roles.delete');

    //Configurations
    Route::get('/configurations', [ConfigurationController::class, 'index'])->name('admin.configurations.all');
    Route::post('/configurations/create', [ConfigurationController::class, 'create'])->name('admin.configurations.create');
    Route::put('/configurations/update/{id}', [ConfigurationController::class, 'update'])->name('admin.configurations.update');
    Route::get('/configurations/delete/{id}', [ConfigurationController::class, 'destroy'])->name('admin.configurations.delete');

    //Permissions
    Route::get('/permissions', [PermissionController::class, 'index'])->name('admin.permissions.all');
    Route::get('/permissions/create', [PermissionController::class, 'createUi'])->name('admin.permissions.new');
    Route::post('/permissions/create', [PermissionController::class, 'create'])->name('admin.permissions.create');
    Route::get('/permissions/update/{id}', [PermissionController::class, 'updateUi'])->name('admin.permissions.edit');
    Route::put('/permissions/update/{id}', [PermissionController::class, 'update'])->name('admin.permissions.update');
    Route::get('/permissions/delete/{id}', [PermissionController::class, 'destroy'])->name('admin.permissions.delete');

    //Users
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.all');
    Route::get('/users/create', [UserController::class, 'createUi'])->name('admin.users.new');
    Route::post('/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::get('/users/update/{id}', [UserController::class, 'updateUi'])->name('admin.users.edit');
    Route::put('/users/update/{id}', [UserController::class, 'update'])->name('admin.users.update');
    Route::get('/users/delete/{id}', [UserController::class, 'destroy'])->name('admin.users.delete');

    //Posts
    Route::get('/posts', [PostController::class, 'index'])->name('admin.posts.all');
    Route::get('/posts/create', [PostController::class, 'createUi'])->name('admin.posts.new');
    Route::post('/posts/create', [PostController::class, 'create'])->name('admin.posts.create');
    Route::get('/posts/update/{id}', [PostController::class, 'updateUi'])->name('admin.posts.edit');
    Route::put('/posts/update/{id}', [PostController::class, 'update'])->name('admin.posts.update');
    Route::post('/posts/viewPostBySlug/(slug)', [PostController::class, 'viewPostBySlug'])->name('admin.posts.viewPostBySlug');
    Route::get('/posts/delete/{id}', [PostController::class, 'destroy'])->name('admin.posts.delete');

    //Memberships
    Route::get('/memberships', [MembershipController::class, 'index'])->name('admin.memberships.all');
    Route::get('/memberships/create', [MembershipController::class, 'createUi'])->name('admin.memberships.new');
    Route::post('/memberships/create', [MembershipController::class, 'create'])->name('admin.memberships.create');
    Route::get('/memberships/update/{id}', [MembershipController::class, 'updateUi'])->name('admin.memberships.edit');
    Route::put('/memberships/update/{id}', [MembershipController::class, 'update'])->name('admin.memberships.update');
    Route::post('/memberships/viewPostBySlug/(slug)', [MembershipController::class, 'viewPostBySlug'])->name('admin.memberships.viewPostBySlug');
    Route::get('/memberships/delete/{id}', [MembershipController::class, 'destroy'])->name('admin.memberships.delete');

    //Inquiries
    Route::get('/inquiries', [InquiryController::class, 'index'])->name('admin.inquiries.all');

    //Director Board
    Route::get('/director-board', [DirectorBoardController::class, 'index'])->name('admin.director_board.all');
    Route::get('/director-board/create', [DirectorBoardController::class, 'createUi'])->name('admin.director_board.new');
    Route::post('/director-board/create', [DirectorBoardController::class, 'create'])->name('admin.director_board.create');
    Route::get('/director-board/update/{id}', [DirectorBoardController::class, 'updateUi'])->name('admin.director_board.edit');
    Route::put('/director-board/update/{id}', [DirectorBoardController::class, 'update'])->name('admin.director_board.update');
    Route::get('/director-board/delete/{id}', [DirectorBoardController::class, 'destroy'])->name('admin.director_board.delete');

    //Posts - Category
    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.all');
    Route::get('/categories/create', [CategoryController::class, 'createUi'])->name('admin.categories.new');
    Route::post('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::get('/categories/update/{id}', [CategoryController::class, 'updateUi'])->name('admin.categories.edit');
    Route::post('/categories/update/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::post('/categories/viewCategoryById/(id)', [CategoryController::class, 'viewCategoryById'])->name('admin.categories.viewCategoryById');
    Route::get('/categories/delete/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.delete');

    //Roles
    Route::get('/roles', [RoleController::class, 'index'])->name('admin.roles.all');
    Route::get('/roles/create', [RoleController::class, 'createUi'])->name('admin.roles.new');
    Route::post('/roles/create', [RoleController::class, 'create'])->name('admin.roles.create');
    Route::get('/roles/update/{id}', [RoleController::class, 'updateUi'])->name('admin.roles.edit');
    Route::put('/roles/update/{id}', [RoleController::class, 'update'])->name('admin.roles.update');
    Route::get('/roles/delete/{id}', [RoleController::class, 'destroy'])->name('admin.roles.delete');

    //Permissions
    Route::get('/permissions', [PermissionController::class, 'index'])->name('admin.permissions.all');
    Route::get('/permissions/create', [PermissionController::class, 'createUi'])->name('admin.permissions.new');
    Route::post('/permissions/create', [PermissionController::class, 'create'])->name('admin.permissions.create');
    Route::get('/permissions/update/{id}', [PermissionController::class, 'updateUi'])->name('admin.permissions.edit');
    Route::put('/permissions/update/{id}', [PermissionController::class, 'update'])->name('admin.permissions.update');
    Route::get('/permissions/delete/{id}', [PermissionController::class, 'destroy'])->name('admin.permissions.delete');

    //Testimonials
    Route::get('/testimonials', [TestimonialController::class, 'index'])->name('admin.testimonials.all');
    Route::get('/testimonials/create', [TestimonialController::class, 'createUi'])->name('admin.testimonials.new');
    Route::post('/testimonials/create', [TestimonialController::class, 'create'])->name('admin.testimonials.create');
    Route::get('/testimonials/update/{id}', [TestimonialController::class, 'updateUi'])->name('admin.testimonials.edit');
    Route::put('/testimonials/update/{id}', [TestimonialController::class, 'update'])->name('admin.testimonials.update');
    Route::get('/testimonials/delete/{slug}', [TestimonialController::class, 'destroy'])->name('admin.testimonials.delete');

    //Service
    Route::get('/services', [ServicesController::class, 'index'])->name('admin.services.all');
    Route::get('/services/create', [ServicesController::class, 'createUi'])->name('admin.services.new');
    Route::post('/services/create', [ServicesController::class, 'create'])->name('admin.services.create');
    Route::get('/services/update/{id}', [ServicesController::class, 'updateUi'])->name('admin.services.edit');
    Route::post('/services/update/{id}', [ServicesController::class, 'update'])->name('admin.services.update');
    Route::get('/services/delete/{slug}', [ServicesController::class, 'destroy'])->name('admin.services.delete');

    //Elements
    Route::get('/elements', [ElementController::class, 'index'])->name('admin.elements.all');
    Route::get('/elements/create', [ElementController::class, 'createUi'])->name('admin.elements.new');
    Route::post('/elements/create', [ElementController::class, 'create'])->name('admin.elements.create');
    Route::get('/elements/update/{id}', [ElementController::class, 'updateUi'])->name('admin.elements.edit');
    Route::put('/elements/update/{id}', [ElementController::class, 'update'])->name('admin.elements.update');
    Route::get('/elements/delete/{id}', [ElementController::class, 'destroy'])->name('admin.elements.delete');

    //Component
    Route::get('/components', [ComponentController::class, 'index'])->name('admin.components.all');
    Route::get('/components/create', [ComponentController::class, 'createUi'])->name('admin.components.new');
    Route::post('/components/create', [ComponentController::class, 'create'])->name('admin.components.create');
    Route::get('/components/update/{id}', [ComponentController::class, 'updateUi'])->name('admin.components.edit');
    Route::put('/components/update/{id}', [ComponentController::class, 'update'])->name('admin.components.update');
    Route::post('/components/viewComponentById/{id}', [ComponentController::class, 'viewComponentById'])->name('admin.components.viewComponentById');
    Route::get('/components/delete/{id}', [ComponentController::class, 'destroy'])->name('admin.components.delete');

    //Page
    Route::get('/pages', [PageController::class, 'index'])->name('admin.pages.all');
    Route::get('/pages/create', [PageController::class, 'createUi'])->name('admin.pages.new');
    Route::post('/pages/create', [PageController::class, 'create'])->name('admin.pages.create');
    Route::get('/pages/update/{id}', [PageController::class, 'updateUi'])->name('admin.pages.edit');
    Route::put('/pages/update/{id}', [PageController::class, 'update'])->name('admin.pages.update');
    Route::post('/pages/viewPageById/{id}', [PageController::class, 'viewPageById'])->name('admin.pages.viewPageById');
    Route::get('/pages/delete/{id}', [PageController::class, 'destroy'])->name('admin.pages.delete');

    //Page Has Components
    Route::get('/page/components', [PageHasComponentsController::class, 'index'])->name('admin.pages.components.all');
    Route::get('/page/components/create/{id}', [PageHasComponentsController::class, 'createUi'])->name('admin.pages.components.new');
    Route::post('/page/components/create/{id}', [PageHasComponentsController::class, 'create'])->name('admin.pages.components.create');
    Route::get('/page/components/update/{id}', [PageHasComponentsController::class, 'updateUi'])->name('admin.pages.components.edit');
    Route::put('/page/components/update/{id}', [PageHasComponentsController::class, 'update'])->name('admin.pages.components.update');
    Route::get('/page/components/{id}', [PageHasComponentsController::class, 'viewComponentsForPage'])->name('admin.pages.components.viewComponentByPage');
    Route::get('/page/components/delete/{page_id}/{component_id}', [PageHasComponentsController::class, 'destroy'])->name('admin.pages.components.delete');
    Route::put('/page/components/sort/{page_id}', [PageHasComponentsController::class, 'UpdateSortOrder'])->name('admin.pages.components.UpdateSortOrder');

    //Parameter
    Route::get('/parameters', [ParameterController::class, 'index'])->name('admin.parameters.all');
    Route::get('/parameters/create', [ParameterController::class, 'createUi'])->name('admin.parameters.new');
    Route::post('/parameters/create', [ParameterController::class, 'create'])->name('admin.parameters.create');
    Route::get('/parameters/update/{id}', [ParameterController::class, 'updateUi'])->name('admin.parameters.edit');
    Route::put('/parameters/update/{id}', [ParameterController::class, 'update'])->name('admin.parameters.update');
    Route::get('/parameters/delete/{id}', [ParameterController::class, 'destroy'])->name('admin.parameters.delete');

    //GalleryImage
    Route::get('/gallery-images', [GalleryImageController::class, 'index'])->name('admin.gallery-images.all');
    Route::get('/gallery-images/create', [GalleryImageController::class, 'createUi'])->name('admin.gallery-images.new');
    Route::post('/gallery-images/create', [GalleryImageController::class, 'create'])->name('admin.gallery-images.create');
    Route::get('/gallery-images/update/{id}', [GalleryImageController::class, 'updateUi'])->name('admin.gallery-images.edit');
    Route::put('/gallery-images/update/{id}', [GalleryImageController::class, 'update'])->name('admin.gallery-images.update');
    Route::post('/gallery-images/view-by-id/{id}', [GalleryImageController::class, 'viewGalleryImageById'])->name('admin.gallery-images.view-by-id');
    Route::get('/gallery-images/delete/{id}', [GalleryImageController::class, 'destroy'])->name('admin.gallery-images.delete');

    //SystemModule
    Route::get('/system-modules', [SystemModuleController::class, 'index'])->name('admin.system-modules.all');
    Route::get('/system-modules/create', [SystemModuleController::class, 'createUi'])->name('admin.system-modules.new');
    Route::post('/system-modules/create', [SystemModuleController::class, 'create'])->name('admin.system-modules.create');
    Route::get('/system-modules/update/{id}', [SystemModuleController::class, 'updateUi'])->name('admin.system-modules.edit');
    Route::put('/system-modules/update/', [SystemModuleController::class, 'update'])->name('admin.system-modules.update');
    Route::post('/system-modules/view-by-id/{id}', [SystemModuleController::class, 'viewSystemModuleById'])->name('admin.system-modules.view-by-id');
    Route::get('/system-modules/delete/{id}', [SystemModuleController::class, 'destroy'])->name('admin.system-modules.delete');

});
