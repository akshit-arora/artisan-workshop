<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GlobalSettings extends Settings
{

    public static function group(): string
    {
        return 'global';
    }
}