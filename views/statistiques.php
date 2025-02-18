<?php
require_once '/home/ecoriders/backend/database/db.php';
require_once '/home/ecoriders/backend/models/statistiqueModel.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$modele = new StatistiqueModel($conn);

// Récupération des données statistiques
$covoituragesParMois = $modele->getCovoituragesParMois();
$revenusParMois = $modele->getRevenusParMois();
$statsGenerales = $modele->getStatistiquesGenerales();
?>
<div class="container d-flex flex-column mt-5">
    <div class="row justify-content-center mb-4">
        <div class="col-md-12 col-12 mt-5 mb-5">
            <div class="shadow-sm rounded" style="background-color: #F2F2F2;">
                <div class="row mb-2 justify-content-center">
                    <h2 class="text-primary text-center fw-bold mt-2">EcoRide.Admin</h2>
                    <h3 class="text-center fw-bold mb-4">Statistiques</h3>
                </div>
                <!-- Section des statistiques générales -->
                <div class="row mb-2 justify-content-center">
                    <div class="col-md-3 py-2">
                        <h5 class="text-center text-dark fw-bold">Covoiturages</h5>
                        <h4 class="text-center text-primary fw-bold"><?= $statsGenerales["total_covoiturages"] ?></h4>
                    </div>
                    <div class="col-md-3 py-2">
                        <h5 class="text-center text-dark fw-bold">Utilisateurs</h5>
                        <h4 class="text-center text-primary fw-bold"><?= $statsGenerales["total_utilisateurs"] ?></h4>
                    </div>
                    <div class="col-md-3 py-2">
                        <h5 class="text-center text-dark fw-bold">Transactions</h5>
                        <h4 class="text-center text-primary fw-bold"><?= number_format($statsGenerales["total_revenus"], 2) ?> €</h4>
                    </div>
                    <div class="col-md-3 py-2">
                        <h5 class="text-center text-dark fw-bold">Recettes </h5>
                        <h4 class="text-center text-primary fw-bold"><?= number_format($statsGenerales["total_revenus"] * 0.1, 2) ?> €</h4>
                    </div>
                </div>

                <!-- Ajout des graphiques -->
                <div class="row mb-2 justify-content-center">
                    <div class="col-md-5 text-center">
                        <canvas id="covoituragesChart"></canvas><br>
                        <h5 class="text-dark fw-bold">Covoiturages</h5>
                    </div>
                    <div class="col-md-5 text-center ms-4">
                        <canvas id="revenusChart"></canvas><br>
                        <h5 class="text-secondary fw-bold">Recettes</h5>
                    </div>
                </div>
                <script>
                    // Conversion des numéros de mois en noms complets
                    const moisNoms = [
                        "Janvier", "Février", "Mars", "Avril", "Mai", "Juin",
                        "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"
                    ];

                    // Données converties depuis PHP
                    const covoituragesData = <?php echo json_encode($covoituragesParMois); ?>;
                    const revenusData = <?php echo json_encode($revenusParMois); ?>;

                    // Fonction pour générer un graphique avec une échelle et des barres plus grandes
                    function generateChart(canvasId, data, label, color, maxY) {
                        const canvas = document.getElementById(canvasId);
                        const ctx = canvas.getContext('2d');
                        canvas.width = 600;  // Largeur plus grande pour plus de visibilité
                        canvas.height = 300; // Hauteur plus grande pour un meilleur rendu

                        const labels = data.map(d => moisNoms[d.mois - 1]);  // Convertit numéro du mois en nom
                        const values = data.map(d => d.total);

                        // Définir la taille du graphique
                        const chartWidth = canvas.width - 80;
                        const chartHeight = canvas.height - 50;
                        const padding = 50;  // Marge pour les étiquettes et l'échelle

                        // Définir le maximum pour l'échelle
                        const maxVal = maxY || Math.max(...values) * 1.2;
                        const step = Math.ceil(maxVal / 5); // Diviser l'échelle en 5 niveaux arrondis

                        // Effacer le canvas avant de redessiner
                        ctx.clearRect(0, 0, canvas.width, canvas.height);
                        ctx.font = "14px Arial";
                        ctx.textAlign = "right";

                        // Dessiner la grille et l’échelle
                        for (let i = 0; i <= 5; i++) {
                            let y = chartHeight - (i * chartHeight / 5) + padding;
                            let valueLabel = i * step;
                            ctx.fillStyle = "black";
                            ctx.fillText(valueLabel, padding - 10, y);
                            
                            ctx.beginPath();
                            ctx.moveTo(padding, y);
                            ctx.lineTo(chartWidth + padding, y);
                            ctx.strokeStyle = "#ddd";
                            ctx.stroke();
                        }

                        // Dessiner les barres avec plus de largeur et d'espacement
                        const barWidth = 40;   // Augmenter la largeur des barres
                        const barSpacing = 70; // Augmenter l'espacement entre les barres

                        values.forEach((val, index) => {
                            let x = index * barSpacing + padding + 20;
                            let y = chartHeight - (val / maxVal * chartHeight) + padding;

                            // Dessiner la barre
                            ctx.fillStyle = color;
                            ctx.fillRect(x, y, barWidth, (val / maxVal * chartHeight));

                            // Ajouter la valeur au-dessus de la barre
                            ctx.fillStyle = "black";
                            ctx.fillText(val, x + barWidth / 2, y - 5);

                            // Ajouter le label du mois sous la barre
                            ctx.textAlign = "center";
                            ctx.fillText(labels[index], x + barWidth / 2, chartHeight + padding + 10);
                        });
                    }

                    // Génération des deux graphiques avec des échelles adaptées
                    generateChart("covoituragesChart", covoituragesData, "Covoiturages", "#213A40", 100); 
                    generateChart("revenusChart", revenusData, "Revenus (€)", "#57F2AA", 1000);

                </script>
            </div>
        </div>
    </div>
</div>