<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Instruments Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.2);
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
                        <span class="text-white">Admin</span>
                        <span class="text-gray-400">Dashboard</span>
                    </h1>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-300 text-sm">Instruments Management</span>
                    <button class="px-4 py-2 text-sm font-medium text-white border border-gray-600 rounded-md hover:bg-gray-800 transition-colors duration-300">
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
                    <h2 class="text-3xl font-playfair font-bold text-white">Instruments Management</h2>
                    <p class="mt-2 text-gray-400">Manage your orchestra instruments and their properties</p>
                </div>
                <div class="mt-4 sm:mt-0">
                    <button onclick="openAddModal()" class="px-6 py-3 bg-white text-black font-medium rounded-md hover:bg-gray-200 transition-colors duration-300">
                        Add New Instrument
                    </button>
                </div>
            </div>
        </div>

        <!-- Search and Filter -->
        <div class="mb-6 bg-gray-900 rounded-lg p-4">
            <div class="flex flex-col sm:flex-row gap-4">
                <div class="flex-1">
                    <input type="text" id="searchInput" placeholder="Search instruments..." 
                           class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-md text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-white focus:border-transparent">
                </div>
                <div class="sm:w-48">
                    <select id="styleFilter" class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-white focus:border-transparent">
                        <option value="">All Styles</option>
                        <option value="classical">Classical</option>
                        <option value="jazz">Jazz</option>
                        <option value="rock">Rock</option>
                        <option value="pop">Pop</option>
                        <option value="electronic">Electronic</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Instruments Table -->
        <div class="bg-gray-900 rounded-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-800">
                    <thead class="bg-gray-800">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Style</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Volume</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Note Duration</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Sound</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="instrumentsTableBody" class="bg-gray-900 divide-y divide-gray-800">
                        <!-- Table rows will be populated by JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Empty State -->
        <div id="emptyState" class="hidden text-center py-12">
            <div class="bg-gray-900 rounded-lg p-8">
                <p class="text-gray-400 text-lg">No instruments found</p>
                <p class="text-gray-500 mt-2">Add your first instrument to get started</p>
                <button onclick="openAddModal()" class="mt-4 px-6 py-2 bg-white text-black font-medium rounded-md hover:bg-gray-200 transition-colors duration-300">
                    Add Instrument
                </button>
            </div>
        </div>
    </div>

    <!-- Add/Edit Modal -->
    <div id="instrumentModal" class="hidden fixed inset-0 z-50 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-black bg-opacity-75 modal-backdrop transition-opacity"></div>
            
            <div class="inline-block align-bottom bg-gray-900 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-gray-900 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="mb-4">
                        <h3 id="modalTitle" class="text-lg font-playfair font-semibold text-white">Add New Instrument</h3>
                    </div>
                    
                    <form id="instrumentForm" class="space-y-4">
                        <div>
                            <label for="instrumentName" class="block text-sm font-medium text-gray-300 mb-1">Instrument Name</label>
                            <input type="text" id="instrumentName" required
                                   class="w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded-md text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-white focus:border-transparent"
                                   placeholder="e.g., Violin, Piano, Guitar">
                        </div>
                        
                        <div>
                            <label for="instrumentStyle" class="block text-sm font-medium text-gray-300 mb-1">Musical Style</label>
                            <select id="instrumentStyle" required
                                    class="w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-white focus:border-transparent">
                                <option value="">Select a style</option>
                                <option value="classical">Classical</option>
                                <option value="jazz">Jazz</option>
                                <option value="rock">Rock</option>
                                <option value="pop">Pop</option>
                                <option value="electronic">Electronic</option>
                                <option value="folk">Folk</option>
                                <option value="blues">Blues</option>
                            </select>
                        </div>
                        
                        <div>
                            <label for="instrumentVolume" class="block text-sm font-medium text-gray-300 mb-1">Default Volume (0-100)</label>
                            <input type="number" id="instrumentVolume" min="0" max="100" value="50" required
                                   class="w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded-md text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-white focus:border-transparent"
                                   placeholder="Enter volume (0-100)">
                        </div>
                        
                        <div>
                            <label for="instrumentDuration" class="block text-sm font-medium text-gray-300 mb-1">Note Duration (seconds)</label>
                            <input type="number" id="instrumentDuration" step="0.1" min="0.1" max="10" value="1.0" required
                                   class="w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded-md text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-white focus:border-transparent"
                                   placeholder="e.g., 1.0">
                        </div>
                        
                        <div>
                            <label for="instrumentSoundUrl" class="block text-sm font-medium text-gray-300 mb-1">Sound URL</label>
                            <input type="url" id="instrumentSoundUrl" required
                                   class="w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded-md text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-white focus:border-transparent"
                                   placeholder="https://example.com/sound.mp3">
                        </div>
                    </form>
                </div>
                
                <div class="bg-gray-800 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" onclick="saveInstrument()" 
                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-white text-base font-medium text-black hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white sm:ml-3 sm:w-auto sm:text-sm">
                        Save
                    </button>
                    <button type="button" onclick="closeModal()" 
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-600 shadow-sm px-4 py-2 bg-gray-700 text-base font-medium text-white hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="hidden fixed inset-0 z-50 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-black bg-opacity-75 modal-backdrop transition-opacity"></div>
            
            <div class="inline-block align-bottom bg-gray-900 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-gray-900 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-white">Delete Instrument</h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-400">
                                    Are you sure you want to delete "<span id="deleteInstrumentName"></span>"? This action cannot be undone.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-800 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" onclick="confirmDelete()" 
                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Delete
                    </button>
                    <button type="button" onclick="closeDeleteModal()" 
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-600 shadow-sm px-4 py-2 bg-gray-700 text-base font-medium text-white hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Global variables
        let instruments = [];
        let editingIndex = -1;
        let deleteIndex = -1;

        // Initialize the application
        document.addEventListener('DOMContentLoaded', function() {
            loadInstruments();
            setupEventListeners();
        });

        // Setup event listeners
        function setupEventListeners() {
            // Search functionality
            document.getElementById('searchInput').addEventListener('input', filterInstruments);
            document.getElementById('styleFilter').addEventListener('change', filterInstruments);

            // Modal close on backdrop click
            document.getElementById('instrumentModal').addEventListener('click', function(e) {
                if (e.target === this) closeModal();
            });
            document.getElementById('deleteModal').addEventListener('click', function(e) {
                if (e.target === this) closeDeleteModal();
            });
        }

        // Load instruments from localStorage
        function loadInstruments() {
            const stored = localStorage.getItem('instruments');
            if (stored) {
                instruments = JSON.parse(stored);
            } else {
                // Sample data
                instruments = [
                    {
                        name: 'Violin',
                        style: 'classical',
                        volume: 75,
                        note_duration: 1.2,
                        sound: 'https://example.com/violin.mp3'
                    },
                    {
                        name: 'Piano',
                        style: 'classical',
                        volume: 80,
                        note_duration: 2.0,
                        sound: 'https://example.com/piano.mp3'
                    },
                    {
                        name: 'Electric Guitar',
                        style: 'rock',
                        volume: 85,
                        note_duration: 0.8,
                        sound: 'https://example.com/guitar.mp3'
                    }
                ];
                saveInstruments();
            }
            renderInstruments();
        }

        // Save instruments to localStorage
        function saveInstruments() {
            localStorage.setItem('instruments', JSON.stringify(instruments));
        }

        // Render instruments table
        function renderInstruments() {
            const tbody = document.getElementById('instrumentsTableBody');
            const emptyState = document.getElementById('emptyState');
            
            if (instruments.length === 0) {
                tbody.innerHTML = '';
                emptyState.classList.remove('hidden');
                return;
            }

            emptyState.classList.add('hidden');
            
            tbody.innerHTML = instruments.map((instrument, index) => `
                <tr class="hover:bg-gray-800 transition-colors duration-200">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-white">${instrument.name}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-gray-700 text-gray-300">
                            ${instrument.style}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                        ${instrument.volume}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                        ${instrument.note_duration}s
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <button onclick="playSound('${instrument.sound}')" class="text-blue-400 hover:text-blue-300 text-sm">
                            Play
                        </button>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <button onclick="editInstrument(${index})" class="text-blue-400 hover:text-blue-300 mr-3">
                            Edit
                        </button>
                        <button onclick="deleteInstrument(${index})" class="text-red-400 hover:text-red-300">
                            Delete
                        </button>
                    </td>
                </tr>
            `).join('');
        }

        // Filter instruments
        function filterInstruments() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const styleFilter = document.getElementById('styleFilter').value;
            
            const filtered = instruments.filter(instrument => {
                const matchesSearch = instrument.name.toLowerCase().includes(searchTerm);
                const matchesStyle = !styleFilter || instrument.style === styleFilter;
                return matchesSearch && matchesStyle;
            });

            const tbody = document.getElementById('instrumentsTableBody');
            const emptyState = document.getElementById('emptyState');
            
            if (filtered.length === 0) {
                tbody.innerHTML = '';
                emptyState.classList.remove('hidden');
                return;
            }

            emptyState.classList.add('hidden');
            
            tbody.innerHTML = filtered.map((instrument, originalIndex) => {
                const index = instruments.indexOf(instrument);
                return `
                    <tr class="hover:bg-gray-800 transition-colors duration-200">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-white">${instrument.name}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-gray-700 text-gray-300">
                                ${instrument.style}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                            ${instrument.volume}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                            ${instrument.note_duration}s
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <button onclick="playSound('${instrument.sound}')" class="text-blue-400 hover:text-blue-300 text-sm">
                                Play
                            </button>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <button onclick="editInstrument(${index})" class="text-blue-400 hover:text-blue-300 mr-3">
                                Edit
                            </button>
                            <button onclick="deleteInstrument(${index})" class="text-red-400 hover:text-red-300">
                                Delete
                            </button>
                        </td>
                    </tr>
                `;
            }).join('');
        }

        // Open add modal
        function openAddModal() {
            editingIndex = -1;
            document.getElementById('modalTitle').textContent = 'Add New Instrument';
            document.getElementById('instrumentForm').reset();
            document.getElementById('instrumentModal').classList.remove('hidden');
            document.getElementById('instrumentModal').classList.add('animate-fade-in');
        }

        // Edit instrument
        function editInstrument(index) {
            editingIndex = index;
            const instrument = instruments[index];
            
            document.getElementById('modalTitle').textContent = 'Edit Instrument';
            document.getElementById('instrumentName').value = instrument.name;
            document.getElementById('instrumentStyle').value = instrument.style;
            document.getElementById('instrumentVolume').value = instrument.volume;
            document.getElementById('instrumentDuration').value = instrument.note_duration;
            document.getElementById('instrumentSoundUrl').value = instrument.sound;
            
            document.getElementById('instrumentModal').classList.remove('hidden');
            document.getElementById('instrumentModal').classList.add('animate-fade-in');
        }

        // Save instrument
        function saveInstrument() {
            const name = document.getElementById('instrumentName').value.trim();
            const style = document.getElementById('instrumentStyle').value;
            const volume = parseInt(document.getElementById('instrumentVolume').value);
            const duration = parseFloat(document.getElementById('instrumentDuration').value);
            const sound = document.getElementById('instrumentSoundUrl').value.trim();

            if (!name || !style || isNaN(volume) || !duration || !sound) {
                alert('Please fill in all required fields');
                return;
            }

            const instrument = {
                name,
                style,
                volume,
                note_duration: duration,
                sound
            };

            if (editingIndex >= 0) {
                instruments[editingIndex] = instrument;
            } else {
                instruments.push(instrument);
            }

            saveInstruments();
            renderInstruments();
            closeModal();
        }

        // Delete instrument
        function deleteInstrument(index) {
            deleteIndex = index;
            document.getElementById('deleteInstrumentName').textContent = instruments[index].name;
            document.getElementById('deleteModal').classList.remove('hidden');
            document.getElementById('deleteModal').classList.add('animate-fade-in');
        }

        // Confirm delete
        function confirmDelete() {
            if (deleteIndex >= 0) {
                instruments.splice(deleteIndex, 1);
                saveInstruments();
                renderInstruments();
                closeDeleteModal();
            }
        }

        // Close modal
        function closeModal() {
            document.getElementById('instrumentModal').classList.add('hidden');
            document.getElementById('instrumentForm').reset();
            editingIndex = -1;
        }

        // Close delete modal
        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
            deleteIndex = -1;
        }

        // Play sound
        function playSound(soundUrl) {
            if (soundUrl) {
                const audio = new Audio(soundUrl);
                audio.play().catch(e => {
                    console.log('Could not play audio:', e);
                    alert('Could not play audio file');
                });
            }
        }

        // Keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeModal();
                closeDeleteModal();
            }
        });
    </script>
</body>
</html>