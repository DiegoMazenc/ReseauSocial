<?php
require_once("./models/Picture.php");
require_once("./models/Users.php");

$id = $_SESSION['id'];
$pictures = Picture::getListPublic($id);

$user = Users::getUser($id);

if (isset($_POST['updateInfos'])) {
    $new_firstname = strip_tags($_POST['firstname']);
    $new_name = strip_tags($_POST['name']);
    $new_pseudo = strip_tags($_POST['pseudo']);
    $new_gender = strip_tags($_POST['gender']);
    $new_mail = strip_tags($_POST['mail']);

    try {
        Users::updateUser($new_firstname, $new_name, $new_pseudo, $new_gender, $new_mail, $id);
    } catch (Exception $e) {
        $sqlError = $e->getMessage();
    }
}


if (isset($_POST['addphoto'])) {

    $error = "";
    $tempFile = $_FILES["image_file"]["tmp_name"];
    $sizeFile = $_FILES["image_file"]["size"];
    $checkFile = @getimagesize($tempFile);

    $explode = explode("/", $checkFile['mime']);

    if ($checkFile) {
        if ($sizeFile < 1000000) {
            if ($explode[1] == 'jpeg' || $explode[1] == 'jpg' || $explode[1] == 'png') {


                $userId = $_SESSION['id'];
                $newFile = $_SESSION['pseudo'] . $userId . "profilpic" . time() . "." . $explode[1];
                $src = "./uploads/" . $newFile;

                move_uploaded_file($tempFile, "./uploads/" . $newFile);
                $db = connectDB();
                $sql = $db->prepare('UPDATE users SET src_photo=? WHERE id = ?');
                $sql->execute([$src, $userId]);
            } else {
                $error = "Nous acceptons uniquement les formats .jpeg, .jpg .png";
            }
        } else {
            $error = "la taille de l'image doit être inférieur à 1Mo";
        }
    } else {
        $error = "Nous acceptons uniquement les images";
    }
}

if (isset($_POST['addbanner'])) {

    $error = "";
    $tempFile = $_FILES["image_file"]["tmp_name"];
    $sizeFile = $_FILES["image_file"]["size"];
    $checkFile = @getimagesize($tempFile);

    $explode = explode("/", $checkFile['mime']);

    if ($checkFile) {
        if ($sizeFile < 10000000) {
            if ($explode[1] == 'jpeg' || $explode[1] == 'jpg' || $explode[1] == 'png') {


                $userId = $_SESSION['id'];
                $newFile = $_SESSION['pseudo'] . $userId . "bannerpic" . time() . "." . $explode[1];
                $src = "./uploads/" . $newFile;

                move_uploaded_file($tempFile, "./uploads/" . $newFile);
                $db = connectDB();
                $sql = $db->prepare('UPDATE users SET src_banner=? WHERE id = ?');
                $sql->execute([$src, $userId]);
            } else {
                $error = "Nous acceptons uniquement les formats .jpeg, .jpg .png";
            }
        } else {
            $error = "la taille de l'image doit être inférieur à 1Mo";
        }
    } else {
        $error = "Nous acceptons uniquement les images";
    }
}

$errorPassOne = '';
$errorPassTwo = '';
$errorPassThree = '';
if (isset($_POST['password'])) {
    $actuelPassword = $_POST['actuelPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    if ($user && password_verify($actuelPassword, $user['password'])) {
        if ($newPassword == $confirmPassword) {
            if ($actuelPassword !== $confirmPassword) {
                $hash = password_hash(strip_tags($confirmPassword), PASSWORD_DEFAULT);
                $db = connectDB();
                $sql = $db->prepare('UPDATE users SET password=? WHERE id = ?');
                $sql->execute([$hash, $id]);
            } else {
                $errorPassThree = 'Le nouveau mot de passe doit être différent du mot de passe actuel';
            }
        } else {
            $errorPassTwo = 'Le nouveau mot de passe de correspond pas';
        }
    } else {
        $errorPassOne = 'Mot de passe incorrect';
    }
}

include "./views/layout.phtml";
