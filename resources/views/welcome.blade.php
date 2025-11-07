<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PicCrown</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex-shrink-0 flex items-center">
                    <span class="text-2xl font-bold text-gray-800">PicCrown</span>
                </div>
                <div class="flex items-center">
                    @if (Route::has('login'))
                        <div class="space-x-4">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="text-gray-700 hover:text-gray-900">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="text-gray-700 hover:text-gray-900">Log in</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">
                Welcome to PicCrown
            </h1>
            <p class="text-gray-600 mb-8">
                Share and rate amazing photos with our community.
            </p>
            @guest
                <div class="space-x-4">
                    <a href="{{ route('login') }}" class="inline-block bg-white text-gray-700 px-6 py-3 rounded-md shadow hover:shadow-lg">
                        Get Started
                    </a>
                    <a href="{{ route('register') }}" class="inline-block bg-blue-500 text-white px-6 py-3 rounded-md shadow hover:bg-blue-600">
                        Create Account
                    </a>
                </div>
            @endguest
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-white mt-12">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <p class="text-center text-gray-500 text-sm">
                © 2025 PicCrown. All rights reserved.
            </p>
        </div>
    </footer>
</body>
</html>