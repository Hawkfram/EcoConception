<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Mon annonces</title>
    <link href="styles.css" rel="stylesheet" />
</head>
<!-- <?php include("../navbar.html"); ?> -->
<body>

    <div class="row">
        <!-- Colonne Choix -->
        <div class="col">
            <div>
                <h1>Annonce personnel</h1>
                <ul>
                    <li onclick="showInfo('Mannonce')">Mon annonce</li>
                </ul>
                <h1>Annonces aperçus</h1>
                <ul>
                    <li onclick="showInfo('Tannonce')">Annonce trouvé</li>
                </ul>
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
                <h2>Informations</h2>
                <p>Cliquez sur un des éléments à gauche pour afficher les informations.</p>
            </div>
        </div>
    </div>

    <script src="script.js"></script>

</body>

</html>
