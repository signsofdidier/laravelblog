<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class viewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //onze gegevens ophalen en nu delen met ALLE VIEWS
        $breakingNews = Post::published()
            ->latest()
            ->take(6)
            ->get();

        $categories = Category::withCount('posts')->having('posts_count', '>', 0)->get();

        //deel deze variablen met alle views
        View::share([
            'breakingNews' => $breakingNews,
            'categories' => $categories,
        ]);

    }
}
