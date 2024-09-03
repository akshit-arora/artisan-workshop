<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class ProjectSettings extends Settings
{
    public string $default_path;

    public static function group(): string
    {
        return 'project';
    }
}