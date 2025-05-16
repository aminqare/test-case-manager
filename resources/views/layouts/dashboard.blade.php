<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Device Manager</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-100">

    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md">
            <div class="p-4 text-xl font-bold border-b">📋 Test Manager</div>
            <nav class="p-4 space-y-2 text-sm">
                <a href="/devices" class="block px-3 py-2 rounded hover:bg-gray-100">📱 Devices</a>
                <a href="/issues" class="block px-3 py-2 rounded hover:bg-gray-100">🐞 Issues</a>
            </nav>
        </aside>

        <!-- Main -->
        <main class="flex-1 overflow-y-auto p-6">
            <header class="mb-6">
                <h1 class="text-2xl font-semibold text-gray-800">@yield('title', 'Dashboard')</h1>
            </header>
            @yield('content')
        </main>
    </div>
    @livewire('issue-form')
    @livewireScripts
</body>
</html>
