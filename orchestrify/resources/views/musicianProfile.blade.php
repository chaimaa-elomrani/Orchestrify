<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Your Profile | Musician | Simulateur d'Orchestre</title>
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
                        <a href="dashboard.html"
                            class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors duration-300">Dashboard</a>
                        <a href="profile.html"
                            class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors duration-300">Profile</a>
                        <a href="logout.html"
                            class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors duration-300">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Complete Profile Section -->
    <div class="flex-grow flex items-center justify-center register-bg py-12">
        <div class="absolute inset-0 bg-black bg-opacity-70 backdrop-blur-sm"></div>

        <div class="relative z-10 w-full max-w-2xl px-6 mx-auto">
            <div class="bg-gray-900 bg-opacity-80 backdrop-blur-md rounded-xl shadow-2xl p-8 border border-gray-800">
                <div class="text-center mb-8">
                    <div
                        class="w-16 h-16 bg-white bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3">
                            </path>
                        </svg>
                    </div>
                    <h2 class="text-3xl font-playfair font-bold">Complete Your Musician Profile</h2>
                    <p class="text-gray-400 mt-2">Tell us about your musical skills and preferences</p>
                </div>

                <!-- Progress Indicator -->
                <div class="mb-8">
                    <div class="flex items-center justify-center space-x-4 text-sm">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="ml-2 text-green-400">Account Created</span>
                        </div>
                        <div class="w-8 h-0.5 bg-gray-600"></div>
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center">
                                <span class="text-black font-medium">2</span>
                            </div>
                            <span class="ml-2 text-white">Complete Profile</span>
                        </div>
                    </div>
                </div>

                <!-- Musician Profile Form -->
                <form action="{{ route('musician.profile.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label for="instrument" class="block text-sm font-medium text-gray-300">
                                Primary Instrument *
                            </label>
                            <select id="instrument" name="instrument_id" required
                                class="w-full bg-gray-800 border border-gray-700 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-white focus:border-white text-white">
                                <option value="">Select your primary instrument</option>
                                @foreach ($instruments as $instrument)
                                    <option value="{{ $instrument->id }}">{{ $instrument->nom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="space-y-2">
                            <label for="niveau" class="block text-sm font-medium text-gray-300">
                                Skill Level *
                            </label>
                            <select id="niveau" name="level" required
                                class="w-full bg-gray-800 border border-gray-700 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-white focus:border-white text-white">
                                <option value="">Select your level</option>
                                <option value="débutant">Beginner (Débutant)</option>
                                <option value="intermédiaire">Intermediate (Intermédiaire)</option>
                                <option value="avancé">Advanced (Avancé)</option>
                            </select>
                        </div>

                        <div class="space-y-2">
                            <label for="experience" class="block text-sm font-medium text-gray-300">
                                Years of Experience
                            </label>
                            <input type="number" id="experience" name="experience" min="0" max="50"
                                placeholder="e.g., 8"
                                class="w-full bg-transparent border border-gray-700 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-white focus:border-white text-white">
                        </div>

                        <div class="space-y-2">
                            <label for="disponibilite" class="block text-sm font-medium text-gray-300">
                                Availability
                            </label>
                            <select id="disponibilite" name="disponibility"
                                class="w-full bg-gray-800 border border-gray-700 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-white focus:border-white text-white">
                                <option value="">Select your availability</option>
                                <option value="Week-end">Weekends (Week-end)</option>
                                <option value="Soirée">Evenings (Soirée)</option>
                                <option value="Journée">Daytime (Journée)</option>
                                <option value="Flexible">Flexible</option>
                                <option value="Week-end et soirée">Weekends & Evenings</option>
                                <option value="Temps plein">Full-time (Temps plein)</option>
                            </select>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="style" class="block text-sm font-medium text-gray-300">
                            Preferred Musical Style
                        </label>
                        <select id="style" name="style"
                            class="w-full bg-gray-800 border border-gray-700 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-white focus:border-white text-white">
                            <option value="">Select your preferred style</option>
                            <option value="Classique">Classical (Classique)</option>
                            <option value="Romantique">Romantic (Romantique)</option>
                            <option value="Baroque">Baroque</option>
                            <option value="Moderne">Modern (Moderne)</option>
                            <option value="Contemporain">Contemporary (Contemporain)</option>
                            <option value="Jazz">Jazz</option>
                            <option value="Musique de chambre">Chamber Music (Musique de chambre)</option>
                            <option value="Musique de film">Film Music (Musique de film)</option>
                            <option value="Opéra">Opera (Opéra)</option>
                            <option value="Symphonique">Symphonic (Symphonique)</option>
                        </select>
                    </div>

                    <div class="space-y-2">
                        <label for="biographie" class="block text-sm font-medium text-gray-300">
                            Biography (Optional)
                        </label>
                        <textarea id="biographie" name="bio" rows="4"
                            placeholder="Tell us about your musical journey, favorite pieces to play, and what you love about performing..."
                            class="w-full bg-transparent border border-gray-700 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-white focus:border-white text-white resize-none"></textarea>
                    </div>

                    <button type="submit"
                        class="w-full py-3 px-6 bg-white text-black font-medium rounded-md hover:bg-gray-200 transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-900">
                        Complete Profile & Start Playing
                    </button>
                </form>

            </div>
        </div>
    </div>
</body>

</html>