<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Mon annonces</title>
    <link href="styles.css" rel="stylesheet" />
</head>
<!-- <?php include("../navbar.html"); ?> -->
<body>

    <div class="col2">
        <!-- Colonne Barre -->
        <div class="col-nav">
            <ul class="ul-col-nav">
                <li class="li-col-nav">
                    <a href="monannonce.php">Mes annonces</a>
                </li>
                <li class="li-col-nav">
                    <a href="recherche.php">Recherche d'annonces</a>
                </li>
            </ul>
        </div>

        <!-- Colonne Infos -->
        <div class="col" id="info-display">

            <?php
                require_once '../admin/database.php';
                $db = Database::connect();

                $statement = $db->query('SELECT * FROM m_annonce');
                $annonces = $statement->fetchAll();

                foreach($annonces as $annonce)
                {
                    echo    '<ul>
                                <il>Nom: ' . $annonce['nom'] .'</li>
                                <il>Type: ' . $annonce['type'] .'</li>
                                <il>Prix: ' . $annonce['prix'] .'</li>
                                <il>Surface: ' . $annonce['surface'] .' m²</li>
                                <il>Colocation: ' . $annonce['colocation'] .'</li>
                                <il>Proximité: ' . $annonce['proxi'] .'</li>
                                <il>Propriètaire: ' . $annonce['proprietaire'] .'</li>';
                }
                
                Database::disconnect();
            ?>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>


