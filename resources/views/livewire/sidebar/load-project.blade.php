<div>
    <label for="load_project" class="form-control w-full max-w-xs">
        <div class="label">
            <span class="label-text">
                Load Project to Workshop
            </span>
        </div>
        <select class="select select-bordered select-sm" wire:model="selectedProject" wire:change="selectProject($event.target.value)">
            <option value="">Select project</option>
            @foreach($projects as $project)
                <option value="{{ $project->id }}">{{ $project->name }}</option>
            @endforeach
        </select>
    </label>
</div>
