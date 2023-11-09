<?php
require_once("./models/Users.php");

if(isset($_POST['inscription'])){
    $firstname = $_POST['firstname'];
    $name = $_POST['name'];
    $pseudo = $_POST['pseudo'];
    $gender = $_POST['gender'];
    $mail = strip_tags($_POST['mail']);
    $password = $_POST['password'];

    $hash = password_hash(strip_tags($password), PASSWORD_BCRYPT);
    
    Users::inscription($firstname, $name, $pseudo, $gender, $mail, $hash);

    header("Location: index.php?page=log");
    exit;
    
}

$userConnect = '';
$alertConnect = '';



if (isset($_POST['submit'])) {

    $pseudo = $_POST['pseudo'];
    $user =  Users::connexionPseudo($pseudo);

    if ($user && password_verify($_POST['password'], $user['password'])) {
        
        $_SESSION['pseudo'] = $user['pseudo'];
        $_SESSION['id'] = $user['id'];
        $_SESSION['admin'] = $user['admin'];
        $id = $_SESSION['id'];

        $photo = Users::photoProfil($id);
    
        $_SESSION['photo'] = $photo['photo_src'];

        header("Location: index.php?page=articlelist");
        exit;
    } else {
        $alertConnect = "Utilisateur non trouvé ou mot de passe incorrect";
    }
}

include "./views/layout.phtml";
