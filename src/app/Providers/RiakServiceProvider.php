<?php

namespace App\Providers;

use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class RiakServiceProvider extends ServiceProvider implements DeferrableProvider
{
//     /**
//      * All of the container bindings that should be registered.
//      *
//      * @var array
//      */
//     public $bindings = [
//         //ServerProvider::class => DigitalOceanServerProvider::class,
//     ];

//     /**
//      * All of the container singletons that should be registered.
//      *
//      * @var array
//      */
//     public $singletons = [
// //        DowntimeNotifier::class => PingdomDowntimeNotifier::class,
// //        ServerProvider::class => ServerToolsProvider::class,
//     ];

//     /**
//      * Register services.
//      *
//      * @return void
//      */
//     public function register()
//     {
// //        $this->app->singleton(Connection::class, function ($app) {
// //            return new Connection(config('riak'));
// //        });
//     }


// //    public function boot()
// //    {
// //        //This method is called after all other service providers have been registered
// //
// //        view()->composer('view', function () {
// //            //
// //        });
// //    }

//     /**
//      * @var Illuminate\Contracts\Routing\ResponseFactory
//      */
//     public function boot(ResponseFactory $response)
//     {
//         $response->macro('caps', function ($value) {
//             //
//         });
//     }

//     /**
//      * Get the services provided by the provider.
//      *
//      * @return array
//      */
//     public function provides()
//     {
//         //Laravel compiles and stores a list of all of the services supplied by deferred service providers, 
//         //along with the name of its service provider class. 
//         //Then, only when you attempt to resolve one of these services does Laravel load the service provider.
//         return [Connection::class];
//     }
// }
