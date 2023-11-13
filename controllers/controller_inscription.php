<?php
require_once("./models/Users.php");

if(isset($_POST['submit'])){
    $firstname = $_POST['firstname'];
    $name = $_POST['name'];
    $pseudo = $_POST['pseudo'];
    $gender = $_POST['gender'];
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    $hash = password_hash(strip_tags($password), PASSWORD_DEFAULT);
    Users::inscription($firstname, $name, $pseudo, $gender, $mail, $hash);

    header("Location: index.php?page=home");
    exit;
    
}


// --- on charge la vue
include "./views/layout.phtml";