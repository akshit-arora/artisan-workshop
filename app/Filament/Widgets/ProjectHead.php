<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Session;

/**
 * Dashboard widget to show the selected project
 */
class ProjectHead extends Widget
{
    public $widgetData;

    protected static string $view = 'filament.widgets.project-head';

    protected int | string | array $columnSpan = 'full';

    protected $listeners = ['projectSelected' => 'mount'];

    public static function canView(): bool
    {
        return Session::has('selected_project');
    }

    public function mount(): void
    {
        $this->widgetData = [
            'selected_project' => Session::get('selected_project'),
        ];
    }
}
