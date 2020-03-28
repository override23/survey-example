<?php

namespace App\Providers;

use App\Entities\Answer;
use App\Entities\Question;
use App\Repositories\AnswerRepository;
use App\Repositories\QuestionRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(QuestionRepository::class, function($app) {
            return new QuestionRepository(
                $app['em'],
                $app['em']->getClassMetaData(Question::class)
            );
        });
        $this->app->bind(AnswerRepository::class, function($app) {
            return new AnswerRepository(
                $app['em'],
                $app['em']->getClassMetaData(Answer::class)
            );
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
