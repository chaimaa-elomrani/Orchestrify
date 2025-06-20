<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Instruments Management</title>
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
    @if(auth()->user()->isChef())
    <nav class="bg-gray-900 text-white shadow-lg">
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6  lg:px-8">
            <div class="flex items-center justify-center h-16">
               
                <div class="flex ">
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <a href="{{ route('home') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Home</a>
                            <a href="{{ route('chef.dashboard') }}" class="bg-gray-800 text-white px-3 py-2 rounded-md text-sm font-medium">Dashboard</a>
                            <a href="{{ route('chef.programs') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Programs</a>
                            <a href="{{ route('chef.musicians') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Musicians</a>
                            <a href="{{ route('chef.instruments') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Instruments</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    @else
    <!-- Redirect musicians or show access denied -->
    <script>
        window.location.href = "{{ route('musician.dashboard') }}";
    </script>
    @endif

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
                    <button onclick="openAddModal()"
                        class="px-6 py-3 bg-white text-black font-medium rounded-md hover:bg-gray-200 transition-colors duration-300">
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
                    <select id="styleFilter"
                        class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-white focus:border-transparent">
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
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                Style</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                Volume</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                Sound</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody id="instrumentsTableBody" class="bg-gray-900 divide-y divide-gray-800">
                        @foreach ($instruments as $instrument)
                            <!-- Example row with edit button -->
                            <tr class="hover:bg-gray-800 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-white">{{ $instrument->nom }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-gray-700 text-gray-300">
                                        {{ $instrument->style }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                    {{ $instrument->volume }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <button class="text-blue-400 hover:text-blue-300 text-sm">
                                        {{ $instrument->son ? 'Play Sound' : 'No Sound' }}
                                        <audio controls class="hidden">
                                            <source src="{{ $instrument->son }}" type="audio/mpeg">
                                            Your browser does not support the audio element.
                                        </audio>
                                        <script>
                                            document.querySelector('button').addEventListener('click', function () {
                                                const audio = this.nextElementSibling;
                                                if (audio.paused) {
                                                    audio.play();
                                                    this.textContent = 'Pause Sound';
                                                } else {
                                                    audio.pause();
                                                    this.textContent = 'Play Sound';
                                                }
                                            });
                                        </script>
                                    </button>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button class="text-blue-400 hover:text-blue-300 mr-3" onclick="openEditModal(
                                                '{{ addslashes($instrument->nom) }}',
                                                '{{ addslashes($instrument->style) }}',
                                                '{{ $instrument->volume }}',
                                                '{{ addslashes($instrument->son) }}'
                                            )">
                                        Edit
                                    </button>
                                    <button onclick="openDeleteModal('Sample Violin')"
                                        class="text-red-400 hover:text-red-300">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Empty State -->
        <div id="emptyState" class="hidden text-center py-12">
            <div class="bg-gray-900 rounded-lg p-8">
                <p class="text-gray-400 text-lg">No instruments found</p>
                <p class="text-gray-500 mt-2">Add your first instrument to get started</p>
                <button onclick="openAddModal()"
                    class="mt-4 px-6 py-2 bg-white text-black font-medium rounded-md hover:bg-gray-200 transition-colors duration-300">
                    Add Instrument
                </button>
            </div>
        </div>
    </div>

    <!-- Add New Instrument Modal -->
    <div id="addModal" class="hidden fixed inset-0 z-50 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-black bg-opacity-75 modal-backdrop transition-opacity"></div>

            <div
                class="inline-block align-bottom bg-gray-900 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-gray-900 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="mb-4">
                        <h3 class="text-lg font-playfair font-semibold text-white">Add New Instrument</h3>
                    </div>

                    <form id="addInstrumentForm" class="space-y-4" method="post"
                        action="{{ route('instruments.store') }}">
                        @csrf
                        <div>
                            <label for="addInstrumentName"
                                class="block text-sm font-medium text-gray-300 mb-1">Instrument Name</label>
                            <input type="text" name="nom" id="addInstrumentName" required
                                class="w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded-md text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-white focus:border-transparent"
                                placeholder="e.g., Violin, Piano, Guitar">
                        </div>

                        <div>
                            <label for="addInstrumentStyle" class="block text-sm font-medium text-gray-300 mb-1">Musical
                                Style</label>
                            <select name="style" id="addInstrumentStyle" required
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
                            <label for="addInstrumentVolume"
                                class="block text-sm font-medium text-gray-300 mb-1">Default Volume (0-100)</label>
                            <input type="number" name="volume" id="addInstrumentVolume" min="0" max="100" value="50"
                                required
                                class="w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded-md text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-white focus:border-transparent"
                                placeholder="Enter volume (0-100)">
                        </div>

                        <div>
                            <label for="addInstrumentSoundUrl"
                                class="block text-sm font-medium text-gray-300 mb-1">Sound URL</label>
                            <input type="url" name="son" id="addInstrumentSoundUrl" required
                                class="w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded-md text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-white focus:border-transparent"
                                placeholder="https://example.com/sound.mp3">
                        </div>
                    </form>
                </div>

                <div class="bg-gray-800 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="submit" form="addInstrumentForm"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-white text-base font-medium text-black hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white sm:ml-3 sm:w-auto sm:text-sm">
                        Save
                    </button>
                    <button type="button" onclick="closeAddModal()"
                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-600 shadow-sm px-4 py-2 bg-gray-700 text-base font-medium text-white hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Instrument Modal -->
    <div id="editModal" class="hidden fixed inset-0 z-50 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-black bg-opacity-75 modal-backdrop transition-opacity"></div>

            <div
                class="inline-block align-bottom bg-gray-900 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-gray-900 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="mb-4">
                        <h3 class="text-lg font-playfair font-semibold text-white">Edit Instrument</h3>
                    </div>

                    <form id="editInstrumentForm" class="space-y-4" method="post"
                        action="{{ route('instruments.update', $instrument->id) }}">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="editInstrumentName"
                                class="block text-sm font-medium text-gray-300 mb-1">Instrument Name</label>
                            <input type="text" name="nom" id="editInstrumentName" required
                                class="w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded-md text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-white focus:border-transparent"
                                placeholder="e.g., Violin, Piano, Guitar">
                        </div>

                        <div>
                            <label for="editInstrumentStyle"
                                class="block text-sm font-medium text-gray-300 mb-1">Musical Style</label>
                            <select name="style" id="editInstrumentStyle" required
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
                            <label for="editInstrumentVolume"
                                class="block text-sm font-medium text-gray-300 mb-1">Default Volume (0-100)</label>
                            <input type="number" name="volume" id="editInstrumentVolume" min="0" max="100" value="50"
                                required
                                class="w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded-md text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-white focus:border-transparent"
                                placeholder="Enter volume (0-100)">
                        </div>

                        <div>
                            <label for="editInstrumentSoundUrl"
                                class="block text-sm font-medium text-gray-300 mb-1">Sound URL</label>
                            <input type="url" name="son" id="editInstrumentSoundUrl" required
                                class="w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded-md text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-white focus:border-transparent"
                                placeholder="https://example.com/sound.mp3">
                        </div>
                    </form>
                </div>

                <div class="bg-gray-800 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="submit" form="editInstrumentForm"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-white text-base font-medium text-black hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white sm:ml-3 sm:w-auto sm:text-sm">
                        Save
                    </button>
                    <button type="button" onclick="closeEditModal()"
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

            <div
                class="inline-block align-bottom bg-gray-900 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-gray-900 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-white">Delete Instrument</h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-400">
                                    Are you sure you want to delete "<span id="deleteInstrumentName"></span>"? This
                                    action cannot be undone.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-800 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button>
                        <form id="deleteInstrumentForm" method="POST"
                            action="{{ route('instruments.destroy', $instrument->id) }}" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                Delete
                            </button>
                        </form>
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
        function openAddModal() {
            document.getElementById('addModal').classList.remove('hidden');
        }

        function closeAddModal() {
            document.getElementById('addModal').classList.add('hidden');
            document.getElementById('addInstrumentForm').reset();
        }


        function openEditModal(name, style, volume, soundUrl) {
            document.getElementById('editModal').classList.remove('hidden');

            document.getElementById('editInstrumentName').value = name;
            document.getElementById('editInstrumentStyle').value = style;
            document.getElementById('editInstrumentVolume').value = volume;
            document.getElementById('editInstrumentSoundUrl').value = soundUrl;
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
            document.getElementById('editInstrumentForm').reset();
        }


        function openDeleteModal(instrumentName) {
            document.getElementById('deleteModal').classList.remove('hidden');
            document.getElementById('deleteInstrumentName').textContent = instrumentName;
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }

        function confirmDelete() {
            console.log('Instrument deleted');
            closeDeleteModal();
        }

        document.addEventListener('click', function (event) {
            if (event.target.classList.contains('modal-backdrop')) {
                closeAddModal();
                closeEditModal();
                closeDeleteModal();
            }
        });


        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                closeAddModal();
                closeEditModal();
                closeDeleteModal();
            }
        });
        document.getElementById('searchInput').addEventListener('input', function () {
            const searchTerm = this.value.toLowerCase();
            const rows = document.querySelectorAll('#instrumentsTableBody tr');
            let hasVisibleRows = false;

            rows.forEach(row => {
                const nameCell = row.querySelector('td:nth-child(1)');
                const styleCell = row.querySelector('td:nth-child(2)');
                const nameText = nameCell.textContent.toLowerCase();
                const styleText = styleCell.textContent.toLowerCase();

                if (nameText.includes(searchTerm) || styleText.includes(searchTerm)) {
                    row.classList.remove('hidden');
                    hasVisibleRows = true;
                } else {
                    row.classList.add('hidden');
                }
            });

            document.getElementById('emptyState').classList.toggle('hidden', hasVisibleRows);
        });

    </script>
</body>

</html>