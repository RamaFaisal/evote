<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public static function canAccess(): bool
    {
        return true;
    }

    public ?string $app_name;

    public ?string $app_description;

    public static function group(): string
    {
        return 'general';
    }
}