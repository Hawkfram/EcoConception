<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une annonce de Logement</title>
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
        <a href="PageAuth.html">Connexion</a>
    </div>
</nav>


<body>

    <div class="logement-header">
        <div>
            <p class="active">Mon annonce</p>
            <a href="recherche.php">Recherche d'offres</a>
        </div>
    </div>

    <div class="form-container">
        <h2>Créer une annonce</h2>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                include('database.php');
                $db = Database::connect(); 

                $nom = $_POST['nom'];
                $prix = $_POST['prix'];
                $surface = $_POST['surface'];
                $type = $_POST['type'];
                $colocation = isset($_POST['colocation']) ? 1 : 0;
                $latitude = $_POST['latitude'];
                $longitude = $_POST['longitude'];
                $description = $_POST['description'];
                $telephone = $_POST['telephone'];
                $contact = $_POST['contact'];
                $proprietaire = $_POST['proprietaire'];
                $proximite = $_POST['proximite'];

                $sql = "INSERT INTO annonces (nom, prix, surface, type, colocation, latitude, longitude, description, telephone, contact, proprietaire, proximite)
                        VALUES (:nom, :prix, :surface, :type, :colocation, :latitude, :longitude, :description, :telephone, :contact, :proprietaire, :proximite)";
                
                $stmt = $db->prepare($sql);

                $stmt->bindParam(':nom', $nom);
                $stmt->bindParam(':prix', $prix);
                $stmt->bindParam(':surface', $surface);
                $stmt->bindParam(':type', $type);
                $stmt->bindParam(':colocation', $colocation, PDO::PARAM_BOOL);
                $stmt->bindParam(':latitude', $latitude);
                $stmt->bindParam(':longitude', $longitude);
                $stmt->bindParam(':description', $description);
                $stmt->bindParam(':telephone', $telephone);
                $stmt->bindParam(':contact', $contact);
                $stmt->bindParam(':proprietaire', $proprietaire);
                $stmt->bindParam(':proximite', $proximite);

                if ($stmt->execute()) {
                    echo "<div class='success-message'>Annonce publiée avec succès !</div>";
                } else {
                    echo "<div class='error-message'>Erreur lors de la publication de l'annonce.</div>";
                }

                Database::disconnect();
            }
        ?>

        <form action="submit_announcement.php" method="POST">
            <div class="form-group">
                <label for="nom">Nom de l'annonce :</label>
                <input type="text" id="nom" name="nom" required placeholder="Entrez le nom de l'annonce" />
            </div>

            <div class="form-group">
                <label for="prix">Prix :</label>
                <input type="number" id="prix" name="prix" required placeholder="Entrez le prix" />
            </div>

            <div class="form-group">
                <label for="surface">Surface (m²) :</label>
                <input type="number" id="surface" name="surface" required placeholder="Entrez la surface" />
            </div>

            <div class="form-group">
                <label for="type">Type de bien :</label>
                <select id="type" name="type" required>
                    <option value="chambre">Chambre</option>
                    <option value="studio">Studio</option>
                    <option value="appartement">Appartement</option>
                    <option value="résidence étudiante">Résidence étudiante</option>
                </select>
            </div>

            <div class="form-group">
                <label for="colocation">Colocation :</label>
                <input type="checkbox" id="colocation" name="colocation" />
            </div>

            <div class="form-group">
                <label for="latitude">Latitude :</label>
                <input type="number" step="0.000001" id="latitude" name="latitude" required placeholder="Entrez la latitude" />
            </div>

            <div class="form-group">
                <label for="longitude">Longitude :</label>
                <input type="number" step="0.000001" id="longitude" name="longitude" required placeholder="Entrez la longitude" />
            </div>

            <div class="form-group">
                <label for="description">Description :</label>
                <textarea id="description" name="description" required placeholder="Entrez une description" rows="4"></textarea>
            </div>

            <div class="form-group">
                <label for="telephone">Téléphone :</label>
                <input type="text" id="telephone" name="telephone" placeholder="Entrez votre téléphone" />
            </div>

            <div class="form-group">
                <label for="contact">Contact :</label>
                <input type="text" id="contact" name="contact" required placeholder="Entrez votre contact (email)" />
            </div>

            <div class="form-group">
                <label for="proprietaire">Propriétaire :</label>
                <input type="text" id="proprietaire" name="proprietaire" required placeholder="Entrez le nom du propriétaire" />
            </div>

            <div class="form-group">
                <label for="proximite">Proximité :</label>
                <input type="number" id="proximite" name="proximite" required placeholder="Entrez la proximité (km)" />
            </div>

            <button type="submit">Publier l'annonce</button>
        </form>
    </div>

    <script src="../Ressources/JS/main.js"></script>
</body>
</html>
