<?php

namespace Crush\Http;

use Crush\Http\UrlBuilder;
use Crush\Http\Contracts\ParamBuilder;
use Illuminate\Support\ServiceProvider;

/**
 * ParamsBuilder Service Provider Class.
 */
class ParamsBuilderServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('Crush\Http\Contracts\UrlBuilder', function($app) {
            return new Crush\Http\ParamsBuilder($this->app->make('Crush\Http\Contracts\ParamBuilder'));
        });
    }

}
