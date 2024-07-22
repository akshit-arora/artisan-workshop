<div class="w-full">
    <a class="btn btn-success mb-2" href="{{ route('projects.create') }}" wire:navigate>
        Create a new project
    </a>
    <table class="table table-zebra">
        <thead class="">
            <tr>
                <th>Name</th>
                <th>Location</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($projects as $project)
                <tr class="hover">
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->location }}</td>
                    <td>
                        <a href="{{ route('projects.edit', $project) }}" wire:navigate class="btn btn-primary btn-sm">Edit</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class=" text-center">
                        No projects found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
