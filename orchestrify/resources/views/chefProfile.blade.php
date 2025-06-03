<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Your Profile | Conductor | Simulateur d'Orchestre</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
                        <a href="dashboard.html" class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors duration-300">Dashboard</a>
                        <a href="profile.html" class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors duration-300">Profile</a>
                        <a href="logout.html" class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors duration-300">Logout</a>
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
                    <div class="w-16 h-16 bg-white bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                        </svg>
                    </div>
                    <h2 class="text-3xl font-playfair font-bold">Complete Your Conductor Profile</h2>
                    <p class="text-gray-400 mt-2">Tell us about your orchestra and conducting experience</p>
                </div>
                
                <!-- Progress Indicator -->
                <div class="mb-8">
                    <div class="flex items-center justify-center space-x-4 text-sm">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
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
                
                <!-- Conductor Profile Form -->
                <form action="/api/complete-profile/conductor" method="POST" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label for="orchestre_nom" class="block text-sm font-medium text-gray-300">
                                Orchestra Name *
                            </label>
                            <input
                                type="text"
                                id="orchestre_nom"
                                name="orchestre_nom"
                                required
                                placeholder="e.g., Paris Symphony Orchestra"
                                class="w-full bg-transparent border border-gray-700 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-white focus:border-white text-white"
                            >
                        </div>
                        
                        <div class="space-y-2">
                            <label for="experience" class="block text-sm font-medium text-gray-300">
                                Years of Experience
                            </label>
                            <input
                                type="number"
                                id="experience"
                                name="experience"
                                min="0"
                                max="50"
                                placeholder="e.g., 5"
                                class="w-full bg-transparent border border-gray-700 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-white focus:border-white text-white"
                            >
                        </div>
                        
                        <div class="space-y-2">
                            <label for="formation" class="block text-sm font-medium text-gray-300">
                                Musical Formation/Education
                            </label>
                            <select
                                id="formation"
                                name="formation"
                                class="w-full bg-gray-800 border border-gray-700 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-white focus:border-white text-white"
                            >
                                <option value="">Select your formation</option>
                                <option value="Autodidacte">Self-taught (Autodidacte)</option>
                                <option value="Cours privés">Private Lessons (Cours privés)</option>
                                <option value="École de musique">Music School (École de musique)</option>
                                <option value="Conservatoire">Conservatory (Conservatoire)</option>
                                <option value="Université">University (Université)</option>
                                <option value="Master">Master's Degree</option>
                                <option value="Doctorat">Doctorate (Doctorat)</option>
                            </select>
                        </div>
                        
                        <div class="space-y-2">
                            <label for="nombre_musiciens" class="block text-sm font-medium text-gray-300">
                                Number of Musicians
                            </label>
                            <input
                                type="number"
                                id="nombre_musiciens"
                                name="nombre_musiciens"
                                min="1"
                                max="200"
                                placeholder="e.g., 50"
                                class="w-full bg-transparent border border-gray-700 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-white focus:border-white text-white"
                            >
                        </div>
                    </div>
                    
                    <div class="space-y-2">
                        <label for="style" class="block text-sm font-medium text-gray-300">
                            Preferred Musical Style
                        </label>
                        <select
                            id="style"
                            name="style"
                            class="w-full bg-gray-800 border border-gray-700 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-white focus:border-white text-white"
                        >
                            <option value="">Select your preferred style</option>
                            <option value="Classique">Classical (Classique)</option>
                            <option value="Romantique">Romantic (Romantique)</option>
                            <option value="Baroque">Baroque</option>
                            <option value="Moderne">Modern (Moderne)</option>
                            <option value="Contemporain">Contemporary (Contemporain)</option>
                            <option value="Jazz">Jazz</option>
                            <option value="Musique de film">Film Music (Musique de film)</option>
                            <option value="Opéra">Opera (Opéra)</option>
                            <option value="Symphonique">Symphonic (Symphonique)</option>
                            <option value="Chambre">Chamber Music (Musique de chambre)</option>
                        </select>
                    </div>
                    
                    <div class="space-y-2">
                        <label for="biographie" class="block text-sm font-medium text-gray-300">
                            Biography (Optional)
                        </label>
                        <textarea
                            id="biographie"
                            name="biographie"
                            rows="4"
                            placeholder="Tell us about your musical journey, conducting philosophy, and notable achievements..."
                            class="w-full bg-transparent border border-gray-700 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-white focus:border-white text-white resize-none"
                        ></textarea>
                    </div>
                    
                    <button
                        type="submit"
                        class="w-full py-3 px-6 bg-white text-black font-medium rounded-md hover:bg-gray-200 transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-900"
                    >
                        Complete Profile & Start Conducting
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>