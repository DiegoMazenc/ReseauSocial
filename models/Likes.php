<?php
require_once("./services/database.php");

class Likes
{

    //====ARTICLE===\\
    
    //compteur Like
    public static function cntLikes($id)
    {
        $db = connectDB();
        $sql = $db->prepare("SELECT * FROM likes WHERE id_picture = $id ");
        $sql->execute();
        $nbrLike = $sql->rowCount();
        return $nbrLike;
    }

    //compteur Unlike
    public static function cntUnlikes($id)
    {
        $db = connectDB();
        $sql = $db->prepare('SELECT * FROM likes WHERE id_user = ? AND id_picture = ?');
        $sql->execute(array($_SESSION['id'], $id));
        $unlike = $sql->fetch(PDO::FETCH_ASSOC);
        return $unlike;
    }

    //Insert Like
    public static function insertLike($id_picture, $id_user)
    {
        $db = connectDB();
        $sql = $db->prepare( "INSERT INTO likes (id_picture,id_user)  VALUES(?,?)" );
        $sql->execute(array($id_picture, $id_user));
        return true;
    }

    //Delete Like
    public static function deleteLike($id_picture, $id_user)
    {
        $db = connectDB();
        $sql = $db->prepare( "DELETE FROM likes WHERE id_picture=? AND id_user=?");
        $sql->execute(array($id_picture, $id_user));
        return true;
    }
}
