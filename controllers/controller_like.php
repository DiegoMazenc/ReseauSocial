<?php
require_once("./models/Likes.php");

if (isset($_POST['action']) && isset($_POST['id_picture'])) {
    $id_user = $_SESSION['id'];
    $id_picture = $_POST['id_picture'];

    if ($_POST['action'] == 'like') {
        Likes::insertLike($id_picture, $id_user);
    } elseif ($_POST['action'] == 'unlike') {
        Likes::deleteLike($id_picture, $id_user);
    }


    // Maj du compteur de Like
    $newLikesCount = Likes::cntLikes($id_picture);
    echo json_encode(['likes' => $newLikesCount]);
}

