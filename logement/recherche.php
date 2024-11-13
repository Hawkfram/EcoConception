<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Recherche d'annonces</title>
    <link href="styles.css" rel="stylesheet" />
</head>

<body>

    <div class="row-left">
        <!-- Colonne Choix -->
        <div class="col">
            <div>
                <h1>Filtrage des annonces</h1>
                <ul>
                    <li onclick="showInfo('type')">Type</li>
                    <li onclick="showInfo('prix')">Prix</li>
                    <li onclick="showInfo('surface')">Surface</li>
                    <li onclick="showInfo('colocation')">Colocation</li>
                    <li onclick="showInfo('proximite')">Proximité</li>
                </ul>
            </div>
            
            <div>
                <h1 onclick="showFavoris('m')">Mes favoris</h1>
            </div>

            <div>
                <h1>Carte interactive de Limoges</h1>
             
                <br>
            </div>
        </div>

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
                                    <il>Propriètaire: ' . $annonce['proprietaire'] .'</li>
                                </ul>';
                    }
                    
                    Database::disconnect();
                ?>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
