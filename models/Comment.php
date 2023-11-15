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
                users.src_photo AS user_photo,
                comment.id_user AS id_user,
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

    public static function getComment($id)
    {
        $db = connectDB();
        $sql = $db->prepare(
            "SELECT *,
                comment.id AS comment_id, 
                users.pseudo AS user_pseudo, 
                users.src_photo AS user_photo,
                comment.id_user AS id_user
            FROM comment 
            INNER JOIN users ON users.id = comment.id_user 
            WHERE id_picture = :id
            ORDER BY comment.id DESC"
        );
    
        $sql->bindParam(':id', $id, PDO::PARAM_INT); // Utilisez bindParam pour lier le paramètre
        $sql->execute();
    
        $nbrCom = $sql->rowCount();
        $comments = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $comments;
    }


    public static function insertComment($id_picture, $id_user, $comment_text)
    {
        $db = new Database();
        $db->actionDB('INSERT INTO comment (id_picture,id_user,com) VALUES(?,?,?)',[$id_picture, $id_user, $comment_text]);
        return true;
    }

    public static function deleteComment($comment_id)
    {
        $db = new Database();
        $db->actionDB("DELETE FROM comment WHERE id = ?",[$comment_id]);
        return true;
    }
}