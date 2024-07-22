<div class="w-full">
    <h2 class="text-2xl">
        Database Viewer for {{ $project->name }}
    </h2>
    <div class="grid grid-cols-4 mt-4">
        <div>
            <input type="text" wire:model.live="search" class="input input-bordered w-full max-w-xs" placeholder="Search for table">
            <table class="table table-zebra table-sm">
                <thead>
                    <tr>
                        <th>
                            Table name
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tableNames as $table)
                        <tr class="hover" wire:click="setTable('{{ $table }}')">
                            <td>
                                {{ $table }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-span-3">
            @livewire('plugins.d-b-viewer.show', ['tableName' => $tableName], key(time() . rand(0, 999)))
        </div>
    </div>
</div>
