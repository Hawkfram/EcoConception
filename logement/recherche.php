<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Recherche d'annonces</title>
    <link href="../main.css" rel="stylesheet" />
</head>
<nav>
    <div>
        <img src="../../Ressources/Images/logo.png" height="90" width="100" />
    </div>
    <div>
        <a href="../../PageAccueil.html">Accueil</a>
        <a>Logement</a>
        <a href="../../PageTroc.html">Troc</a>
        <a class="active">Information</a>
    </div>
    <div>
        <a href="../../PageAuth.html">Connexion</a>
    </div>
</nav>
<body>

    <div class="row-left">
        <!-- Colonne Choix -->
        <div class="col-filtrage">
            <h1>Filtrage des annonces</h1>
            <label for="sort">Trier par :</label>
            <select id="sort">
                <option value="prix_asc">Prix (croissant)</option>
                <option value="prix_desc">Prix (décroissant)</option>
                <option value="surface_asc">Surface (croissant)</option>
                <option value="surface_desc">Surface (décroissant)</option>
                <option value="proxi_asc">Proximité (croissant)</option>
                <option value="proxi_desc">Proximité (décroissant)</option>
            </select>
            <br>
            <label for="type">Type de logement :</label>
            <select id="type">
                <option value="">Tous</option>
                <option value="chambre">Chambre</option>
                <option value="studio">Studio</option>
                <option value="appartement">Appartement</option>
                <option value="résidence étudiante">Résidence étudiante</option>
            </select>
            <br>
            <label for="colocation">Colocation :</label>
            <select id="colocation">
                <option value="">Tous</option>
                <option value="1">Oui</option>
                <option value="0">Non</option>
            </select>
            <br>

            <button onclick="fetchAnnonces()">Filtrer</button>
            <br>
            <h1>Carte interactive de Limoges</h1>
            <button onclick="fetchMap()">Afficher la carte</button>
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
                <!-- Contenu dynamique ici -->
            </div>
        </div>

    </div>

    <script>
        let map; // Déclaration de la variable globale pour la carte

        // Fonction pour récupérer les annonces filtrées et afficher les résultats dans #info-display
        function fetchAnnonces() {
            const sortValue = document.getElementById('sort').value;
            const typeValue = document.getElementById('type').value;
            const colocationValue = document.getElementById('colocation').value;

            const xhr = new XMLHttpRequest();
            xhr.open('GET', `fetch_annonces.php?sort=${sortValue}&type=${typeValue}&colocation=${colocationValue}`, true);

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Effacer le contenu de la div info-display avant d'ajouter les annonces
                    document.getElementById('info-display').innerHTML = xhr.responseText;

                    // Formater les numéros de téléphone dans le résultat affiché
                    const telephoneElements = document.querySelectorAll('#info-display #telephone');
                    telephoneElements.forEach(function(phoneElement) {
                        let telephoneNumber = phoneElement.textContent.split(':')[1].trim();
                        if (telephoneNumber) {
                            let formattedPhone = '+' + telephoneNumber.replace(/(\d{2})(?=\d)/g, '$1 ');
                            phoneElement.textContent = 'Téléphone: ' + formattedPhone;
                        }
                    });
                }
            };
            xhr.send();
        }
    </script>

</body>
</html>
