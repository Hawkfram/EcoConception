<?php
require_once '../admin/database.php';
$db = Database::connect();

$sort = isset($_GET['sort']) ? $_GET['sort'] : 'prix_asc';  
$type = isset($_GET['type']) && !empty($_GET['type']) ? $_GET['type'] : null;
$colocation = isset($_GET['colocation']) ? $_GET['colocation'] : null;

switch ($sort) {
    case 'prix_asc':
        $orderBy = 'prix ASC';
        break;
    case 'prix_desc':
        $orderBy = 'prix DESC';
        break;
    case 'surface_asc':
        $orderBy = 'surface ASC';
        break;
    case 'surface_desc':
        $orderBy = 'surface DESC';
        break;
    case 'proximite_asc':
        $orderBy = 'proximite ASC';
        break;
    case 'proximite_desc':
        $orderBy = 'proximite DESC';
        break;
    default:
        $orderBy = 'prix ASC';
}

$query = "SELECT * FROM annonces WHERE 1";

if ($type) {
    $query .= " AND type = :type";
}

if ($colocation !== null) {
    $query .= " AND colocation = :colocation";
}

$query .= " ORDER BY $orderBy"; 

$statement = $db->prepare($query);

if ($type) {
    $statement->bindValue(':type', $type);
}
if ($colocation !== null) {
    $statement->bindValue(':colocation', $colocation);
}

$statement->execute();
$annonces = $statement->fetchAll();

if (empty($annonces)) {
    echo "<p>Aucune annonce disponible selon vos critères.</p>";
} else {
    foreach ($annonces as $annonce) {
        echo '<div class="col-annonce">
                    <div class="col-left-column">
                        <ul>
                            <li>Nom: ' . htmlspecialchars($annonce['nom']) . '</li>
                            <li>Type: ' . htmlspecialchars($annonce['type']) . '</li>
                            <li>Prix: ' . htmlspecialchars($annonce['prix']) . ' €</li>
                            <li>Surface: ' . htmlspecialchars($annonce['surface']) . ' m²</li>
                            <li>Colocation: ' . ($annonce['colocation'] === 1 ? 'Oui' : 'Non') . '</li>
                        </ul>
                    </div>
                    <div class="col-right-column">
                        <ul>    
                            <li>Proximité: ' . htmlspecialchars($annonce['proximite']) . '</li>
                            <li>Description: <br>' . htmlspecialchars($annonce['description']) . '</li>
                            <li>Propriétaire: ' . htmlspecialchars($annonce['proprietaire']) . '</li>
                            <li>Contact: ' . htmlspecialchars($annonce['contact']) . '</li>
                            <li id="telephone">Téléphone: ' . htmlspecialchars($annonce['telephone']) . '</li>
                        </ul>
                    </div>
              </div>';
    }    
}

Database::disconnect();
?>
