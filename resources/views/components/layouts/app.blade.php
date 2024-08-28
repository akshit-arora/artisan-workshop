<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ?? 'Page Title' }}</title>
        @vite('resources/css/app.css')
    </head>
    <body class="flex flex-col min-h-screen bg-base-200">
        <!-- Navbar -->
        <nav class="navbar p-4 border-b border-base-300 bg-base-100">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-xl font-semibold">{{ $title }}</h1>
                <div class="relative">
                    @livewire('sidebar.load-project')
                </div>
            </div>
        </nav>
        <!-- Main content area with sidebar -->
        <div class="flex flex-1 overflow-hidden">
            <!-- Sidebar -->
            @include('components.navigation.sidebar')
            <!-- Main content -->
            <main class="flex-1 p-8 overflow-y-auto">
                {{ $slot }}
            </main>
        </div>
        <!-- Footer -->
        <footer class="border-t border-base-300 p-4 text-center mt-auto bg-base-100">
            <p class="">Your own Workshop.</p>
        </footer>
        <!-- Toasts -->
        @session('status')
            <div class="toast">
                <div class="alert alert-info">
                    <span>{{ session('notification') }}</span>
                </div>
            </div>
        @endsession
    </body>
</html>
