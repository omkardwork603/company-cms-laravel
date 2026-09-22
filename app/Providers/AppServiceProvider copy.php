<?php

namespace App\Providers;

use App\Models\Menu;
use App\Models\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    // public function boot(): void
    // {
    //     $settings = null;
    //     if (Schema::hasTable('settings')) {
    //         $settings = Setting::first();
    //     }

    //     $menus = collect();
    //     if (Schema::hasTable('menus')) {
    //         $query = Menu::query();
    //         if (Schema::hasColumn('menus', 'status')) {
    //             $query->where('status', true);
    //         }
    //         if (Schema::hasColumn('menus', 'order')) {
    //             $query->orderBy('order');
    //         }
    //         $menus = $query->get();
    //     }

    //     View::share(
    //         'settings',
    //         $settings
    //     );

    //     View::share(
    //         'menus',
    //         $menus
    //     );
    // }
//     public function boot(): void
// {
//     Schema::defaultStringLength(191);
// }

public function boot(): void
    {
        View::composer('frontend.layouts.header', function ($view) {

            $menus = Menu::with([
                'items' => function ($query) {
                    $query->where('status', true)
                        ->orderBy('sort_order');
                }
            ])
            ->where('status', true)
            ->get();

            $view->with('menus', $menus);

            Schema::defaultStringLength(191);
        });
    }
}