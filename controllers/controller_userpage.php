<?php
require_once("./models/Picture.php");
require_once("./models/Likes.php");
require_once("./models/Comment.php");
require_once("./models/Users.php");
require_once("./models/Friends.php");

$id = $_GET['id'];
$id_user = $_SESSION['id'];

//Insérer Commentaire
if (isset($_POST['valider'])) {
    $id = $_POST['id_post'];
    $com = $_POST['com'];
    Comment::insertComment($id, $id_user, $com);
}

//Insérer un Article
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

//Supprimer un commentaire
if (isset($_POST['supprimer'])) {
    $comment_id = $_POST['comment_id'];
    Comment::deleteComment($comment_id);
}

//Follow un utilisateur
if (isset($_POST['follow'])) {
    $id_sender = $_SESSION['id'];
    $id_receiver = $_POST['id_follow'];
    Friends::insertFriend($id_sender, $id_receiver);
}

//Unfollow un utilisateur
if (isset($_POST['unfollow'])) {
    $id_sender = $_SESSION['id'];
    $id_receiver = $_POST['id_follow'];
    Friends::deleteFriend($id_sender, $id_receiver);
}

//Récupérer la liste de follower
$friends = Friends::getAllFriends($id_user, $id);

//Récupérer la liste des articles de l'user
$pictures = Picture::getUserArticle($id);

//Récupérer les informations d'utilisateur
$photo = Users::userInfos($id);

include "./views/layout.phtml";

