<x-filament-widgets::widget>
    <x-filament::section icon="heroicon-o-window">
        <x-slot name="heading">
            {{ $widgetData['selected_project']->name }}
        </x-slot>
        <x-slot name="description">
            {{ $widgetData['selected_project']->description }}
        </x-slot>
        <x-filament::button
            href="vscode://file/{{ $widgetData['selected_project']->location }}"
            tag="a"
            icon="heroicon-o-document-text"
        >
            Open in Editor
        </x-filament::button>
        <x-filament::button

            href="{{ $widgetData['selected_project']->link }}"
            tag="a"
            target="_blank"
            icon="heroicon-o-link"
        >
            Open in Browser
        </x-filament::button>
        {{-- <x-filament::button
            href="javascript:;"
            tag="a"
        >
            Serve
        </x-filament::button>
        <x-filament::button tag="a" href="javascript:;">
            Run Dev
        </x-filament::button>
        <x-filament::button tag="a" href="javascript:;">
            Build JS
        </x-filament::button> --}}
    </x-filament::section>
</x-filament-widgets::widget>
