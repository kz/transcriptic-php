<?php

namespace Kz\Transcriptic;

use Illuminate\Support\ServiceProvider;


class TranscripticServiceProvider extends ServiceProvider
{
    protected $defer = false;

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/transcriptic.php', 'transcriptic'
        );
        $this->app->bind('Transcriptic', function($app) {
            return new Transcriptic(config('transcriptic.email'), config('transcriptic.token'));
        });
    }
    public function provides()
    {
        return ['Transcriptic'];
    }

}
