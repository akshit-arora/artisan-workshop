<?php

namespace App\Services;

use App\Models\Project;
use Illuminate\Support\Facades\Cache;

/**
 * Class Workshop
 * Service for managing projects
 * 
 * @package App\Services
 */
class Workshop
{
    /**
     * Project currently being worked on
     */
    protected ?Project $project = null;

    /**
     * Construct the service
     */
    public function __construct()
    {
        if (Cache::has('project')) {
            $this->project = Cache::get('project');
        }
    }

    /**
     * Set the project
     * 
     * @param Project $project
     * @return void
     */
    public function setProject(Project $project): void
    {
        $this->project = $project;
        Cache::put('project', $project);
    }

    /**
     * Get the project
     * 
     * @return Project
     */
    public function getProject(): ?Project
    {
        return $this->project;
    }

    /**
     * Check if there is a project currently being worked on
     * 
     * @return bool
     */
    public function hasProject(): bool
    {
        return $this->project != null;
    }
}
