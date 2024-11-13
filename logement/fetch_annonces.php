<?php
require_once '../admin/database.php';
$db = Database::connect();

$sort = isset($_GET['sort']) ? $_GET['sort'] : 'prix_asc';  // Trier par défaut (prix_asc)
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
    case 'proxi_asc':
        $orderBy = 'proxi ASC';
        break;
    case 'proxi_desc':
        $orderBy = 'proxi DESC';
        break;
    default:
        $orderBy = 'prix ASC';
}

$query = "SELECT * FROM m_annonce WHERE 1";

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
        echo '<ul>
                <li>Nom: ' . htmlspecialchars($annonce['nom']) . '</li>
                <li>Type: ' . htmlspecialchars($annonce['type']) . '</li>
                <li>Prix: ' . htmlspecialchars($annonce['prix']) . ' €</li>
                <li>Surface: ' . htmlspecialchars($annonce['surface']) . ' m²</li>
                <li>Colocation: ' . htmlspecialchars($annonce['colocation']) . '</li>
                <li>Proximité: ' . htmlspecialchars($annonce['proxi']) . '</li>
                <li>Propriétaire: ' . htmlspecialchars($annonce['proprietaire']) . '</li>
              </ul>';
}
}

Database::disconnect();
?>
