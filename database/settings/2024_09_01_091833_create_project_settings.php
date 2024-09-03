<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('project.default_path', null);
    }

    public function down(): void
    {
        $this->migrator->delete('project.default_path');
    }
};
