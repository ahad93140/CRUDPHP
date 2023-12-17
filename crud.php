<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=pdo_php;charset=utf8', 'root', '');



$req = $bdd->prepare("SELECT * FROM utilisateurs WHERE email = :email AND mdp = :mdp");

$a=$req->execute(array(
    'email'=>$_POST['email'],
    'mdp'=>$_POST['mdp']
));

$res = $req->fetch();

if($res){
    $_SESSION['id'] = $res['id'];
    $_SESSION['mdp'] = $res['mdp'];
    header('Location: MENU.html');

}
else{
    echo 'erreur';
    echo '<form action="phpcrud.html">
    <input type="submit"  value="Retour"/><br>

</form>';

}

?>