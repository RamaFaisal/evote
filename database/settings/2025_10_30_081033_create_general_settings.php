<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.app_name', 'E-Vote');
        $this->migrator->add('general.app_description', 'Platform voting digital yang aman, efisien, dan transparan untuk organisasi modern.');
    }
};
