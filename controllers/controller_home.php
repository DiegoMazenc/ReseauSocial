<?php
require_once("./models/Picture.php");
require_once("./models/Likes.php");
require_once("./models/Comment.php");
// $pictures = Picture::getAllCaroussel();

// Insert Like
// if (isset($_POST['like'])) {
//     $id_user = $_POST['id_user'];
//     $id_picture = $_POST['id_picture'];
//     Likes::insertLike($id_picture, $id_user);
//     // header("Location: index.php?page=home");
//     // exit;
// }
if (isset($_POST['valider'])) {
    $id = $_POST['id_post'];
    $id_user = $_SESSION['id'];
    $com = $_POST['com'];
    Comment::insertComment($id, $id_user, $com);
}




if (isset($_POST['submit'])) {

    $error = "";
    $tempFile = $_FILES["image_file"]["tmp_name"];
    $sizeFile = $_FILES["image_file"]["size"];
    $checkFile = @getimagesize($tempFile);

    $explode = explode("/", $checkFile['mime']);

    if ($checkFile) {
        if ($sizeFile < 1000000) {
            if ($explode[1] == 'jpeg' || $explode[1] == 'jpg' || $explode[1] == 'png') {

                $title = $_POST['title'];
                $description = $_POST['description'];
                $userId = $_SESSION['id'];
                $newFile = $_SESSION['pseudo'] .$title. time() . "." . $explode[1];
                $src = "./uploads/" . $newFile;

                move_uploaded_file($tempFile, "./uploads/" . $newFile);
                Picture::insertPicture($src, $title, $description, $userId);
               
             
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




if (isset($_POST['supprimer'])) {
    $comment_id = $_POST['comment_id'];
    Comment::deleteComment($comment_id);
}

$elementsParPage = 10;
$pageActuelle = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = max(0, ($pageActuelle - 1) * $elementsParPage);

// Utilisez une nouvelle fonction pour récupérer les images avec la pagination
$pictures = Picture::getPictureOffset($elementsParPage, $offset);

$totalPictures = Picture::countAllGallery(); // Obtenez le nombre total d'images

$totalPages = ceil($totalPictures / $elementsParPage);



include "./views/layout.phtml";
// --- la vue
