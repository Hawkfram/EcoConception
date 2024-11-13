<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Recherche d'annonces</title>
    <link href="styles.css" rel="stylesheet" />
</head>

<body>

    <div class="row">
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
                <h1>Contact</h1>
            </div>

            <div>
                <h1>Carte interactive de Limoges</h1>
            </div>
        </div>

        <!-- Colonne Info -->
        <div class="col" id="info-display">
            <h2>Informations</h2>
            <p>Cliquez sur un élément à gauche pour afficher les informations.</p>
        </div>
    </div>

    <script src="script.js"></script>

</body>

</html>
