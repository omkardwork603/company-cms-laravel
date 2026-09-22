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

    public function boot(): void
    {
        Schema::defaultStringLength(191);

        View::composer(['frontend.*', 'frontend.layouts.*', 'frontend.layout.*'], function ($view) {

            $menus = Menu::with([
                'items' => function ($query) {
                    $query->where('status', true)
                        ->orderBy('sort_order');
                }
            ])
            ->where('status', true)
            ->get();

            $headerMenu = $menus->firstWhere('location', 'header') ?? $menus->first();
            $footerMenu = $menus->firstWhere('location', 'footer') ?? $menus->skip(1)->first();

            $settings = Setting::first();

            $view->with([
                'menus' => $menus,
                'headerMenu' => $headerMenu,
                'footerMenu' => $footerMenu,
                'settings' => $settings,
            ]);
        });
    }
}