<aside class="w-64 p-6 border-base-300 border-r bg-base-100">
    <ul class="space-y-2">
        <li><a class="block py-2" wire:navigate href="{{ route('dashboard') }}">Dashboard</a></li>
        <li><a class="block py-2" wire:navigate href="{{ route('projects.index') }}">Projects</a></li>
        @foreach(app('menu.service')->getMenuItems() as $menuItem)
            @if(($menuItem['requiresProjectSelected'] && app('workshop')->hasProject()) || !$menuItem['requiresProjectSelected'])
                <li><a class="block py-2" wire:navigate href="{{ route($menuItem['route']) }}">{{ $menuItem['name'] }}</a></li>
            @endif
        @endforeach
    </ul>
</aside>
