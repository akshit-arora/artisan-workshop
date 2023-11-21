<div class="fi-sidebar-item">
    <x-filament::fieldset>
        <x-slot name="label">
            Select Project
        </x-slot>
        <x-filament::input.wrapper>
            <x-filament::input.select wire:model="selectedProject" wire:change="setProject($event.target.value)">
                <option value="">Select Project</option>
                @foreach($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
            </x-filament::input.select>
        </x-filament::input.wrapper>
    </x-filament::fieldset>
</div>
