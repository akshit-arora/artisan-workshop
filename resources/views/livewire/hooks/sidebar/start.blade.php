<div class="fi-sidebar-item">
    <span class="fi-sidebar-item-label flex-1 truncate text-primary-600 dark:text-primary-400 font-semibold py-2">
        Select Project
    </span>
    <select wire:model="selectedProject" wire:change="setProject($event.target.value)" class="text-gray-900 block w-full transition duration-75 rounded-lg shadow-sm outline-none focus:border-primary-500 focus:ring-1 focus:ring-inset focus:ring-primary-500 disabled:opacity-70 border-gray-300">
        <option value="">Select Project</option>
        @foreach($projects as $project)
            <option value="{{ $project->id }}">{{ $project->name }}</option>
        @endforeach
    </select>
</div>
