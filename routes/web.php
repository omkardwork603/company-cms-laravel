<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// Frontend Controllers
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\ProductController as FrontendProductController;
use App\Http\Controllers\Frontend\ProjectController as FrontendProjectController;
use App\Http\Controllers\Frontend\ServiceController as FrontendServiceController;
use App\Http\Controllers\Frontend\TeamController;
use App\Http\Controllers\Frontend\PageController as FrontendPageController;

// Admin Controllers
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TeamController as AdminTeamController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\MenuItemController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;


/*
|--------------------------------------------------------------------------
| Public Website / Frontend
|--------------------------------------------------------------------------
*/

// Home Page
Route::get('/', [FrontendPageController::class, 'home'])
    ->name('home');

// About
Route::get('/about', [FrontendPageController::class, 'about'])
    ->name('about');

// Services
Route::get('/services', [FrontendServiceController::class, 'index'])
    ->name('services');
Route::get('/services', [FrontendServiceController::class, 'index'])
    ->name('services.index');

Route::get('/services/{service:slug}', [FrontendServiceController::class, 'show'])
    ->name('services.show');

// Products
Route::get('/products', [FrontendProductController::class, 'index'])
    ->name('products');
Route::get('/products', [FrontendProductController::class, 'index'])
    ->name('products.index');

Route::get('/products/{product:slug}', [FrontendProductController::class, 'show'])
    ->name('products.show');

// Projects
Route::get('/projects', [FrontendProjectController::class, 'index'])
    ->name('projects');
Route::get('/projects', [FrontendProjectController::class, 'index'])
    ->name('projects.index');

Route::get('/projects/{project:slug}', [FrontendProjectController::class, 'show'])
    ->name('projects.show');

// Team
Route::get('/team', [TeamController::class, 'index'])
    ->name('team');
Route::get('/team', [TeamController::class, 'index'])
    ->name('team.index');

Route::get('/team/{teamMember}', [TeamController::class, 'show'])
    ->name('team.show');

// Blog
Route::get('/blog', [BlogController::class, 'index'])
    ->name('blog');
Route::get('/blog', [BlogController::class, 'index'])
    ->name('blog.index');

Route::get('/blog/{post:slug}', [BlogController::class, 'show'])
    ->name('blog.show');

// Dynamic Pages
Route::get('/pages/{page:slug}', [FrontendPageController::class, 'show'])
    ->name('pages.show');

// Contact
Route::get('/contact', [ContactController::class, 'index'])
    ->name('contact');

Route::post('/contact', [ContactController::class, 'store'])
    ->name('contact.store');


/*
|--------------------------------------------------------------------------
| Normal User Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])
    ->name('dashboard');


/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});


/*
|--------------------------------------------------------------------------
| Admin CMS
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Dashboard
        |--------------------------------------------------------------------------
        */

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');


        /*
        |--------------------------------------------------------------------------
        | Content Management
        |--------------------------------------------------------------------------
        */

        Route::get('pages/about/edit', [PageController::class, 'editAbout'])->name('pages.about.edit');
        Route::resource('pages', PageController::class);

        Route::resource('services', ServiceController::class);

        Route::resource('products', ProductController::class);

        Route::resource('projects', ProjectController::class);

        Route::resource('posts', PostController::class);

        Route::resource('team', AdminTeamController::class);


        /*
        |--------------------------------------------------------------------------
        | Messages / Contact Inquiries
        |--------------------------------------------------------------------------
        */

        Route::resource('messages', MessageController::class)
            ->only([
                'index',
                'show',
                'destroy'
            ]);

        Route::patch(
            '/messages/{message}/unread',
            [MessageController::class, 'markUnread']
        )->name('messages.unread');


        /*
        |--------------------------------------------------------------------------
        | Media
        |--------------------------------------------------------------------------
        */

        Route::resource('media', MediaController::class)
            ->parameters(['media' => 'media'])
            ->only([
                'index',
                'create',
                'store',
                'destroy'
            ]);


        /*
        |--------------------------------------------------------------------------
        | Menus
        |--------------------------------------------------------------------------
        */

        Route::resource('menus', MenuController::class);

        // Menu Items - Create
        Route::get(
            '/menus/{menu}/items/create',
            [MenuItemController::class, 'create']
        )->name('menus.items.create');

        // Menu Items - Store
        Route::post(
            '/menus/{menu}/items',
            [MenuItemController::class, 'store']
        )->name('menus.items.store');

        // Menu Items - Edit
        Route::get(
            '/menus/{menu}/items/{menuItem}/edit',
            [MenuItemController::class, 'edit']
        )->name('menus.items.edit');

        // Menu Items - Update
        Route::put(
            '/menus/{menu}/items/{menuItem}',
            [MenuItemController::class, 'update']
        )->name('menus.items.update');

        // Menu Items - Delete
        Route::delete(
            '/menus/{menu}/items/{menuItem}',
            [MenuItemController::class, 'destroy']
        )->name('menus.items.destroy');


        /*
        |--------------------------------------------------------------------------
        | Users & Roles
        |--------------------------------------------------------------------------
        */

        Route::resource('users', UserController::class);

        Route::resource('roles', RoleController::class);


        /*
        |--------------------------------------------------------------------------
        | Settings
        |--------------------------------------------------------------------------
        */

        Route::get('/settings', [SettingController::class, 'index'])
            ->name('settings.index');

        Route::put('/settings', [SettingController::class, 'update'])
            ->name('settings.update');

    });


/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';
