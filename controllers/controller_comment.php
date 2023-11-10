<?php

require_once("./services/database.php");

if (isset($_POST['id_picture']) && isset($_POST['comment'])) {
    $id_user = $_SESSION['id'];
    $id_picture = $_POST['id_picture'];
    $comment_text = $_POST['comment'];


    $db = connectDB();
    $sql = $db->prepare("INSERT INTO comment (id_picture, id_user, com) VALUES (?, ?, ?)");
    $sql->execute(array($id_picture, $id_user, $comment_text));

    $sql = $db->prepare(
        "SELECT *,
            comment.id AS comment_id, 
            users.pseudo AS user_pseudo, 
            users.id AS users_id,
            photo.src AS photo_src
        FROM comment 
        INNER JOIN users ON users.id = comment.id_user 
        INNER JOIN photo ON photo.id = users.id_photo
        WHERE id_picture = $id_picture 
        ORDER BY comment.id DESC"
        );
    
    $sql->execute();
    $comments = $sql->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode(['success' => true, 'comments' => $comments]);
}