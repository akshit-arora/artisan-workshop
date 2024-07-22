<?php

namespace App\Console;

use function Laravel\Prompts\alert;
use function Laravel\Prompts\search;
use function Laravel\Prompts\select;

use App\Console\Project as ConsoleProject;
use App\Models\Project;

class Dashboard
{
    public function __construct()
    {
    }

    public function show()
    {
        $shouldExit = false;

        do {
            if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
                system('cls');
            } else {
                system('clear');
            }

            $action = select('Welcome to the Artisan Workshop, Please select your action.', [
                'load_project' => 'Load Project',
                'create_project' => 'Create Project',
                'exit' => 'Exit',
            ]);

            switch ($action) {
                case 'load_project':
                    (new ConsoleProject())->selectProject();
                    break;

                case 'create_project':
                    alert('Create Project');
                    break;

                case 'exit':
                    $shouldExit = true;
                    break;
            }

        } while (!$shouldExit);
    }
}
