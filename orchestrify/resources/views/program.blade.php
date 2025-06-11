<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Programme Musical</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .glass-effect {
            background: rgba(31, 41, 55, 0.8);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(75, 85, 99, 0.3);
        }

        .input-dark {
            background: rgba(17, 24, 39, 0.8);
            border: 2px solid rgba(75, 85, 99, 0.5);
            color: #f9fafb;
        }

        .input-dark:focus {
            border-color: #4f46e5;
            background: rgba(17, 24, 39, 0.9);
        }

        .input-dark::placeholder {
            color: #9ca3af;
        }

        .musician-row {
            background: rgba(31, 41, 55, 0.6);
            border: 1px solid rgba(75, 85, 99, 0.3);
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 15px;
        }

        .musician-row:hover {
            background: rgba(31, 41, 55, 0.8);
        }
    </style>
</head>

<body class="bg-gray-900 min-h-screen text-white">
    <div class="max-w-4xl mx-auto p-6">
        <!-- Header -->
        <div class="bg-gradient-to-r from-indigo-600 to-purple-600 rounded-2xl p-8 mb-8 text-white shadow-2xl">
            <h1 class="text-4xl font-bold mb-2">
                <i class="fas fa-music mr-3"></i>Créer un Programme Musical
            </h1>
            <p class="text-indigo-100">Organisez votre programme musical avec vos musiciens</p>
        </div>

        <form action="/programs" method="POST" id="programmeForm">
            @csrf
            <!-- Informations du Programme -->
            <div class="glass-effect rounded-2xl shadow-2xl p-8 mb-8">
                <h2 class="text-2xl font-bold text-white mb-6 flex items-center">
                    <i class="fas fa-info-circle mr-3 text-indigo-400"></i>
                    Informations du Programme
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nom du Programme -->
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-300 mb-2">
                            <i class="fas fa-tag mr-2"></i>Nom du Programme *
                        </label>
                        <input type="text" id="name" name="name"
                            class="w-full px-4 py-3 input-dark rounded-xl focus:ring-2 focus:ring-indigo-500 transition-all duration-300"
                            placeholder="Ex: Concert de Printemps" required>
                    </div>

                    <!-- Style Musical -->
                    <div>
                        <label for="style" class="block text-sm font-semibold text-gray-300 mb-2">
                            <i class="fas fa-palette mr-2"></i>Style Musical *
                        </label>
                        <select id="style" name="style"
                            class="w-full px-4 py-3 input-dark rounded-xl focus:ring-2 focus:ring-indigo-500 transition-all duration-300"
                            required>
                            <option value="">Sélectionner un style</option>
                            <option value="Jazz">Jazz</option>
                            <option value="Classique">Classique</option>
                            <option value="Pop">Pop</option>
                            <option value="Autre">Autre</option>
                        </select>
                    </div>

                    <!-- Tempo -->
                    <div>
                        <label for="tempo" class="block text-sm font-semibold text-gray-300 mb-2">
                            <i class="fas fa-tachometer-alt mr-2"></i>Tempo (BPM) *
                        </label>
                        <input type="number" id="tempo" name="tempo" min="40" max="200" value="120"
                            class="w-full px-4 py-3 input-dark rounded-xl focus:ring-2 focus:ring-indigo-500 transition-all duration-300"
                            placeholder="120" required>
                        <p class="text-sm text-gray-400 mt-1">Entre 40 et 200 BPM</p>
                    </div>

                    <!-- Durée Totale du Programme -->
                    <div>
                        <label for="duration" class="block text-sm font-semibold text-gray-300 mb-2">
                            <i class="fas fa-clock mr-2"></i>Durée Totale (min) *
                        </label>
                        <input type="number" id="duration" name="duration" min="1" max="300"
                            class="w-full px-4 py-3 input-dark rounded-xl focus:ring-2 focus:ring-indigo-500 transition-all duration-300"
                            placeholder="60" required>
                        <p class="text-sm text-gray-400 mt-1">Durée totale du programme</p>
                    </div>

                    <!-- Mode -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-300 mb-3">
                            <i class="fas fa-microphone mr-2"></i>Mode *
                        </label>
                        <div class="flex space-x-6">
                            <label class="flex items-center cursor-pointer">
                                <input type="radio" name="mode" value="concert" checked
                                    class="w-4 h-4 text-indigo-600 bg-gray-700 border-gray-600 focus:ring-indigo-500">
                                <span class="ml-2 text-gray-300">
                                    <i class="fas fa-star mr-1"></i>Concert
                                </span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="radio" name="mode" value="repetition"
                                    class="w-4 h-4 text-indigo-600 bg-gray-700 border-gray-600 focus:ring-indigo-500">
                                <span class="ml-2 text-gray-300">
                                    <i class="fas fa-redo mr-1"></i>Répétition
                                </span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section Musiciens -->
            <div class="glass-effect rounded-2xl shadow-2xl p-8 mb-8">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-white flex items-center">
                        <i class="fas fa-users mr-3 text-emerald-400"></i>
                        Musiciens du Programme
                    </h2>
                    <button type="button" onclick="addMusicianRow()"
                        class="bg-gradient-to-r from-emerald-600 to-emerald-700 text-white px-4 py-2 rounded-lg font-semibold hover:shadow-lg transition-all duration-300">
                        <i class="fas fa-plus mr-2"></i>Ajouter un Musicien
                    </button>
                </div>

                <!-- Container pour les musiciens -->
                <div id="musiciansContainer">
                    <!-- Musicien par défaut -->
                    <div class="musician-row" data-index="0">
                        <div class="flex justify-between items-start mb-4">
                            <h3 class="text-lg font-semibold text-white">
                                <i class="fas fa-user mr-2"></i>Musicien #1
                            </h3>
                            <button type="button" onclick="removeMusicianRow(this)"
                                class="bg-red-600 text-white w-8 h-8 rounded-full hover:bg-red-700 transition-colors duration-300"
                                style="display: none;">
                                <i class="fas fa-times text-sm"></i>
                            </button>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            <!-- Sélection du Musicien -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-300 mb-2">
                                    <i class="fas fa-user mr-1"></i>Musicien *
                                </label>
                                <select name="musicians[0][musician_id]"
                                    class="w-full px-3 py-2 input-dark rounded-lg focus:ring-2 focus:ring-indigo-500 transition-all duration-300"
                                    required>
                                    <option value="">Sélectionner...</option>
                                    @foreach($musicians as $musician)
                                        <option value="{{ $musician->id }}">
                                            {{ $musician->user->name ?? 'Nom non disponible' }} -
                                            {{ $musician->instrument->nom ?? 'Instrument non spécifié' }}


                                        </option>
                                    @endforeach

                                </select>
                            </div>
                            <!-- Ordre -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-300 mb-2">
                                    <i class="fas fa-sort-numeric-up mr-1"></i>Ordre *
                                </label>
                                <input type="number" name="musicians[0][ordre]" min="1" value="1"
                                    class="w-full px-3 py-2 input-dark rounded-lg focus:ring-2 focus:ring-indigo-500 transition-all duration-300"
                                    required>
                            </div>

                            <!-- Durée -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-300 mb-2">
                                    <i class="fas fa-clock mr-1"></i>Durée (min) *
                                </label>
                                <input type="number" name="musicians[0][duree]" min="1" max="120"
                                    class="w-full px-3 py-2 input-dark rounded-lg focus:ring-2 focus:ring-indigo-500 transition-all duration-300"
                                    placeholder="5" required>
                            </div>

                            <!-- Rôle -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-300 mb-2">
                                    <i class="fas fa-user-tag mr-1"></i>Rôle
                                </label>
                                <input type="text" name="musicians[0][role]"
                                    class="w-full px-3 py-2 input-dark rounded-lg focus:ring-2 focus:ring-indigo-500 transition-all duration-300"
                                    placeholder="Soliste, Chef...">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-sm text-gray-400 mt-4">
                    <i class="fas fa-info-circle mr-1"></i>
                    Les champs marqués d'un * sont obligatoires
                </div>
            </div>



            <!-- Boutons d'Action -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button type="submit"
                    class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-8 py-4 rounded-xl font-bold text-lg hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                    <i class="fas fa-save mr-3"></i>Sauvegarder le Programme
                </button>
                <a href="/programs"
                    class="bg-gray-700 text-white px-8 py-4 rounded-xl font-bold text-lg hover:bg-gray-600 hover:shadow-lg transform hover:scale-105 transition-all duration-300 text-center">
                    <i class="fas fa-arrow-left mr-3"></i>Retour
                </a>
            </div>
        </form>
    </div>

    <script>
        let musicianCount = 1;

        // Ajouter une ligne de musicien
        function addMusicianRow() {
            const container = document.getElementById('musiciansContainer');
            const newRow = document.createElement('div');
            newRow.className = 'musician-row';
            newRow.setAttribute('data-index', musicianCount);

            newRow.innerHTML = `
                <div class="flex justify-between items-start mb-4">
                    <h3 class="text-lg font-semibold text-white">
                        <i class="fas fa-user mr-2"></i>Musicien #${musicianCount + 1}
                    </h3>
                    <button type="button" 
                            onclick="removeMusicianRow(this)" 
                            class="bg-red-600 text-white w-8 h-8 rounded-full hover:bg-red-700 transition-colors duration-300">
                        <i class="fas fa-times text-sm"></i>
                    </button>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-300 mb-2">
                            <i class="fas fa-user mr-1"></i>Musicien *
                        </label>
                        <select name="musicians[${musicianCount}][musician_id]" 
                                class="w-full px-3 py-2 input-dark rounded-lg focus:ring-2 focus:ring-indigo-500 transition-all duration-300"
                                required>
                            <option value="">Sélectionner...</option>
                        @foreach($musicians as $musician)
                            <option value="{{ $musician->id }}">
                                {{ $musician->user->name ?? 'Nom non disponible' }} -
                                {{ $musician->instrument->nom ?? 'Instrument non spécifié' }}
                            </option>
                        @endforeach
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-300 mb-2">
                            <i class="fas fa-sort-numeric-up mr-1"></i>Ordre *
                        </label>
                        <input type="number" 
                               name="musicians[${musicianCount}][ordre]" 
                               min="1" 
                               value="${musicianCount + 1}"
                               class="w-full px-3 py-2 input-dark rounded-lg focus:ring-2 focus:ring-indigo-500 transition-all duration-300"
                               required>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-300 mb-2">
                            <i class="fas fa-clock mr-1"></i>Durée (min) *
                        </label>
                        <input type="number" 
                               name="musicians[${musicianCount}][duree]" 
                               min="1" 
                               max="120"
                               class="w-full px-3 py-2 input-dark rounded-lg focus:ring-2 focus:ring-indigo-500 transition-all duration-300"
                               placeholder="5"
                               required>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-300 mb-2">
                            <i class="fas fa-user-tag mr-1"></i>Rôle
                        </label>
                        <input type="text" 
                               name="musicians[${musicianCount}][role]" 
                               class="w-full px-3 py-2 input-dark rounded-lg focus:ring-2 focus:ring-indigo-500 transition-all duration-300"
                               placeholder="Soliste, Chef...">
                    </div>
                </div>
            `;

            container.appendChild(newRow);
            musicianCount++;

            // Afficher le bouton de suppression pour toutes les lignes sauf la première
            updateRemoveButtons();
        }

        // Supprimer une ligne de musicien
        function removeMusicianRow(button) {
            const row = button.closest('.musician-row');
            row.remove();
            updateRemoveButtons();
            updateMusicianNumbers();
        }

        // Mettre à jour la visibilité des boutons de suppression
        function updateRemoveButtons() {
            const rows = document.querySelectorAll('.musician-row');
            rows.forEach((row, index) => {
                const removeBtn = row.querySelector('button[onclick*="removeMusicianRow"]');
                if (removeBtn) {
                    removeBtn.style.display = rows.length > 1 ? 'block' : 'none';
                }
            });
        }

        // Mettre à jour la numérotation des musiciens
        function updateMusicianNumbers() {
            const rows = document.querySelectorAll('.musician-row');
            rows.forEach((row, index) => {
                const title = row.querySelector('h3');
                title.innerHTML = `<i class="fas fa-user mr-2"></i>Musicien #${index + 1}`;
            });
        }

        // Validation simple du formulaire
        document.getElementById('programmeForm').addEventListener('submit', function (e) {
            const requiredFields = this.querySelectorAll('input[required], select[required]');
            let isValid = true;

            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    field.style.borderColor = '#ef4444';
                    isValid = false;
                } else {
                    field.style.borderColor = '';
                }
            });

            if (!isValid) {
                e.preventDefault();
                alert('Veuillez remplir tous les champs obligatoires');
            }
        });
    </script>
</body>

</html>