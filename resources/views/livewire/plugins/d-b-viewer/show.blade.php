<div class="w-full">
    <h2 class="text-xl">
        Showing data in {{ $tableName }} table
    </h2>
    <div class="grid grid-cols-4">
        <div class="col-span-2">
            <label class="input input-bordered flex items-center gap-2 mt-4">
                Search:
                <input type="text" class="grow" placeholder="search..." wire:model.change="where">
            </label>
        </div>
        <div>
            <button wire:click="refresh" class="btn btn-info my-2">Refresh</button>
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
</div>
