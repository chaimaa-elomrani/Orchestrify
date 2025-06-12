<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Brigade | Simulateur d'Orchestre</title>
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
                        'conductor': {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                        }
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-100 text-gray-900 font-sans antialiased min-h-screen flex flex-col">
    <!-- Navigation -->
    <nav class="bg-gray-900 text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <h1 class="text-xl font-playfair font-bold tracking-wider">
                            <span class="text-white">Simulateur</span>
                            <span class="text-conductor-400">d'Orchestre</span>
                        </h1>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <a href="conductor-dashboard.html"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Dashboard</a>
                            <a href="#"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Programs</a>
                            <a href="#"
                                class="bg-gray-800 text-white px-3 py-2 rounded-md text-sm font-medium">Musicians</a>
                            <a href="#"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Instruments</a>
                            <a href="#"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">History</a>
                        </div>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6">
                        <button
                            class="p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                            <span class="sr-only">View notifications</span>
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </button>

                        <!-- Profile dropdown -->
                        <div class="ml-3 relative">
                            <div class="flex items-center">
                                <div
                                    class="h-8 w-8 rounded-full bg-conductor-600 flex items-center justify-center text-white font-medium">
                                    JD
                                </div>
                                <span class="ml-2 text-sm font-medium text-white">Jean Dupont</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="flex-grow">
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                <div>
                    <h2 class="font-playfair text-2xl font-bold text-gray-900">Create New Brigade</h2>
                    <p class="text-sm text-gray-500">Form a new section of musicians</p>
                </div>
            </div>
        </header>

        <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <div class="px-4 py-6 sm:px-0">
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <form action="{{route('brigades.store')}}" method="Post">
                            @csrf
                            @if(session('success'))
                                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if($errors->any())
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="space-y-8 divide-y divide-gray-200">
                                <div class="space-y-6">
                                    <div>
                                        <h3 class="text-lg leading-6 font-medium text-gray-900">Brigade Information</h3>
                                        <p class="mt-1 text-sm text-gray-500">
                                            Create a new section or group of musicians for your orchestra.
                                        </p>
                                    </div>

                                    <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                                        <div class="sm:col-span-3">
                                            <label for="name" class="block text-sm font-medium text-gray-700">
                                                Brigade Name *
                                            </label>
                                            <div class="mt-1">
                                                <input type="text" name="name" id="name" required
                                                    class="shadow-sm block w-full sm:text-sm border p-2 border-grey-800 rounded-md"
                                                    placeholder="e.g., Strings Section">
                                            </div>
                                        </div>

                                        <div class="sm:col-span-3">
                                            <label for="type" class="block  text-sm font-medium text-gray-700">
                                                Brigade Type *
                                            </label>
                                            <div class="mt-1">
                                                <select id="type" name="type" required
                                                    class="shadow-sm focus:ring-conductor-500 border p-2 border-grey-800 block w-full sm:text-sm border-gray-300 rounded-md">
                                                    <option value="">Select a type</option>
                                                    <option value="style">Select your preferred style</option>
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
                                        </div>

                                        <div class="sm:col-span-6">
                                            <label for="description" class="block text-sm font-medium text-gray-700">
                                                Description
                                            </label>
                                            <div class="mt-1">
                                                <textarea id="description" name="description" rows="3"
                                                    class="shadow-sm focus:ring-conductor-500 border p-2 border-grey-800 block w-full sm:text-sm border-gray-300 rounded-md"
                                                    placeholder="Describe the purpose and role of this brigade..."></textarea>
                                            </div>
                                            <p class="mt-2 text-sm text-gray-500">Brief description of the brigade's
                                                role in the orchestra.</p>
                                        </div>

                                        
                                        <div class="sm:col-span-3">
                                            <div class="sm:col-span-3">
                                                <label for="type" class="block text-sm font-medium text-gray-700">
                                                    Instruments
                                                </label>
                                                <div class="mt-1">
                                                    <select id="type" name="instruments" required
                                                        class="shadow-sm focus:ring-conductor-500 border p-2 border-grey-800 block w-full sm:text-sm border-gray-300 rounded-md">
                                                        <option value="">Select Brigade's instrument</option>
                                                        @foreach ($instruments as $instrument )
                                                        <option value="{{ $instrument->id }}">{{ $instrument->nom }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sm:col-span-3">
                                            <div class="sm:col-span-3">
                                                <label for="type" class="block text-sm font-medium text-gray-700">
                                                    musicians
                                                </label>
                                                <div class="mt-1">
                                                    <select id="type" name="musician_profiles_id[]" multiple required
                                                        class="shadow-sm focus:ring-conductor-500 border p-2 border-grey-800 block w-full sm:text-sm border-gray-300 rounded-md">
                                                        <option value="">Select Brigade's musicians</option>
                                                        @foreach ( $musicians as $musician )
                                                        <option value="{{ $musician->id }}">{{$musician->user->name}} - {{ $musician->instrument->nom }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <p class="mt-2 text-sm text-gray-500">Hold Ctrl (Windows) or Command (Mac) to select multiple musicians</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="pt-5">
                                    <div class="flex justify-end">
                                        <button type="button" onclick="window.history.back()"
                                            class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-conductor-500">
                                            Cancel
                                        </button>
                                        <button type="submit"
                                            class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-conductor-600 hover:bg-conductor-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-conductor-500">
                                            Create Brigade
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const musicianSelect = document.querySelector('select[name="musician_profiles_id[]"]');
    
    // Add styling for better UX
    musicianSelect.style.height = '120px';
    
    // Optional: Add select all functionality
    const selectAllBtn = document.createElement('button');
    selectAllBtn.type = 'button';
    selectAllBtn.textContent = 'Select All';
    selectAllBtn.className = 'mb-2 px-3 py-1 bg-gray-200 text-gray-700 rounded text-sm';
    
    selectAllBtn.addEventListener('click', function() {
        Array.from(musicianSelect.options).forEach(option => {
            if (option.value !== '') option.selected = true;
        });
    });
    
    const clearAllBtn = document.createElement('button');
    clearAllBtn.type = 'button';
    clearAllBtn.textContent = 'Clear All';
    clearAllBtn.className = 'mb-2 ml-2 px-3 py-1 bg-gray-200 text-gray-700 rounded text-sm';
    
    clearAllBtn.addEventListener('click', function() {
        Array.from(musicianSelect.options).forEach(option => {
            option.selected = false;
        });
    });
    
    musicianSelect.parentNode.insertBefore(selectAllBtn, musicianSelect);
    musicianSelect.parentNode.insertBefore(clearAllBtn, musicianSelect);
});
</script>