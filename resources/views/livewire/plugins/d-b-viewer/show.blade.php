<div class="w-full">
    @isset($tableName)
        <div class="grid grid-cols-4">
            <div class="col-span-2">
                <label class="input input-bordered flex items-center gap-2">
                    Search in {{ $tableName }}:
                    <input type="text" class="grow" wire:model.change="where">
                </label>
            </div>
            <div class="ml-2">
                <button wire:click="refresh" class="btn btn-info">Refresh</button>
            </div>
        </div>
        <table class="table table-zebra">
            <thead>
                <tr>
                    @foreach($columns as $column)
                        <th>{{ $column }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($rows as $row)
                    <tr class="hover">
                        @foreach($columns as $column)
                            <td>{{ $row->{$column} }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $rows->links() }}
    @else
        <div class="text-center font-bold">
            Please select a table to see its data
        </div>
    @endisset
</div>
