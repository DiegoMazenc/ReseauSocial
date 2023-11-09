<?php

$error = "";
if (isset($_POST['upload'])) {
    //On copie le fichier temporaire vers un vrai fichier quelque part
    $tempFile = $_FILES["image_file"]["tmp_name"];
    $sizeFile = $_FILES["image_file"]["size"];
    $checkFile = @getimagesize($tempFile);

    $explode = explode("/", $checkFile['mime']);


    if ($checkFile) {
        if ($sizeFile < 1000000) {
            if ($explode[1] == 'jpeg' || $explode[1] == 'jpg' || $explode[1] == 'png') {
                $newFile = $_SESSION['pseudo'] .  time() . "." . $explode[1];
                move_uploaded_file($tempFile, "./uploads/" . $newFile);
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

include "./views/layout.phtml";
