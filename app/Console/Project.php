<?php

namespace App\Console;

use App\Models\Project as ModelsProject;

use function Laravel\Prompts\search;
use function Laravel\Prompts\select;

class Project
{
    private int $projectId;
    public function selectProject()
    {
        $projects = ModelsProject::where('status', 'active')->pluck('name', 'id');

        // Push option "Back" to the end of the collection
        $projects = $projects->add('🔙 Back', 0);

        $selected = select(
            'Select the project you want to load',
            $projects
        );

        if ($selected == 0) {
            return;
        }

        $this->projectId = $selected;

        $this->loadProject($selected);
    }

    private function loadProject(int $projectId)
    {
        $project = ModelsProject::find($projectId);

        $shouldExit = false;

        do {
            $selection = select('Select the action', [
                'db' => 'Load Database',
                'exit' => 'Exit',
            ]);

            switch ($selection) {
                case 'db':
                    // (new DBViewer())->show($project);
                    break;
                case 'exit':
                    $shouldExit = true;
                    break;
            }
        } while (!$shouldExit);
    }
}
