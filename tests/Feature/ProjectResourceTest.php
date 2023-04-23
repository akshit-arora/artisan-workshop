<?php

use App\Filament\Resources\ProjectResource;
use App\Models\Project;
use function Pest\Livewire\livewire;

it('can render page', function () {
    $this->get(ProjectResource::getUrl('index'))->assertSuccessful();
});

it('can list posts', function () {
    $posts = Project::factory()->count(10)->create();

    livewire(PostResource\Pages\ListPosts::class)
        ->assertCanSeeTableRecords($posts);
});
