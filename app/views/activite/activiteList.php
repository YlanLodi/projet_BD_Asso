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

        <div class="flex flex-wrap -mx-4">  
            
            <?php if (empty($activites)): ?>
                <div class="w-full px-4 text-center py-20">
                    <p class="text-gray-500 text-xl italic">Aucune activité n'est disponible pour le moment.</p>
                </div>
            <?php else: ?>
                
                <?php foreach ($activites as $act): ?>
                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8">
                        
                        <div class="flex flex-col h-full bg-white rounded-2xl shadow-sm border border-slate-200 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden">
                            
                            <div class="px-6 py-4 flex justify-between items-center bg-slate-50/50">
                                <span class="px-3 py-1 text-xs font-bold uppercase tracking-wider rounded-full <?php echo $act['cd_section'] === 'SPR' ? 'bg-orange-100 text-orange-700' : 'bg-blue-100 text-blue-700'; ?>">
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
                                        <span class="font-medium"><?php echo $act['jour']; ?> à <?php echo $act['h_deb']; ?></span>
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
                                    <p class="text-2xl font-black text-slate-900"><?php echo number_format($act['tarif'], 2, ',', ' '); ?> €</p>
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