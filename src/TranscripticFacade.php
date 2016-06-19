<?php

namespace Kz\Transcriptic;

use Illuminate\Support\Facades\Facade;

class TranscripticFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Transcriptic';
    }
}
