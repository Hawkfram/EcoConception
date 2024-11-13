<?php
// Inclure la classe Database pour gérer la connexion à la base de données
include_once 'Database.php';

// Connexion à la base de données
$pdo = Database::connect();

// Récupérer les lieux à partir de la base de données
$query = "SELECT nom, latitude, longitude FROM lieux";
$stmt = $pdo->query($query);
$lieux = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Déconnexion de la base de données
Database::disconnect();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carte Interactive de Limoges</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <style>
        #map {
            height: 600px; /* Hauteur de la carte */
        }
    </style>
</head>
<body>
    <h1>Carte Interactive de Limoges</h1>
    <div id="map"></div>

    <script>
        // Initialisation de la carte avec les coordonnées de Limoges
        var map = L.map('map').setView([45.8663, 1.2615], 13);

        // Ajouter la couche de tuiles (carte de base d'OpenStreetMap)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Ajouter les marqueurs dynamiques avec les données PHP
        <?php foreach ($lieux as $lieu): ?>
            L.marker([<?php echo $lieu['latitude']; ?>, <?php echo $lieu['longitude']; ?>])
                .addTo(map)
                .bindPopup('<?php echo htmlspecialchars($lieu['nom']); ?>');
        <?php endforeach; ?>
    </script>
</body>
</html>
