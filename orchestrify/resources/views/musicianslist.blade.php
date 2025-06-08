<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Musicians Directory</title>
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
                        'dark-blue': '#1e3a8a',
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.3s ease-in-out',
                        'slide-up': 'slideUp 0.3s ease-out',
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
        .modal-backdrop {
            backdrop-filter: blur(4px);
        }
    </style>
</head>

<body class="bg-black text-white font-sans antialiased min-h-screen">
    <!-- Navigation -->
    <nav class="bg-gray-900 border-b border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <h1 class="text-xl font-playfair font-bold tracking-wider">
                        <span class="text-white">Musicians</span>
                        <span class="text-gray-400">Directory</span>
                    </h1>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="index.html" class="text-gray-300 hover:text-white text-sm">Instruments</a>
                    <a href="orchestra-members.html" class="text-gray-300 hover:text-white text-sm">Members</a>
                    <a href="musicians-list.html" class="text-white text-sm font-medium">Musicians</a>
                    <button
                        class="px-4 py-2 text-sm font-medium text-white border border-gray-600 rounded-md hover:bg-gray-800 transition-colors duration-300">
                        Logout
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h2 class="text-3xl font-playfair font-bold text-white">Available Musicians</h2>
                    <p class="mt-2 text-gray-400">Browse and select musicians for your orchestra</p>
                </div>
            </div>
        </div>

        <!-- Search and Filter -->
        <div class="mb-6 bg-gray-900 rounded-lg p-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div>
                    <input type="text" id="searchInput" placeholder="Search musicians..."
                        class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-md text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-white focus:border-transparent">
                </div>
                <div>
                    <select id="instrumentFilter"
                        class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-white focus:border-transparent">
                        <option value="">All Instruments</option>
                        <option value="violin">Violin</option>
                        <option value="piano">Piano</option>
                        <option value="guitar">Guitar</option>
                        <option value="drums">Drums</option>
                        <option value="flute">Flute</option>
                        <option value="cello">Cello</option>
                    </select>
                </div>
                <div>
                    <select id="levelFilter"
                        class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-white focus:border-transparent">
                        <option value="">All Levels</option>
                        <option value="beginner">Beginner</option>
                        <option value="intermediate">Intermediate</option>
                        <option value="advanced">Advanced</option>
                        <option value="expert">Expert</option>
                    </select>
                </div>
                <div>
                    <select id="styleFilter"
                        class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-white focus:border-transparent">
                        <option value="">All Styles</option>
                        <option value="classical">Classical</option>
                        <option value="jazz">Jazz</option>
                        <option value="rock">Rock</option>
                        <option value="pop">Pop</option>
                        <option value="blues">Blues</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Musicians Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6">
            <!-- Musician Card 1 -->
            <div class="bg-gray-900 rounded-lg p-6 hover:bg-gray-800 transition-colors duration-200">
            <div class="flex items-center mb-1">
                @foreach ( $musicians as $musician)
                <div class="w-12 h-12 bg-gray-700 rounded-full flex items-center justify-center">
                <span class="text-white font-semibold">
                    <img src="{{ asset('images/profile.png') }}" class="rounded-full" alt="">
                </span>
                </div>
                <div class="ml-4 flex-1">
                <h3 class="text-lg font-semibold text-white">{{ $musician->user->name}}</h3>
                <p class="text-gray-400">{{ $musician->instrument->nom }}</p>
                </div>
                <div class="flex space-x-2">
                <button onclick="openMusicianModal()"
                    class="px-3 py-2 bg-blue-600 text-white text-sm rounded-md hover:bg-blue-700 transition-colors">
                    View Profile
                </button>
                <button onclick="openAddModal()"
                    class="px-3 py-2 bg-green-600 text-white text-sm rounded-md hover:bg-green-700 transition-colors">
                    Add
                </button>
                </div>
                      
                @endforeach
            </div>
            </div>

        </div>
    </div>

    <!-- Musician Profile Modal -->
    <div id="musicianModal" class="hidden fixed inset-0 z-50 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-black bg-opacity-75 modal-backdrop transition-opacity"></div>

            <div
                class="inline-block align-bottom bg-gray-900 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full">
                <div class="bg-gray-900 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="mb-4">
                        <h3 class="text-lg font-playfair font-semibold text-white">Musician Profile</h3>
                    </div>

                    <div class="space-y-4">
                        <div class="flex items-center mb-6">
                            <div class="w-16 h-16 bg-gray-700 rounded-full flex items-center justify-center">
                                <span class="text-white font-semibold text-xl" id="musicianInitials">AL</span>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-xl font-semibold text-white" id="musicianName">Alice Johnson</h4>
                                <p class="text-gray-400" id="musicianEmail">alice.johnson@email.com</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-1">Instrument</label>
                                <p class="text-white" id="musicianInstrument">Flute</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-1">Level</label>
                                <p class="text-white" id="musicianLevel">Expert</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-1">Experience</label>
                                <p class="text-white" id="musicianExperience">15 years</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-1">Style</label>
                                <p class="text-white" id="musicianStyle">Classical</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-1">Availability</label>
                                <p class="text-white" id="musicianAvailability">Available</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-1">Profile Status</label>
                                <p class="text-white" id="musicianCompleted">Completed</p>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-1">Bio</label>
                            <p class="text-gray-300 text-sm" id="musicianBio">Professional flutist with extensive
                                classical training and orchestra experience.</p>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-800 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" onclick="addToOrchestraFromModal()"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Add to Orchestra
                    </button>
                    <button type="button" onclick="closeMusicianModal()"
                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-600 shadow-sm px-4 py-2 bg-gray-700 text-base font-medium text-white hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add to Orchestra Confirmation Modal -->
    <div id="addModal" class="hidden fixed inset-0 z-50 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-black bg-opacity-75 modal-backdrop transition-opacity"></div>

            <div
                class="inline-block align-bottom bg-gray-900 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-gray-900 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-white">Add to Orchestra</h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-400">
                                    Are you sure you want to add "<span id="addMusicianName"></span>" to your orchestra?
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-800 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" onclick="confirmAdd()"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Add Member
                    </button>
                    <button type="button" onclick="closeAddModal()"
                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-600 shadow-sm px-4 py-2 bg-gray-700 text-base font-medium text-white hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>


        // Open Musician Profile Modal
        function openMusicianModal() {
            document.getElementById('musicianModal').classList.remove('hidden');
        }

        // Open Add to Orchestra Modal
        function openAddModal() {
            document.getElementById('addModal').classList.remove('hidden');
        }

        // Close Musician Profile Modal
        function closeMusicianModal() {
            document.getElementById('musicianModal').classList.add('hidden');
        }

        // Close Add to Orchestra Modal
        function closeAddModal() {
            document.getElementById('addModal').classList.add('hidden');
        }

        // Close modals with Escape key
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') {
                closeMusicianModal();
                closeAddModal();
            }
        });

        // Close modals when clicking on backdrop
        document.getElementById('musicianModal').addEventListener('click', function (e) {
            if (e.target === this) closeMusicianModal();
        });
        document.getElementById('addModal').addEventListener('click', function (e) {
            if (e.target === this) closeAddModal();
        });

    </script>
</body>

</html>