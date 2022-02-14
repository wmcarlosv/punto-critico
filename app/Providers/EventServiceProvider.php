<?php

namespace App\Providers;

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
            // Add some items to the menu...
            $event->menu->add('MAIN NAVIGATION');
            $event->menu->add([
                'text'=>'Escritorio',
                'route'=>'dashboard',
                'icon'=>'fas fa-tachometer-alt'
            ],[
                'text'=>'Perfil',
                'route'=>'profile',
                'icon'=>'fas fa-user-circle'
            ],[
                'text'=>'Valores',
                'route'=>'values.index',
                'icon'=>'fas fa-tags'
            ],[
                'text'=>'Galeria de Fotos',
                'route'=>'sliders.index',
                'icon'=>'fas fa-images'
            ],[
                'text'=>'Expertos',
                'route'=>'experts.index',
                'icon'=>'fas fa-flask'
            ],[
                'text'=>'Servicios',
                'route'=>'services.index',
                'icon'=>'fas fa-list'
            ],[
                'text'=>'Clientes',
                'route'=>'customers.index',
                'icon'=>'fas fa-users'
            ],[
                'text'=>'Procesos',
                'route'=>'process.index',
                'icon'=>'fas fa-cog'
            ]);
        });
    }
}
