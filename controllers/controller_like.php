<?php

$db = connectDB();
        $sql = $db->prepare("SELECT picture.*,
         users.pseudo AS user_pseudo, 
         photo.src AS photo_src ,
         (SELECT COUNT(*) FROM likes WHERE likes.id_picture = picture.id) AS nbrLikes,
         (SELECT COUNT(*) FROM comment WHERE comment.id_picture = picture.id) AS nbrCom
         FROM picture 
         INNER JOIN users ON users.id = picture.id_user 
         INNER JOIN photo ON photo.id = users.id_photo
         WHERE picture.actif = 'oui'
         ORDER BY picture.id DESC");
        $sql->execute();
        $pictures = $sql->fetchAll(PDO::FETCH_ASSOC);