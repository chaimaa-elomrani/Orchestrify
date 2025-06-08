<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Simulateur d'Orchestre</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400&family=Inter:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'playfair': ['"Playfair Display"', 'serif'],
                        'sans': ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        .register-bg {
            background-image: url('https://images.unsplash.com/photo-1465847899084-d164df4dedc6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            position: relative;
            z-index: 0;
            overflow: hidden;
        }
    </style>
</head>

<body class="bg-black text-white font-sans antialiased min-h-screen flex flex-col">
    <!-- Navigation -->
    <nav class="w-full z-50 bg-black bg-opacity-80 backdrop-blur-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <div class="flex items-center">
                    <a href="index.html" class="flex-shrink-0">
                        <h1 class="text-2xl font-playfair font-bold tracking-wider">
                            <span class="text-white">Simulateur</span>
                            <span class="text-gray-400">d'Orchestre</span>
                        </h1>
                    </a>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-8">
                        <a href="index.html"
                            class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors duration-300">Home</a>
                        <a href="index.html#about"
                            class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors duration-300">About</a>
                        <a href="index.html#how-it-works"
                            class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors duration-300">How
                            It Works</a>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="flex items-center space-x-4">
                        <a href="/login"
                            class="px-5 py-2 text-sm font-medium text-white border border-gray-600 rounded-md hover:bg-white hover:text-black transition-colors duration-300">Login</a>
                        <a href="/register"
                            class="px-5 py-2 text-sm font-medium text-black bg-white rounded-md hover:bg-gray-200 transition-colors duration-300">Register</a>
                    </div>
                </div>
                <div class="md:hidden">
                    <button type="button" class="text-gray-400 hover:text-white focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Register Section -->
    <div class="flex-grow flex items-center justify-center register-bg py-12">
        <div class="absolute inset-0 bg-black bg-opacity-70 backdrop-blur-sm"></div>

        <div class="relative z-10 w-full max-w-2xl px-6 mx-auto">
            <div class="bg-gray-900 bg-opacity-80 backdrop-blur-md rounded-xl shadow-2xl p-8 border border-gray-800">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-playfair font-bold">Join the Orchestra</h2>
                    <p class="text-gray-400 mt-2">Create your account to get started</p>
                </div>

                <!-- Registration Form -->
                <form action="{{ route('login') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


                        <div class="space-y-2">
                            <label for="email" class="block text-sm font-medium text-gray-300">
                                Email Address *
                            </label>
                            <input type="email" id="email" name="email" required
                                class="w-full bg-transparent border border-gray-700 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-white focus:border-white text-white">
                        </div>

                        <div class="space-y-2">
                            <label for="password" class="block text-sm font-medium text-gray-300">
                                Password *
                            </label>
                            <input type="password" id="password" name="password" required
                                class="w-full bg-transparent border border-gray-700 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-white focus:border-white text-white">
                        </div>

                    </div>

                    <div class="space-y-4">


                        <button type="submit"
                            class="w-full py-3 px-6 bg-white text-black font-medium rounded-md hover:bg-gray-200 transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-900">
                            Create Account
                        </button>
                    </div>
                </form>

                <!-- Login Link -->
                <div class="text-center mt-6">
                    <p class="text-sm text-gray-400">
                        Already have an account?
                        <a href="/register" class="text-white hover:underline ml-1">
                            Sign in here
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>