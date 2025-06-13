<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulateur d'Orchestre | Virtual Orchestra Experience</title>
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
                    },
                    colors: {
                        'accent': '#D4AF37',
                    },
                    animation: {
                        'fade-in': 'fadeIn 1s ease-in-out',
                        'slide-up': 'slideUp 0.8s ease-out',
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(20px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .hero-gradient {
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.9));
        }

        .scroll-indicator {
            animation: bounce 2s infinite;
        }

        @keyframes bounce {

            0%,
            20%,
            50%,
            80%,
            100% {
                transform: translateY(0);
            }

            40% {
                transform: translateY(-20px);
            }

            60% {
                transform: translateY(-10px);
            }
        }

        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>
</head>

<body class="bg-black text-white font-sans antialiased">
    <!-- Navigation -->
    @if(auth()->check() && auth()->user()->isChef())
        <!-- Chef Navigation -->
        <nav class="fixed w-full z-50 bg-gray-900 text-white shadow-lg">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-20">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <h1 class="text-2xl font-playfair font-bold tracking-wider">
                                <span class="text-white">Simulateur</span>
                                <span class="text-gray-400">d'Orchestre</span>
                            </h1>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <a href="{{ route('home') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Home</a>
                            <a href="{{ route('chef.dashboard') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Dashboard</a>
                            <a href="{{ route('chef.programs') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Programs</a>
                            <a href="{{ route('chef.musicians') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Musicians</a>
                            <a href="{{ route('chef.instruments') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Instruments</a>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="flex items-center space-x-4">
                            <span class="text-sm text-gray-300">Welcome, {{ auth()->user()->name }}</span>
                            <form method="GET" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="px-5 py-2 text-sm font-medium text-white border border-gray-600 rounded-md hover:bg-white hover:text-black transition-colors duration-300 inline-block">
                                    Logout
                                </button>
                            </form>
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
    @else
        <!-- Default Navigation -->
        <nav class="fixed w-full z-50 bg-black bg-opacity-80 backdrop-blur-md">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-20">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <h1 class="text-2xl font-playfair font-bold tracking-wider">
                                <span class="text-white">Simulateur</span>
                                <span class="text-gray-400">d'Orchestre</span>
                            </h1>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-8">
                            <a href="#"
                                class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors duration-300">Home</a>
                            <a href="#about"
                                class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors duration-300">About</a>
                            <a href="#how-it-works"
                                class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors duration-300">How
                                It Works</a>
                            <a href="#"
                                class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors duration-300">Features</a>
                            <a href="#"
                                class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors duration-300">Contact</a>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="flex items-center space-x-4">
                            @auth
                                <span class="text-sm text-gray-300">Welcome, {{ auth()->user()->name }}</span>
                                <form method="POST" action="{{ route('logout') }}" class="inline">
                                    @csrf
                                    <button type="submit" class="px-5 py-2 text-sm font-medium text-white border border-gray-600 rounded-md hover:bg-white hover:text-black transition-colors duration-300">
                                        Logout
                                    </button>
                                </form>
                            @else
                                <a href="/login"
                                    class="px-5 py-2 text-sm font-medium text-white border border-gray-600 rounded-md hover:bg-white hover:text-black transition-colors duration-300">Login</a>
                                <a href="/register"
                                    class="px-5 py-2 text-sm font-medium text-black bg-white rounded-md hover:bg-gray-200 transition-colors duration-300">Register</a>
                            @endauth
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
    @endif

    <!-- Hero Section -->
    <section class="relative h-screen flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1465847899084-d164df4dedc6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1920&q=80"
                alt="Orchestra Performance" class="w-full h-full object-cover opacity-50">
            <div class="absolute inset-0 hero-gradient"></div>
        </div>

        <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-playfair font-bold leading-tight animate-fade-in">
                Virtual Orchestra <br>
                <span class="text-gray-300">at Your Fingertips</span>
            </h1>
            <p class="mt-6 text-xl md:text-2xl text-gray-300 max-w-3xl mx-auto animate-fade-in"
                style="animation-delay: 0.3s">
                Conduct, compose, and experience the magic of a full orchestra simulation with real-time sound and
                visual synchronization.
            </p>
            <div class="mt-10 flex flex-col sm:flex-row justify-center gap-4 animate-fade-in"
                style="animation-delay: 0.6s">
                @auth
                    @if(auth()->user()->isChef())
                        <a href="{{ route('chef.dashboard') }}"
                            class="px-8 py-4 text-lg font-medium text-black bg-white rounded-md hover:bg-gray-200 transition-all duration-300 transform hover:scale-105">
                            Go to Dashboard
                        </a>
                    @else
                        <a href="#"
                            class="px-8 py-4 text-lg font-medium text-black bg-white rounded-md hover:bg-gray-200 transition-all duration-300 transform hover:scale-105">
                            Start Playing
                        </a>
                    @endif
                @else
                    <a href="register.html"
                        class="px-8 py-4 text-lg font-medium text-black bg-white rounded-md hover:bg-gray-200 transition-all duration-300 transform hover:scale-105">
                        Start Conducting
                    </a>
                @endauth
                <a href="#how-it-works"
                    class="px-8 py-4 text-lg font-medium text-white border border-white rounded-md hover:bg-white hover:text-black transition-all duration-300">
                    Learn More
                </a>
            </div>
        </div>

        <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 z-10">
            <a href="#about" class="scroll-indicator flex flex-col items-center text-gray-400 hover:text-white">
                <span class="text-sm mb-2">Scroll to explore</span>
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                </svg>
            </a>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-24 bg-gradient-to-b from-black to-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-5xl font-playfair font-bold mb-4">About the Simulator</h2>
                <div class="w-24 h-1 bg-white mx-auto"></div>
                <p class="mt-6 text-xl text-gray-300 max-w-3xl mx-auto">
                    Experience the power of conducting a full orchestra from anywhere in the world. Our simulator brings
                    together technology and art in perfect harmony.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 mt-16">
                <!-- Feature Card 1 -->
                <div class="bg-gray-900 rounded-lg p-8 card-hover">
                    <div class="w-16 h-16 bg-white bg-opacity-10 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-playfair font-semibold mb-3">Realistic Sound</h3>
                    <p class="text-gray-400">
                        Experience high-fidelity audio samples from professional musicians, perfectly synchronized to
                        create an immersive orchestral experience.
                    </p>
                </div>

                <!-- Feature Card 2 -->
                <div class="bg-gray-900 rounded-lg p-8 card-hover">
                    <div class="w-16 h-16 bg-white bg-opacity-10 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-playfair font-semibold mb-3">Visual Feedback</h3>
                    <p class="text-gray-400">
                        Watch as musicians respond to your conducting in real-time with visual cues and animations that
                        bring your virtual orchestra to life.
                    </p>
                </div>

                <!-- Feature Card 3 -->
                <div class="bg-gray-900 rounded-lg p-8 card-hover">
                    <div class="w-16 h-16 bg-white bg-opacity-10 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-playfair font-semibold mb-3">Complete Control</h3>
                    <p class="text-gray-400">
                        Adjust tempo, dynamics, and musical expression with intuitive controls that give you the power
                        of a real conductor's baton.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section id="how-it-works" class="py-24 bg-black">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-5xl font-playfair font-bold mb-4">How It Works</h2>
                <div class="w-24 h-1 bg-white mx-auto"></div>
                <p class="mt-6 text-xl text-gray-300 max-w-3xl mx-auto">
                    From selection to simulation, our platform makes orchestral conducting accessible to everyone.
                </p>
            </div>

            <div class="relative">
                <!-- Timeline Line -->
                <div class="hidden md:block absolute left-1/2 transform -translate-x-1/2 h-full w-0.5 bg-gray-700">
                </div>

                <!-- Step 1 -->
                <div class="relative mb-20">
                    <div class="md:flex items-center">
                        <div class="md:w-1/2 pr-8 md:text-right mb-8 md:mb-0">
                            <div class="bg-gray-900 p-6 rounded-lg inline-block card-hover">
                                <h3 class="text-2xl font-playfair font-semibold mb-3">Select Your Musicians</h3>
                                <p class="text-gray-400">
                                    Choose from a wide range of instruments and musicians with different styles and
                                    expertise levels.
                                </p>
                            </div>
                        </div>
                        <div
                            class="hidden md:block absolute left-1/2 transform -translate-x-1/2 w-12 h-12 rounded-full bg-white bg-opacity-10 border-4 border-gray-900 z-10 flex items-center justify-center">
                            <span class="text-xl font-bold">1</span>
                        </div>
                        <div class="md:w-1/2 pl-8">
                            <img src="https://images.unsplash.com/photo-1507838153414-b4b713384a76?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=800&q=80"
                                alt="Musicians Selection" class="rounded-lg shadow-2xl w-full h-64 object-cover">
                        </div>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="relative mb-20">
                    <div class="md:flex items-center">
                        <div class="md:w-1/2 pr-8 md:text-right mb-8 md:mb-0 md:order-2">
                            <div class="bg-gray-900 p-6 rounded-lg inline-block card-hover">
                                <h3 class="text-2xl font-playfair font-semibold mb-3">Define Your Program</h3>
                                <p class="text-gray-400">
                                    Set tempo, duration, style, and arrangement order to create your perfect musical
                                    program.
                                </p>
                            </div>
                        </div>
                        <div
                            class="hidden md:block absolute left-1/2 transform -translate-x-1/2 w-12 h-12 rounded-full bg-white bg-opacity-10 border-4 border-gray-900 z-10 flex items-center justify-center">
                            <span class="text-xl font-bold">2</span>
                        </div>
                        <div class="md:w-1/2 pl-8 md:order-1">
                            <img src="https://images.unsplash.com/photo-1507838153414-b4b713384a76?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=800&q=80"
                                alt="Program Definition" class="rounded-lg shadow-2xl w-full h-64 object-cover">
                        </div>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="relative">
                    <div class="md:flex items-center">
                        <div class="md:w-1/2 pr-8 md:text-right mb-8 md:mb-0">
                            <div class="bg-gray-900 p-6 rounded-lg inline-block card-hover">
                                <h3 class="text-2xl font-playfair font-semibold mb-3">Launch the Simulation</h3>
                                <p class="text-gray-400">
                                    Experience real-time sound and visual synchronization as your virtual orchestra
                                    comes to life under your direction.
                                </p>
                            </div>
                        </div>
                        <div
                            class="hidden md:block absolute left-1/2 transform -translate-x-1/2 w-12 h-12 rounded-full bg-white bg-opacity-10 border-4 border-gray-900 z-10 flex items-center justify-center">
                            <span class="text-xl font-bold">3</span>
                        </div>
                        <div class="md:w-1/2 pl-8">
                            <img src="https://images.unsplash.com/photo-1465847899084-d164df4dedc6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=800&q=80"
                                alt="Orchestra Simulation" class="rounded-lg shadow-2xl w-full h-64 object-cover">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-24 bg-gradient-to-b from-gray-900 to-black relative overflow-hidden">
        <div class="absolute inset-0 z-0 opacity-20">
            <img src="https://images.unsplash.com/photo-1511192336575-5a79af67a629?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1920&q=80"
                alt="Music Background" class="w-full h-full object-cover">
        </div>

        <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-5xl font-playfair font-bold mb-6">Ready to Conduct Your Orchestra?</h2>
            <p class="text-xl text-gray-300 max-w-3xl mx-auto mb-10">
                Join thousands of music enthusiasts and professionals who are already experiencing the magic of virtual
                orchestration.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-6">
                <a href="register.html"
                    class="px-8 py-4 text-lg font-medium text-black bg-white rounded-md hover:bg-gray-200 transition-all duration-300 transform hover:scale-105">
                    Create Your Account
                </a>
                <a href="#"
                    class="px-8 py-4 text-lg font-medium text-white border border-white rounded-md hover:bg-white hover:text-black transition-all duration-300">
                    Watch Demo
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-black py-12 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
                <div>
                    <h3 class="text-xl font-playfair font-bold mb-4">Simulateur d'Orchestre</h3>
                    <p class="text-gray-400">
                        The ultimate virtual orchestra experience for conductors and musicians alike.
                    </p>
                </div>
                <div>
                    <h4 class="text-lg font-medium mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">Home</a>
                        </li>
                        <li><a href="#about"
                                class="text-gray-400 hover:text-white transition-colors duration-300">About</a></li>
                        <li><a href="#how-it-works"
                                class="text-gray-400 hover:text-white transition-colors duration-300">How It Works</a>
                        </li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white transition-colors duration-300">Features</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-medium mb-4">Resources</h4>
                    <ul class="space-y-2">
                        <li><a href="#"
                                class="text-gray-400 hover:text-white transition-colors duration-300">Documentation</a>
                        </li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">API</a>
                        </li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white transition-colors duration-300">Support</a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white transition-colors duration-300">Community</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-medium mb-4">Connect</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z">
                                </path>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z">
                                </path>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="mt-12 pt-8 border-t border-gray-800 text-center text-gray-400">
                <p>&copy; 2025 Simulateur d'Orchestre. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Intersection Observer for scroll animations
        document.addEventListener('DOMContentLoaded', function () {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-slide-up');
                        entry.target.style.opacity = 1;
                    }
                });
            }, {
                threshold: 0.1
            });

            // Observe all feature cards and timeline items
            document.querySelectorAll('.card-hover, .bg-gray-900').forEach(el => {
                el.style.opacity = 0;
                observer.observe(el);
            });
        });
    </script>
</body>

</html>