<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Recherche d'annonces</title>
    <link href="../main.css" rel="stylesheet" />
</head>
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
                <option value="appartement">Appartement</option>
                <option value="studio">Studio</option>
                <option value="maison">Maison</option>
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

            </div>
        </div>
    </div>

    <script>
        function fetchAnnonces() {
            const sortValue = document.getElementById('sort').value;
            const typeValue = document.getElementById('type').value;
            const colocationValue = document.getElementById('colocation').value;

            const xhr = new XMLHttpRequest();
            xhr.open('GET', `fetch_annonces.php?sort=${sortValue}&type=${typeValue}&colocation=${colocationValue}`, true);

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    document.getElementById('info-display').innerHTML = xhr.responseText;

                    const phoneElements = document.querySelectorAll('#info-display #telephone');

                    phoneElements.forEach(function(phoneElement) {
                        let phoneNumber = phoneElement.textContent.split(':')[1].trim();

                        if (phoneNumber) {
                            let formattedPhone = '+' + phoneNumber.replace(/(\d{2})(?=\d)/g, '$1 ');

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
