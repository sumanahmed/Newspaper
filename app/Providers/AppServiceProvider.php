<?php

namespace App\Providers;

use App\Category;
use App\Post;
use App\Tag;
use App\Comment;
use Illuminate\Support\ServiceProvider;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //show category in header
        View::composer('front.includes.main-menu', function ($view){
            $view->with('PublishedCategories', Category::where('publication_status', 1)->get() );
        });

        //show breaking news in header
        View::composer('front.includes.breaking-news', function ($view){
            $view->with('posts', Post::where('publication_status', 1)->get() );
        });

        //show tag and recent post in sidebar
        View::composer('front.includes.sidebar', function ($view){
            $view->with('tags', Tag::where('publication_status', 1)->get() );
            $view->with('posts', Post::where('publication_status', 1)->orderBy('id', 'desc')->take(4)->get() );
        });

        //show recent comments in sidebar
        View::composer('front.includes.sidebar', function ($view){
            $view->with('comments', Comment::where('approval_status', 1)->orderBy('id', 'desc')->take(4)->get() );
        });

        //show recent comments in sidebar
        View::composer('front.includes.sidebar', function ($view){
            $view->with('comments', Comment::where('approval_status', 1)->orderBy('id', 'desc')->take(4)->get() );
        });



    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
