<?php
var_dump($_POST);
//VARIABLES
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$age = $_POST['age'];
$metier = $_POST['metier'];
$pays_res = $_POST['pays_res'];
$email = $_POST['email'];
$mdp = $_POST['mdp'];
$bdd = new PDO('mysql:host=localhost:3306;dbname=pdo_php;charset=utf8', 'root', '');

//CODE

    $requete = $bdd->prepare('INSERT INTO utilisateurs (nom,prenom,age,metier,pays_res,email,mdp) VALUES (:nom,:prenom,:age,:metier,:pays_res,:email,:mdp)');
    $requete->execute(array(
        'nom' => $nom,
        'prenom' => $prenom,
        'age' => $age,
        'metier' => $metier,
        'pays_res' => $pays_res,
        'email' => $email,
        'mdp' => $mdp,
    ));
    header("Location: MENU.html");


