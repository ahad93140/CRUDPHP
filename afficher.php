<?php
$bdd = new PDO('mysql:host=localhost;dbname=pdo_php;charset=utf8', 'root', '');

// Vérification de la connexion
if (!$bdd) {
    die('Erreur de connexion à la base de données');
}

if (isset($_GET['email']) && is_numeric($_GET['email'])) {
    $email = $_GET['email'];

    // Récupération des détails du membre depuis la base de données
    $query = "SELECT * FROM utilisateurs WHERE id = :id";
    $result = $bdd->prepare($query);
    $result->bindParam(':email', $email);
    $result->execute();

    // Vérification si le membre existe
    if ($result->rowCount() > 0) {
        $nom = $result->fetch(PDO::FETCH_ASSOC);
    } else {
        echo 'Membre non trouvé.';
        exit;
    }
} else {
    echo 'ID du membre non spécifié.';
    exit;
}

// Fermer la connexion après utilisation
$bdd = null;
?>