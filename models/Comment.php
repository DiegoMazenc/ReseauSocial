<?php
require_once("./services/database.php");

class comment
{

    //====ARTICLE===\\
    public static function getAllComment($id)
    {
        $comments = [];
        $db = connectDB();
        $sql = $db->prepare(
            "SELECT *,
                comment.id AS comment_id, 
                users.pseudo AS user_pseudo, 
                users.id AS users_id,
                photo.src AS photo_src
            FROM comment 
            INNER JOIN users ON users.id = comment.id_user 
            INNER JOIN photo ON photo.id = users.id_photo
            WHERE id_picture = $id 
            ORDER BY comment.id DESC"
            );
        
        $sql->execute();
        $nbrCom = $sql->rowCount();
        $comments = $sql->fetchAll(PDO::FETCH_ASSOC);
        return [$comments,$nbrCom];
    }

    public static function insertComment($id_picture, $id_user, $comment_text)
    {
        $db = connectDB();
        $sql = $db->prepare('INSERT INTO comment (id_picture,id_user,com) VALUES(?,?,?)');
    
        $sql->execute(array($id_picture, $id_user, $comment_text));
        return true;
    }

    public static function deleteComment($comment_id)
    {
        $db = connectDB();
        $sql = $db->prepare("DELETE FROM comment WHERE id = ?");
        $sql->execute([$comment_id]);

        return true;
    }
}