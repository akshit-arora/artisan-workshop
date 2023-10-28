<div class="p-6">
    <span class="text-sm font-medium leading-4 text-gray-700">
        Select Project
    </span>
    <select wire:model="selectedProject" wire:change="setProject($event.target.value)" class="text-gray-900 block w-full transition duration-75 rounded-lg shadow-sm outline-none focus:border-primary-500 focus:ring-1 focus:ring-inset focus:ring-primary-500 disabled:opacity-70 border-gray-300">
        <option value="">Select Project</option>
        @foreach($projects as $project)
            <option value="{{ $project->id }}">{{ $project->name }}</option>
        @endforeach
    </select>
</div>
