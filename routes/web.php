<?php

use App\Livewire\Dashboard\Home;
use App\Livewire\Plugins\DBViewer\Index as DBIndex;
use App\Livewire\Plugins\DBViewer\Show as ShowDBTable;
use App\Livewire\Project\Create as CreateProject;
use App\Livewire\Project\Edit as EditProject;
use App\Livewire\Project\ProjectList;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('dashboard');

// Projects
Route::get('projects', ProjectList::class)->name('projects.index');
Route::get('projects/create', CreateProject::class)->name('projects.create');
Route::get('projects/edit/{project}', EditProject::class)->name('projects.edit');

// Database Viewer
Route::get('db-viewer', DBIndex::class)->name('db-viewer.index');
Route::get('db-viewer/{tableName}', ShowDBTable::class)->name('db-viewer.show');


Route::get('test', function () {
    return view('welcome');
});
