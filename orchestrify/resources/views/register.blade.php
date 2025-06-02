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

        /* Hide all forms by default */
        #conductor-form,
        #musician-form {
            display: none;
        }

        /* Show conductor form when conductor radio is checked */
        #conductor:checked~#conductor-form {
            display: block;
            animation: fadeIn 0.3s ease-in-out;
        }

        /* Show musician form when musician radio is checked */
        #musician:checked~#musician-form {
            display: block;
            animation: fadeIn 0.3s ease-in-out;
        }

        /* Style for selected role card */
        #conductor:checked~.role-cards .conductor-card {
            border-color: white;
            background-color: rgba(255, 255, 255, 0.1);
        }

        #musician:checked~.role-cards .musician-card {
            border-color: white;
            background-color: rgba(255, 255, 255, 0.1);
        }

        /* Animation for form appearance */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Role card hover effects */
        .role-card {
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .role-card:hover {
            transform: translateY(-5px);
        }

        /* Hide all forms by default */
        #conductor-form,
        #musician-form {
            display: none;
        }

        /* Show conductor form when conductor radio is checked */
        #conductor:checked~#conductor-form {
            display: block;
            animation: fadeIn 0.3s ease-in-out;
        }

        /* Show musician form when musician radio is checked */
        #musician:checked~#musician-form {
            display: block;
            animation: fadeIn 0.3s ease-in-out;
        }

        /* Style for selected role card */
        #conductor:checked~.role-cards .conductor-card {
            border-color: white;
            background-color: rgba(255, 255, 255, 0.1);
        }

        #musician:checked~.role-cards .musician-card {
            border-color: white;
            background-color: rgba(255, 255, 255, 0.1);
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
                        <a href="login.html"
                            class="px-5 py-2 text-sm font-medium text-white border border-gray-600 rounded-md hover:bg-white hover:text-black transition-colors duration-300">Login</a>
                        <a href="register.html"
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

        <div class="relative z-10 w-full max-w-4xl px-6 mx-auto">
            <div class="bg-gray-900 bg-opacity-80 backdrop-blur-md rounded-xl shadow-2xl p-8 border border-gray-800">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-playfair font-bold">Join the Orchestra</h2>
                    <p class="text-gray-400 mt-2">Create your account to start conducting</p>
                </div>

                <!-- Role Selection (Hidden Radio Buttons) -->
                <input type="radio" id="conductor" name="role" value="conductor" class="hidden">
                <input type="radio" id="musician" name="role" value="musician" class="hidden">

                <!-- Role Selection Cards -->
                <div class="mb-8">
                    <h3 class="text-xl font-medium mb-6 text-center">Choose your role</h3>

                    <div class="role-cards grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Conductor Role -->
                        <label for="conductor"
                            class="role-card conductor-card border border-gray-700 rounded-lg p-6 text-center">
                            <div
                                class="w-16 h-16 bg-white bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                    </path>
                                </svg>
                            </div>
                            <h4 class="text-lg font-medium mb-2">Conductor</h4>
                            <p class="text-gray-400 text-sm">
                                Create and manage orchestras, define musical programs, and conduct performances.
                            </p>
                        </label>

                        <!-- Musician Role -->
                        <label for="musician"
                            class="role-card musician-card border border-gray-700 rounded-lg p-6 text-center">
                            <div
                                class="w-16 h-16 bg-white bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3">
                                    </path>
                                </svg>
                            </div>
                            <h4 class="text-lg font-medium mb-2">Musician</h4>
                            <p class="text-gray-400 text-sm">
                                Join orchestras, play your instrument, and participate in virtual performances.
                            </p>
                        </label>
                    </div>
                </div>

                <!-- Conductor Registration Form -->
                <form id="conductor-form" action="/api/register/conductor" method="POST" class="space-y-6">
                    <input type="hidden" name="role" value="conductor">

                    <h3 class="text-xl font-medium mb-4">Conductor Registration</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label for="conductor-name" class="block text-sm font-medium text-gray-300">
                                Full Name *
                            </label>
                            <input type="text" id="conductor-name" name="fullName" required
                                class="w-full bg-transparent border border-gray-700 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-white focus:border-white text-white">
                        </div>

                        <div class="space-y-2">
                            <label for="conductor-email" class="block text-sm font-medium text-gray-300">
                                Email Address *
                            </label>
                            <input type="email" id="conductor-email" name="email" required
                                class="w-full bg-transparent border border-gray-700 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-white focus:border-white text-white">
                        </div>

                        <div class="space-y-2">
                            <label for="conductor-password" class="block text-sm font-medium text-gray-300">
                                Password *
                            </label>
                            <input type="password" id="conductor-password" name="password" required
                                class="w-full bg-transparent border border-gray-700 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-white focus:border-white text-white">
                        </div>

                        <div class="space-y-2">
                            <label for="conductor-confirm-password" class="block text-sm font-medium text-gray-300">
                                Confirm Password *
                            </label>
                            <input type="password" id="conductor-confirm-password" name="confirmPassword" required
                                class="w-full bg-transparent border border-gray-700 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-white focus:border-white text-white">
                        </div>

                        <div class="space-y-2">
                            <label for="conducting-experience" class="block text-sm font-medium text-gray-300">
                                Conducting Experience *
                            </label>
                            <select id="conducting-experience" name="experience" required
                                class="w-full bg-gray-800 border border-gray-700 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-white focus:border-white text-white">
                                <option value="">Select experience level</option>
                                <option value="none">No Experience</option>
                                <option value="amateur">Amateur</option>
                                <option value="student">Student</option>
                                <option value="professional">Professional</option>
                            </select>
                        </div>

                        <div class="space-y-2">
                            <label for="organization" class="block text-sm font-medium text-gray-300">
                                Organization (Optional)
                            </label>
                            <input type="text" id="organization" name="organization"
                                class="w-full bg-transparent border border-gray-700 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-white focus:border-white text-white">
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label class="flex items-start">
                                <input type="checkbox" name="terms" required
                                    class="mt-1 mr-3 rounded bg-transparent border-gray-700 text-white focus:ring-white">
                                <span class="text-sm text-gray-400">
                                    I agree to the <a href="/terms" class="text-white hover:underline">Terms of
                                        Service</a> and
                                    <a href="/privacy" class="text-white hover:underline"> Privacy Policy</a> *
                                </span>
                            </label>
                        </div>

                        <button type="submit"
                            class="w-full py-3 px-6 bg-white text-black font-medium rounded-md hover:bg-gray-200 transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-900">
                            Create Conductor Account
                        </button>
                    </div>
                </form>

                <!-- Musician Registration Form -->
                <form id="musician-form" action="/api/register/musician" method="POST" class="space-y-6">
                    <input type="hidden" name="role" value="musician">

                    <h3 class="text-xl font-medium mb-4">Musician Registration</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label for="musician-name" class="block text-sm font-medium text-gray-300">
                                Full Name *
                            </label>
                            <input type="text" id="musician-name" name="fullName" required
                                class="w-full bg-transparent border border-gray-700 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-white focus:border-white text-white">
                        </div>

                        <div class="space-y-2">
                            <label for="musician-email" class="block text-sm font-medium text-gray-300">
                                Email Address *
                            </label>
                            <input type="email" id="musician-email" name="email" required
                                class="w-full bg-transparent border border-gray-700 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-white focus:border-white text-white">
                        </div>

                        <div class="space-y-2">
                            <label for="musician-password" class="block text-sm font-medium text-gray-300">
                                Password *
                            </label>
                            <input type="password" id="musician-password" name="password" required
                                class="w-full bg-transparent border border-gray-700 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-white focus:border-white text-white">
                        </div>

                        <div class="space-y-2">
                            <label for="musician-confirm-password" class="block text-sm font-medium text-gray-300">
                                Confirm Password *
                            </label>
                            <input type="password" id="musician-confirm-password" name="confirmPassword" required
                                class="w-full bg-transparent border border-gray-700 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-white focus:border-white text-white">
                        </div>

                        <div class="space-y-2">
                            <label for="instrument" class="block text-sm font-medium text-gray-300">
                                Primary Instrument *
                            </label>
                            <select id="instrument" name="instrument" required
                                class="w-full bg-gray-800 border border-gray-700 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-white focus:border-white text-white">
                                <option value="">Select your instrument</option>
                                <option value="violin">Violin</option>
                                <option value="viola">Viola</option>
                                <option value="cello">Cello</option>
                                <option value="double-bass">Double Bass</option>
                                <option value="flute">Flute</option>
                                <option value="oboe">Oboe</option>
                                <option value="clarinet">Clarinet</option>
                                <option value="bassoon">Bassoon</option>
                                <option value="horn">French Horn</option>
                                <option value="trumpet">Trumpet</option>
                                <option value="trombone">Trombone</option>
                                <option value="tuba">Tuba</option>
                                <option value="percussion">Percussion</option>
                                <option value="piano">Piano</option>
                                <option value="harp">Harp</option>
                            </select>
                        </div>

                        <div class="space-y-2">
                            <label for="experience" class="block text-sm font-medium text-gray-300">
                                Experience Level *
                            </label>
                            <select id="experience" name="experience" required
                                class="w-full bg-gray-800 border border-gray-700 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-white focus:border-white text-white">
                                <option value="">Select experience level</option>
                                <option value="beginner">Beginner (0-2 years)</option>
                                <option value="intermediate">Intermediate (3-5 years)</option>
                                <option value="advanced">Advanced (6-10 years)</option>
                                <option value="professional">Professional (10+ years)</option>
                            </select>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-3">Preferred Musical Styles</label>
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                                <label class="flex items-center">
                                    <input type="checkbox" name="musicalStyles" value="classical"
                                        class="mr-2 rounded bg-transparent border-gray-700 text-white focus:ring-white">
                                    <span class="text-sm">Classical</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="musicalStyles" value="romantic"
                                        class="mr-2 rounded bg-transparent border-gray-700 text-white focus:ring-white">
                                    <span class="text-sm">Romantic</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="musicalStyles" value="baroque"
                                        class="mr-2 rounded bg-transparent border-gray-700 text-white focus:ring-white">
                                    <span class="text-sm">Baroque</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="musicalStyles" value="modern"
                                        class="mr-2 rounded bg-transparent border-gray-700 text-white focus:ring-white">
                                    <span class="text-sm">Modern</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="musicalStyles" value="jazz"
                                        class="mr-2 rounded bg-transparent border-gray-700 text-white focus:ring-white">
                                    <span class="text-sm">Jazz</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="musicalStyles" value="contemporary"
                                        class="mr-2 rounded bg-transparent border-gray-700 text-white focus:ring-white">
                                    <span class="text-sm">Contemporary</span>
                                </label>
                            </div>
                        </div>

                        <div>
                            <label class="flex items-start">
                                <input type="checkbox" name="terms" required
                                    class="mt-1 mr-3 rounded bg-transparent border-gray-700 text-white focus:ring-white">
                                <span class="text-sm text-gray-400">
                                    I agree to the <a href="/terms" class="text-white hover:underline">Terms of
                                        Service</a> and
                                    <a href="/privacy" class="text-white hover:underline"> Privacy Policy</a> *
                                </span>
                            </label>
                        </div>

                        <button type="submit"
                            class="w-full py-3 px-6 bg-white text-black font-medium rounded-md hover:bg-gray-200 transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-900">
                            Create Musician Account
                        </button>
                    </div>
                </form>

                <!-- Login Link -->
                <div class="text-center mt-6">
                    <p class="text-sm text-gray-400">
                        Already have an account?
                        <a href="login.html" class="text-white hover:underline ml-1">
                            Sign in here
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>