<div>
    <form wire:submit="save">
        <label class="input input-bordered flex items-center gap-2">
            Name
            <input type="text" wire:model="name" placeholder="Your Awesome Project" class="grow">
        </label>
        <div>@error('name') {{ $message }} @enderror</div>
        <label class="input input-bordered flex items-center gap-2 mt-2">
            Description
            <input type="text" wire:model="description" placeholder="Description of your project" class="grow">
        </label>
        <div>@error('description') {{ $message }} @enderror</div>
        <label class="input input-bordered flex items-center gap-2 mt-2">
            Location
            <input type="text" wire:model="location" placeholder="Full path to your project" class="grow">
        </label>
        <div>@error('location') {{ $message }} @enderror</div>
        <label class="input input-bordered flex items-center gap-2 mt-2">
            Status
            <select wire:model="status" class="grow">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </label>
        <div>@error('status') {{ $message }} @enderror</div>
        <button type="submit" class="mt-2 btn btn-primary">Update</button>
        <a href="{{ route('projects.index') }}" wire:navigate class="mt-2 ml-2 btn">Cancel</a>
    </form>
</div>
