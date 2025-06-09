<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Programme Musical</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'fade-in': 'fadeIn 0.3s ease-in-out',
                        'slide-up': 'slideUp 0.3s ease-out',
                        'slide-down': 'slideDown 0.3s ease-out',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(20px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        },
                        slideDown: {
                            '0%': { transform: 'translateY(-20px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
        }
        
        .gradient-success {
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
        }
        
        .gradient-danger {
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
        }
        
        .gradient-info {
            background: linear-gradient(135deg, #0891b2 0%, #0e7490 100%);
        }
        
        .gradient-warning {
            background: linear-gradient(135deg, #d97706 0%, #b45309 100%);
        }
        
        .musician-block {
            transition: all 0.3s ease;
        }
        
        .musician-block:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.3);
        }
        
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
    </style>
</head>
<body class="bg-gray-900 min-h-screen text-white">
    <div class="max-w-6xl mx-auto p-6">
        <!-- Header -->
        <div class="gradient-bg rounded-2xl p-8 mb-8 text-white shadow-2xl">
            <h1 class="text-4xl font-bold mb-2">
                <i class="fas fa-music mr-3"></i>Créer un Programme Musical
            </h1>
            <p class="text-indigo-100">Organisez votre programme musical avec vos musiciens</p>
        </div>

        <form id="programmeForm" class="space-y-8">
            <!-- Informations du Programme -->
            <div class="glass-effect rounded-2xl shadow-2xl p-8">
                <h2 class="text-2xl font-bold text-white mb-6 flex items-center">
                    <i class="fas fa-info-circle mr-3 text-indigo-400"></i>
                    Informations du Programme
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nom du Programme -->
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-300 mb-2">
                            <i class="fas fa-tag mr-2"></i>Nom du Programme
                        </label>
                        <input type="text" 
                               id="name" 
                               name="name" 
                               class="w-full px-4 py-3 input-dark rounded-xl focus:ring-2 focus:ring-indigo-500 transition-all duration-300"
                               placeholder="Ex: Concert de Printemps"
                               required>
                    </div>
                    
                    <!-- Style Musical -->
                    <div>
                        <label for="style" class="block text-sm font-semibold text-gray-300 mb-2">
                            <i class="fas fa-palette mr-2"></i>Style Musical
                        </label>
                        <select id="style" 
                                name="style" 
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
                            <i class="fas fa-tachometer-alt mr-2"></i>Tempo (BPM)
                        </label>
                        <input type="number" 
                               id="tempo" 
                               name="tempo" 
                               min="40" 
                               max="200" 
                               value="120"
                               class="w-full px-4 py-3 input-dark rounded-xl focus:ring-2 focus:ring-indigo-500 transition-all duration-300"
                               placeholder="120"
                               required>
                        <p class="text-sm text-gray-400 mt-1">Entre 40 et 200 BPM</p>
                    </div>
                    
                    <!-- Mode -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-300 mb-3">
                            <i class="fas fa-microphone mr-2"></i>Mode
                        </label>
                        <div class="flex space-x-6">
                            <label class="flex items-center cursor-pointer">
                                <input type="radio" 
                                       name="mode" 
                                       value="Concert" 
                                       checked
                                       class="w-4 h-4 text-indigo-600 bg-gray-700 border-gray-600 focus:ring-indigo-500">
                                <span class="ml-2 text-gray-300">
                                    <i class="fas fa-star mr-1"></i>Concert
                                </span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="radio" 
                                       name="mode" 
                                       value="Répetition"
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
            <div class="glass-effect rounded-2xl shadow-2xl p-8">
                <h2 class="text-2xl font-bold text-white mb-6 flex items-center">
                    <i class="fas fa-users mr-3 text-emerald-400"></i>
                    Gestion des Musiciens
                </h2>
                
                <!-- Sélection de Musicien -->
                <div class="bg-gray-800 bg-opacity-50 rounded-xl p-6 mb-6 border border-gray-700">
                    <div class="flex flex-col md:flex-row gap-4 items-end">
                        <div class="flex-1">
                            <label for="musicianSelect" class="block text-sm font-semibold text-gray-300 mb-2">
                                <i class="fas fa-user-plus mr-2"></i>Ajouter un Musicien
                            </label>
                            <select id="musicianSelect" 
                                    class="w-full px-4 py-3 input-dark rounded-xl focus:ring-2 focus:ring-emerald-500 transition-all duration-300">
                                <option value="">Sélectionner un musicien...</option>
                                <option value="1" data-name="Jean Dupont" data-instrument="Violon">Jean Dupont - Violon</option>
                                <option value="2" data-name="Marie Martin" data-instrument="Piano">Marie Martin - Piano</option>
                                <option value="3" data-name="Pierre Durand" data-instrument="Guitare">Pierre Durand - Guitare</option>
                                <option value="4" data-name="Sophie Leroy" data-instrument="Flûte">Sophie Leroy - Flûte</option>
                                <option value="5" data-name="Antoine Bernard" data-instrument="Batterie">Antoine Bernard - Batterie</option>
                                <option value="6" data-name="Camille Rousseau" data-instrument="Violoncelle">Camille Rousseau - Violoncelle</option>
                                <option value="7" data-name="Lucas Moreau" data-instrument="Trompette">Lucas Moreau - Trompette</option>
                                <option value="8" data-name="Emma Dubois" data-instrument="Harpe">Emma Dubois - Harpe</option>
                            </select>
                        </div>
                        <button type="button" 
                                id="addMusicianBtn" 
                                class="gradient-success text-white px-6 py-3 rounded-xl font-semibold hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                            <i class="fas fa-plus mr-2"></i>Ajouter
                        </button>
                    </div>
                </div>
                
                <!-- Liste des Musiciens Ajoutés -->
                <div id="selectedMusicians">
                    <div id="emptyState" class="text-center py-12 text-gray-400">
                        <i class="fas fa-music text-6xl mb-4 opacity-50"></i>
                        <h3 class="text-xl font-semibold mb-2">Aucun musicien sélectionné</h3>
                        <p>Utilisez la liste déroulante ci-dessus pour ajouter des musiciens au programme.</p>
                    </div>
                </div>
            </div>

            <!-- Boutons d'Action -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button type="submit" 
                        class="gradient-bg text-white px-8 py-4 rounded-xl font-bold text-lg hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                    <i class="fas fa-save mr-3"></i>Sauvegarder le Programme
                </button>
                <button type="button" 
                        class="bg-gray-700 text-white px-8 py-4 rounded-xl font-bold text-lg hover:bg-gray-600 hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                    <i class="fas fa-times mr-3"></i>Annuler
                </button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let musicianIndex = 0;
            const selectedMusicians = new Set();
            
            const musicianSelect = document.getElementById('musicianSelect');
            const addMusicianBtn = document.getElementById('addMusicianBtn');
            const selectedMusiciansContainer = document.getElementById('selectedMusicians');
            const emptyState = document.getElementById('emptyState');
            
            // Fonction pour ajouter un musicien
            function addMusician() {
                const selectedOption = musicianSelect.options[musicianSelect.selectedIndex];
                
                if (!selectedOption.value) {
                    showAlert('Veuillez sélectionner un musicien', 'warning');
                    return;
                }
                
                const musicianId = selectedOption.value;
                const musicianName = selectedOption.dataset.name;
                const musicianInstrument = selectedOption.dataset.instrument;
                
                // Vérifier si le musicien n'est pas déjà ajouté
                if (selectedMusicians.has(musicianId)) {
                    showAlert('Ce musicien est déjà ajouté au programme', 'warning');
                    return;
                }
                
                selectedMusicians.add(musicianId);
                
                // Masquer l'état vide
                emptyState.style.display = 'none';
                
                // Créer le bloc du musicien
                const musicianBlock = document.createElement('div');
                musicianBlock.className = 'musician-block bg-gray-800 bg-opacity-60 border-2 border-gray-700 rounded-xl p-6 mb-4 relative animate-slide-up backdrop-blur-sm';
                musicianBlock.dataset.musicianId = musicianId;
                musicianBlock.dataset.index = musicianIndex;
                
                musicianBlock.innerHTML = `
                    <button type="button" 
                            class="absolute top-4 right-4 gradient-danger text-white w-8 h-8 rounded-full hover:shadow-lg transform hover:scale-110 transition-all duration-300 remove-musician"
                            onclick="removeMusician(this)">
                        <i class="fas fa-times text-sm"></i>
                    </button>
                    
                    <div class="gradient-info text-white rounded-lg p-4 mb-6">
                        <h3 class="text-xl font-bold mb-1">
                            <i class="fas fa-user mr-2"></i>${musicianName}
                        </h3>
                        <p class="text-cyan-100">
                            <i class="fas fa-music mr-2"></i>${musicianInstrument}
                        </p>
                    </div>
                    
                    <input type="hidden" name="musicians[${musicianIndex}][musician_id]" value="${musicianId}">
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-300 mb-2">
                                <i class="fas fa-sort-numeric-up mr-2"></i>Ordre de passage
                            </label>
                            <input type="number" 
                                   name="musicians[${musicianIndex}][order]" 
                                   min="1" 
                                   value="${musicianIndex + 1}"
                                   class="w-full px-4 py-3 input-dark rounded-xl focus:ring-2 focus:ring-indigo-500 transition-all duration-300"
                                   required>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-semibold text-gray-300 mb-2">
                                <i class="fas fa-clock mr-2"></i>Durée (minutes)
                            </label>
                            <input type="number" 
                                   name="musicians[${musicianIndex}][duration]" 
                                   min="1" 
                                   max="120"
                                   class="w-full px-4 py-3 input-dark rounded-xl focus:ring-2 focus:ring-indigo-500 transition-all duration-300"
                                   placeholder="Ex: 5"
                                   required>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-semibold text-gray-300 mb-2">
                                <i class="fas fa-user-tag mr-2"></i>Rôle (optionnel)
                            </label>
                            <input type="text" 
                                   name="musicians[${musicianIndex}][role]" 
                                   class="w-full px-4 py-3 input-dark rounded-xl focus:ring-2 focus:ring-indigo-500 transition-all duration-300"
                                   placeholder="Ex: Soliste, Chef de pupitre">
                        </div>
                    </div>
                `;
                
                selectedMusiciansContainer.appendChild(musicianBlock);
                
                // Réinitialiser la sélection
                musicianSelect.selectedIndex = 0;
                
                // Incrémenter l'index
                musicianIndex++;
                
                showAlert(`${musicianName} ajouté au programme`, 'success');
            }
            
            // Fonction pour supprimer un musicien
            window.removeMusician = function(button) {
                const musicianBlock = button.closest('.musician-block');
                const musicianId = musicianBlock.dataset.musicianId;
                
                // Animation de disparition
                musicianBlock.style.transition = 'all 0.3s ease';
                musicianBlock.style.opacity = '0';
                musicianBlock.style.transform = 'translateY(-20px)';
                
                setTimeout(() => {
                    selectedMusicians.delete(musicianId);
                    musicianBlock.remove();
                    
                    // Afficher l'état vide si aucun musicien
                    if (selectedMusicians.size === 0) {
                        emptyState.style.display = 'block';
                    }
                    
                    // Réorganiser les indices
                    updateMusicianIndices();
                    showAlert('Musicien retiré du programme', 'info');
                }, 300);
            };
            
            // Fonction pour mettre à jour les indices des musiciens
            function updateMusicianIndices() {
                const musicianBlocks = selectedMusiciansContainer.querySelectorAll('.musician-block');
                musicianBlocks.forEach((block, index) => {
                    block.dataset.index = index;
                    
                    // Mettre à jour les noms des champs
                    const inputs = block.querySelectorAll('input[name*="musicians["]');
                    inputs.forEach(input => {
                        const name = input.getAttribute('name');
                        const newName = name.replace(/musicians\[\d+\]/, `musicians[${index}]`);
                        input.setAttribute('name', newName);
                    });
                    
                    // Mettre à jour l'ordre par défaut
                    const orderInput = block.querySelector('input[name*="[order]"]');
                    if (orderInput) {
                        orderInput.value = index + 1;
                    }
                });
                
                musicianIndex = musicianBlocks.length;
            }
            
            // Fonction pour afficher des alertes
            function showAlert(message, type = 'info') {
                const alertColors = {
                    success: 'bg-emerald-900 border-emerald-500 text-emerald-100',
                    warning: 'bg-amber-900 border-amber-500 text-amber-100',
                    error: 'bg-red-900 border-red-500 text-red-100',
                    info: 'bg-blue-900 border-blue-500 text-blue-100'
                };
                
                const alertIcons = {
                    success: 'fas fa-check-circle',
                    warning: 'fas fa-exclamation-triangle',
                    error: 'fas fa-times-circle',
                    info: 'fas fa-info-circle'
                };
                
                const alert = document.createElement('div');
                alert.className = `fixed top-4 right-4 ${alertColors[type]} border-l-4 p-4 rounded-lg shadow-2xl z-50 animate-slide-down backdrop-blur-sm`;
                alert.innerHTML = `
                    <div class="flex items-center">
                        <i class="${alertIcons[type]} mr-2"></i>
                        <span>${message}</span>
                        <button onclick="this.parentElement.parentElement.remove()" class="ml-4 font-bold hover:opacity-70">×</button>
                    </div>
                `;
                
                document.body.appendChild(alert);
                
                // Auto-remove after 3 seconds
                setTimeout(() => {
                    if (alert.parentElement) {
                        alert.style.opacity = '0';
                        alert.style.transform = 'translateX(100%)';
                        setTimeout(() => alert.remove(), 300);
                    }
                }, 3000);
            }
            
            // Event listeners
            addMusicianBtn.addEventListener('click', addMusician);
            
            // Permettre l'ajout avec Enter sur le select
            musicianSelect.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    addMusician();
                }
            });
            
            // Validation du formulaire
            document.getElementById('programmeForm').addEventListener('submit', function(e) {
                e.preventDefault();
                
                if (selectedMusicians.size === 0) {
                    showAlert('Veuillez ajouter au moins un musicien au programme', 'warning');
                    return false;
                }
                
                // Vérifier que tous les champs requis sont remplis
                const requiredFields = this.querySelectorAll('input[required], select[required]');
                let isValid = true;
                
                requiredFields.forEach(field => {
                    if (!field.value.trim()) {
                        field.classList.add('border-red-500');
                        isValid = false;
                    } else {
                        field.classList.remove('border-red-500');
                    }
                });
                
                if (!isValid) {
                    showAlert('Veuillez remplir tous les champs obligatoires', 'error');
                    return false;
                }
                
                // Simulation de sauvegarde
                showAlert('Programme sauvegardé avec succès !', 'success');
                console.log('Données du formulaire:', new FormData(this));
            });
            
            // Validation en temps réel
            document.querySelectorAll('input[required], select[required]').forEach(field => {
                field.addEventListener('input', function() {
                    if (this.value.trim()) {
                        this.classList.remove('border-red-500');
                    }
                });
            });
        });
    </script>
</body>
</html>
