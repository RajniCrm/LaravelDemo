<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Cms;

class NavigationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
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
        view()->composer('*', function($view){
            // $title = 'navigation';
            $parentDataRow = Cms::orderBy('title', 'Asc')
                    ->where('status','Active')
                    ->where('parent_id','=', '0')
                    ->get();
            return $view->with('parentDataRow', $parentDataRow);
            
        });
    }
}
