<?php

namespace App\Providers;

use App\Models\{Category, Post, Tag, User};
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->addAfter('main_navigation', [
                'key' => 'posts',
                'text' => 'Posts',
                'route' => 'admin.post.index',
                'icon' => 'far fa-fw fa-list-alt',
                'label' => Post::all()->count(),
                'label_color' => 'success',
            ]);
            $event->menu->addAfter('posts', [
                'key' => 'categories',
                'text' => 'Categories',
                'route' => 'admin.categories.index',
                'icon' => 'far fa-fw fa fa-paperclip',
                'label' => Category::all()->count(),
                'label_color' => 'success',
            ]);
            $event->menu->addAfter('categories', [
                'key' => 'tags',
                'text' => 'Tags',
                'route' => 'admin.tag.index',
                'icon' => 'far fa-fw fa fa-tag',
                'label' => Tag::all()->count(),
                'label_color' => 'success',
            ]);
            $event->menu->addAfter('tags', [
                'key' => 'users',
                'text' => 'Users',
                'route' => 'admin.user.index',
                'icon' => 'far fa-fw fa fa-users',
                'label' => User::all()->count(),
                'label_color' => 'success',
            ]);
        });
    }
    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
