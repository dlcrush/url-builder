<?php

namespace Crush\Http;

use Crush\Http\UrlBuilder;
use Illuminate\Support\ServiceProvider;

/**
 * UrlBuilder Service Provider Class.
 */
class UrlBuilderServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('Crush\Http\Contracts\UrlBuilder', function($app) {
            return new UrlBuilder($this->app->make('Crush\Http\Contracts\ParamsBuilder'));
        });
    }

}
