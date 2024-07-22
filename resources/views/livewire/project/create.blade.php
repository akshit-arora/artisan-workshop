<div>
    <form wire:submit="save">
        <label class="input input-bordered flex items-center gap-2">
            Name
            <input type="text" class="grow" wire:model="name" placeholder="Your Awesome Project">
        </label>
        <div>@error('name') {{ $message }} @enderror</div>
        <label class="input input-bordered flex items-center gap-2 mt-2">
            Description
            <input type="text" class="grow" wire:model="description" placeholder="Description of your project">
        </label>
        <div>@error('description') {{ $message }} @enderror</div>
        <label class="input input-bordered flex items-center gap-2 mt-2">
            Location
            <input type="text" class="grow" wire:model="location" placeholder="Full path to your project">
        </label>
        <div>@error('location') {{ $message }} @enderror</div>
        <button type="submit" class="mt-2 btn btn-primary">Save</button>
        <a href="{{ route('projects.index') }}" wire:navigate class="mt-2 ml-2 btn">Cancel</a>
    </form>
</div>
