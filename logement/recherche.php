<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>Page - Logement</title>
    <link href="../main.css" rel="stylesheet" />
</head>

<nav>
    <div>
        <img src="../Ressources/Images/logo.png" height="90" width="100" />
    </div>
    <div>
        <a href="../Views/PageAccueil.html">Accueil</a>
        <a class="active">Logement</a>
        <a href="../Views/PageTroc.html">Troc</a>
        <a href="../Views/PageGeneral.html">Information</a>
    </div>
    <div>
        <a href="../Views/PageAuth.html">Connexion</a>
    </div>
</nav>


<body>
    <div class="logement-header">
        <div>
          <a href="monannonce.php">Mon annonce</a>
          <p class="active">Recherche d'offres</p>
        </div>
    </div>
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
            <button onclick="fetchAnnonces()">Filtrer</button>
            <h1>Carte interactive de Limoges</h1>
            <button onclick="fetchMap()">Afficher la carte</button>
        </div>

        <!-- Colonne Infos -->
        <div class="col" id="info-display">
            <!-- Contenu dynamique -->
        </div>
        </div>

    </div>

    <script src="../Ressources/JS/main.js"></script>

</body>
</html>
