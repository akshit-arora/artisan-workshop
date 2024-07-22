<div class="w-full">
    <h2 class="text-2xl">
        Database Viewer for {{ $project->name }}
    </h2>
    <label class="input input-bordered flex items-center gap-2 mt-4">
        Search for table
        <input type="text" wire:model.live="search" class="grow" placeholder="Table name here...">
    </label>

    <table class="table table-zebra">
        <thead>
            <tr>
                <th>
                    Table name
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($tableNames as $table)
                <tr class="hover">
                    <td>
                        <a href="{{ route('db-viewer.show', $table) }}" class="w-full" wire:navigate>
                            {{ $table }}
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
