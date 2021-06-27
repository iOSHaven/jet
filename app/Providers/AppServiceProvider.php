<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        if (config('app.env') === 'production') {
            URL::forceScheme("https");
        } else {
            $host = Str::of($request->server->get("HTTP_HOST"));
            if ($host->contains("ngrok")) {
                URL::forceScheme("https");
            }
        }
//        ddd($request->server);
    }
}
