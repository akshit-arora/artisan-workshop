<aside class="w-64 p-6 border-base-300 border-r bg-base-100">
    <h2 class="text-lg font-semibold mb-6">Menu</h2>
    <ul class="space-y-2">
        <li><a class="block py-2" wire:navigate href="{{ route('dashboard') }}">Dashboard</a></li>
        <li><a class="block py-2" wire:navigate href="{{ route('projects.index') }}">Projects</a></li>
        @if(Session::has('project'))
            <li><a class="block py-2" wire:navigate href="{{ route('db-viewer.index') }}">Database Viewer</a></li>
        @endif
    </ul>
</aside>
