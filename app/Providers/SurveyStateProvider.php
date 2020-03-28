<?php

namespace App\Providers;

use App\Components\SurveyState;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class SurveyStateProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind('SurveyState', function($app) {
            return new SurveyState(Auth::user(), $app->make('em'));
        });
    }
}
