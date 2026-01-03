<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-slate-50 min-h-screen font-sans">

    <?php include __DIR__ . '/../partial/navbar.php'; ?>

    <div class="max-w-7xl mx-auto px-6 py-12">

            
        <div class="mb-12  pb-6">
            <h1 class="text-4xl font-extrabold text-slate-900 tracking-tight">
                Planning des Activités
            </h1>
            <p class="mt-2 text-lg text-slate-600">Découvrez nos activités pour la saison 2025-2026.</p>
            <hr>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-sm mb-8 border border-slate-200">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                
                <!-- Jours -->
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Jours</label>
                    <div class="flex flex-wrap gap-2" id="filtre_jour">
                        <?php $jours = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche']; 
                        foreach($jours as $j): ?>
                            <label class="flex items-center space-x-2 bg-slate-50 px-2 py-1 rounded border cursor-pointer hover:bg-slate-100">
                                <input type="checkbox" value="<?php echo $j; ?>" class="filtre_jour text-indigo-600">
                                <span class="text-xs"><?php echo $j; ?></span>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Horaire -->
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Horaires (Entre)</label>
                    <div class="flex items-center space-x-2">
                        <input type="time" id="tps_min" class="filtre-input border rounded px-2 py-1 text-sm w-full" value="08:00">
                        <span>et</span>
                        <input type="time" id="tps_max" class="filtre-input border rounded px-2 py-1 text-sm w-full" value="22:00">
                    </div>
                </div>

                <!-- Sections -->
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Sections</label>
                    <div class="max-h-24 overflow-y-auto border rounded p-2 text-sm" id="filtre_section">
                        <?php foreach($sections as $sec): ?>
                            <label class="flex items-center space-x-2 mb-1">
                                <input type="checkbox" value="<?php echo htmlspecialchars($sec['lib_section']); ?>" class="filtre_section">
                                <span><?php echo htmlspecialchars($sec['lib_section']); ?></span>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!--Tarif -->
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Trier par Prix</label>
                    <select id="trier-prix" class="border rounded w-full px-2 py-1 text-sm">
                        <option value="none">Aucun tri</option>
                        <option value="asc">Croissant</option>
                        <option value="desc">Décroissant</option>
                    </select>
                </div>
            </div>
        </div>

        <div id="activites" class="flex flex-wrap -mx-4">  
            
            <?php if (empty($activites)): ?>
                <div class="w-full px-4 text-center py-20">
                    <p class="text-gray-500 text-xl italic">Aucune activité n'est disponible pour le moment.</p>
                </div>
            <?php else: ?>
                
                <?php foreach ($activites as $act): ?>
                    <div class="activite w-full md:w-1/2 lg:w-1/3 px-4 mb-8">
                        
                        <div class="flex flex-col h-full bg-white rounded-2xl shadow-sm border border-slate-200 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden">
                            
                            <div class="px-6 py-4 flex justify-between items-center bg-slate-50/50">
                                <span class="lib_section px-3 py-1 text-xs font-bold uppercase tracking-wider rounded-full <?php echo $act['cd_section'] === 'SPR' ? 'bg-orange-100 text-orange-700' : 'bg-blue-100 text-blue-700'; ?>">
                                    <?php echo htmlspecialchars($act['lib_section']); ?>
                                </span>
                                <span class="text-sm font-medium text-slate-500 italic">
                                    Ref: #<?php echo $act['id_activ']; ?>
                                </span>
                            </div>

                            <div class="p-6 flex-grow">
                                <h2 class="text-2xl font-bold text-slate-800 mb-3 capitalize">
                                    <?php echo htmlspecialchars($act['lib_activ']); ?>
                                </h2>
                                <p class="text-slate-600 mb-6 text-sm leading-relaxed">
                                    <?php echo htmlspecialchars($act['desc_activ']); ?>
                                </p>

                                <div class="space-y-3">
                                    <div class="flex items-center text-slate-700">
                                        <div class="w-8 h-8 rounded-lg bg-indigo-50 flex items-center justify-center mr-3">
                                            <i class="fa-regular fa-calendar-check text-indigo-600"></i>
                                        </div>
                                        <span class="font-medium">
                                            <span class="jour"><?= $act['jour'] ?></span> à 
                                            <span class="heure"><?= $act['h_deb'] ?></span>
                                        </span>
                                    </div>

                                    <div class="flex items-center text-slate-700">
                                        <div class="w-8 h-8 rounded-lg bg-emerald-50 flex items-center justify-center mr-3">
                                            <i class="fa-solid fa-location-dot text-emerald-600"></i>
                                        </div>
                                        <span><?php echo htmlspecialchars($act['lib_lieu']); ?></span>
                                    </div>
                                    
                                    <div class="flex items-center text-slate-700">
                                        <div class="w-8 h-8 rounded-lg bg-amber-50 flex items-center justify-center mr-3">
                                            <i class="fa-regular fa-clock text-amber-600"></i>
                                        </div>
                                        <span>Durée : <?php echo $act['duree_min']; ?> min</span>
                                    </div>
                                </div>
                            </div>

                            <div class="p-6 mt-auto border-t border-slate-100 flex justify-between items-center">
                                <div>
                                    <p class="text-xs text-slate-400 uppercase font-bold">Tarif Annuel</p>
                                    <p class="prix text-2xl font-black text-slate-900"><?php echo number_format($act['tarif'], 2, ',', ' '); ?> €</p>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>

            <?php endif; ?>

        </div>
    </div>

</body>
</html> 

<script>
    document.addEventListener('DOMContentLoaded', function() {

        //Qd on actualisait la page, les filtres étaient encore présent, on les remets par défaut au chargement de la page
        document.querySelectorAll('.filtre_jour, .filtre_section').forEach(cb => {
            cb.checked = false;
        });

        document.getElementById('tps_min').value = '08:00';
        document.getElementById('tps_max').value = '22:00';

        document.getElementById('trier-prix').value = 'none';

        document.querySelectorAll('.activite').forEach(act => {
            act.style.display = 'block';
        });

        const conteneur = document.getElementById('activites');
        const activites = Array.from(document.querySelectorAll('.activite'));
        
        const jourCheckbox = document.querySelectorAll('.filtre_jour');
        const sectionCheckbox = document.querySelectorAll('.filtre_section');
        const tempsMin = document.getElementById('tps_min');
        const tempsMax = document.getElementById('tps_max');
        const prixSelect = document.getElementById('trier-prix');

        function appliquerFiltresEtTri() {
            const joursSelect = Array.from(jourCheckbox).filter(cb => cb.checked).map(cb => cb.value);
            const sectionsSelec = Array.from(sectionCheckbox).filter(cb => cb.checked).map(cb => cb.value);
            const heureMin = tempsMin.value;
            const heureMax = tempsMax.value;

            activites.forEach(activite => {
                const jourActiv = activite.querySelector('.jour').textContent.trim();
                const heureActiv = activite.querySelector('.heure').textContent.trim();
                const sectionActiv = activite.querySelector('.lib_section').textContent.trim();

                const correspJour = joursSelect.length === 0 || joursSelect.includes(jourActiv);
                const correspSection = sectionsSelec.length === 0 || sectionsSelec.includes(sectionActiv);
                const correspHeure = heureActiv >= heureMin && heureActiv <= heureMax;

                activite.style.display = (correspJour && correspSection && correspHeure) ? 'block' : 'none';
            });


            const typeTri = prixSelect.value;
            if (typeTri !== 'aucun') {
                const activitesTriees = activites.sort((a, b) => {
                    const prixA = parseFloat(a.querySelector('.js-prix').textContent);
                    const prixB = parseFloat(b.querySelector('.js-prix').textContent);
                    
                    return typeTri === 'croissant' ? prixA - prixB : prixB - prixA;
                });
                
                activitesTriees.forEach(activite => conteneur.appendChild(activite));
            }
        }

        [...jourCheckbox, ...sectionCheckbox].forEach(el => el.addEventListener('change', appliquerFiltresEtTri));
        tempsMin.addEventListener('input', appliquerFiltresEtTri);
        tempsMax.addEventListener('input', appliquerFiltresEtTri);
        prixSelect.addEventListener('change', appliquerFiltresEtTri);
    });
</script>