<?php
require_once("./models/Users.php");
$errorPass = '';
$errorMail = '';
$errorPseudo = '';

$success = '';
if (isset($_POST['inscription'])) {
    $firstname = valid_donnees($_POST['firstname']);
    $name = valid_donnees($_POST['name']);
    $pseudo = valid_donnees($_POST['pseudo']);
    $gender = valid_donnees($_POST['gender']);
    $mail = valid_donnees($_POST['mail']);
    $password = valid_donnees($_POST['password']);
    $confirmPassword = valid_donnees($_POST['confirmPassword']);
    $cntMail = Users::cntMail($mail);
    $cntPseudo = Users::cntPseudo($pseudo);
    $validInscription = true;


    if ($cntMail > 0) {
        $validInscription = false;
        $errorMail = 'Email déjà existant';
    }

    if ($cntPseudo > 0) {
        $validInscription = false;
        $errorPseudo = 'Pseudo déjà existant';
    }

    if ($password  == $confirmPassword && $validInscription == true) {
        $hash = password_hash(valid_donnees($password), PASSWORD_BCRYPT);
        Users::inscription($firstname, $name, $pseudo, $gender, $mail, $hash);

        $success = 'Vous pouvez vous connecter';
    } else {
        $errorPass = 'Les mots de passe ne correspondent pas';
    }
}


$userConnect = '';
$alertConnect = '';



if (isset($_POST['submit'])) {

    $pseudo = valid_donnees($_POST['pseudo']);
    $user =  Users::connexionPseudo($pseudo);

    if ($user && valid_donnees(password_verify($_POST['password'], $user['password']))) {

        $_SESSION['firstname'] = $user['firstname'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['gender'] = $user['gender'];
        $_SESSION['mail'] = $user['mail'];
        $_SESSION['pseudo'] = $user['pseudo'];
        $_SESSION['id'] = $user['id'];
        $_SESSION['admin'] = $user['admin'];
        $id = $_SESSION['id'];

        $photo = Users::userInfos($id);

        $_SESSION['photo'] = $user['src_photo'];

        header("Location: index.php?page=home");
        exit;
    } else {
        $alertConnect = "Utilisateur non trouvé ou mot de passe incorrect";
    }
}

function valid_donnees($donnees)
{
    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    $donnees = htmlspecialchars($donnees);
    $donnees = strip_tags($donnees);
    return $donnees;
}

include "./views/layout.phtml";
