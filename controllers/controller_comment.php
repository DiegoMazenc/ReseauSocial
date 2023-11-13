<?php
require_once("./services/database.php");
require_once("./models/Comment.php");

if (isset($_POST['id_picture']) && isset($_POST['comment'])) {
    $id_user = $_SESSION['id'];
    $id_picture = $_POST['id_picture'];
    $comment_text = $_POST['comment'];

    $db = connectDB();
    $sql = $db->prepare("INSERT INTO comment (id_picture, id_user, com) VALUES (?, ?, ?)");
    $sql->execute(array($id_picture, $id_user, $comment_text));

    // if ($sql->execute(array($id_picture, $id_user, $comment_text))) {
    //     // Récupérez le nouveau commentaire
    //     $newComment = end(comment::getComment($id_picture));

    //     // Retournez uniquement les données nécessaires en JSON
    //     echo json_encode(['success' => true, 'comment' => $newComment]);
    //     exit();
    // } else {
    //     echo json_encode(['success' => false, 'error' => 'Erreur d\'insertion du commentaire']);
    //     exit();
    // }
}
