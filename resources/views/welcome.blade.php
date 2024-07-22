<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minimal Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col min-h-screen bg-gray-50 text-gray-800">
    <!-- Navbar -->
    <nav class="bg-white border-b border-gray-200 p-4 shadow-sm">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-semibold text-gray-800">Dashboard</h1>
            <div class="relative">
                <button id="dropdownButton" class="bg-gray-100 hover:bg-gray-200 text-gray-700 py-2 px-4 rounded transition duration-300">
                    Menu
                </button>
                <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-20 border border-gray-200">
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition duration-300">Profile</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition duration-300">Settings</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition duration-300">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main content area with sidebar -->
    <div class="flex flex-1 overflow-hidden">
        <!-- Sidebar -->
        <aside class="bg-white w-64 p-6 border-r border-gray-200">
            <h2 class="text-lg font-semibold mb-6 text-gray-700">Menu</h2>
            <ul class="space-y-2">
                <li><a href="#" class="block py-2 text-gray-600 hover:text-blue-600 transition duration-300">Dashboard</a></li>
                <li><a href="#" class="block py-2 text-gray-600 hover:text-blue-600 transition duration-300">Analytics</a></li>
                <li><a href="#" class="block py-2 text-gray-600 hover:text-blue-600 transition duration-300">Reports</a></li>
                <li><a href="#" class="block py-2 text-gray-600 hover:text-blue-600 transition duration-300">Settings</a></li>
            </ul>
        </aside>

        <!-- Main content -->
        <main class="flex-1 p-8 overflow-y-auto">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Welcome to your Dashboard</h2>
            <p class="text-gray-600">This is where your main content would go. The minimal theme provides a clean and focused interface for your data and controls.</p>
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 p-4 text-center mt-auto">
        <p class="text-gray-600">&copy; 2024 Your Company. All rights reserved.</p>
    </footer>

    <script>
        // Toggle dropdown menu
        const dropdownButton = document.getElementById('dropdownButton');
        const dropdownMenu = document.getElementById('dropdownMenu');

        dropdownButton.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
        });

        // Close dropdown when clicking outside
        window.addEventListener('click', (e) => {
            if (!dropdownButton.contains(e.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    </script>
</body>
</html>
