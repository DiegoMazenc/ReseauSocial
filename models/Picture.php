<?php

require_once("./services/database.php");

class Picture
{
    //====HOME===\\
    public static function getAllCaroussel()
    {
        $pictures = [];
        $db = connectDB();
        $sql = $db->prepare("SELECT * FROM picture ORDER BY id DESC LIMIT 3");
        $sql->execute();
        $pictures = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $pictures;
    }

    //====GALLERY===\\
    public static function getAllGallery()
    {
        $pictures = [];
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
        return $pictures;
    }


    //====ARTICLE===\\
    public static function getAllArticle()
    {
        $pictures = [];
        $db = connectDB();
        $id = $_GET['id'];
        $sql = $db->prepare("SELECT *, 
            users.pseudo AS user_pseudo 
            FROM picture 
            INNER JOIN users ON users.id = picture.id_user 
            WHERE picture.id = $id");
        $sql->execute();
        $pictures = $sql->fetch(PDO::FETCH_ASSOC);
        return $pictures;
    }

    //====ADMIN ADD====\\
    public static function insertPicture($src, $title, $description, $userId)
    {
        $db = connectDB();
        $sql = $db->prepare('INSERT INTO picture (src,title,description,id_user) VALUES(?,?,?,?)');
        $sql->execute([$src, $title, $description, $userId]);
        return true;
    }

    //====ADMIN DELETE====\\
    public static function deletePicture($actif, $id)
    {
        $db = connectDB();
        $sql = $db->prepare('UPDATE picture SET actif=? WHERE id = ?');
        $sql->execute([$actif, $id]);
        return true;
    }

    //====ADMIN LISTE====\\

    public static function getListAdmin()
    {
        $db = connectDB();
        $sql = $db->prepare("SELECT *,
                picture.id AS picture_id ,
                users.pseudo AS user_pseudo
                FROM picture
                INNER JOIN users ON users.id = picture.id_user
                WHERE picture.actif = 'oui'
                ORDER BY picture_id DESC ");
        $sql->execute();
        $pictures = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $pictures;
    }

    public static function getListPublic($id)
    {
        $db = connectDB();
        $sql = $db->prepare("SELECT *,picture.id AS picture_id FROM picture WHERE id_user=$id AND actif= 'oui' ");
        $sql->execute();
        $pictures = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $pictures;
    }

    //====ADMIN UPDATE====\\
    public static function getArticleUpdate($id)
    {
        $db = connectDB();
        $sql = $db->prepare("SELECT * FROM picture WHERE id = ?");
        $sql->execute([$id]);
        $picture = $sql->fetch(PDO::FETCH_ASSOC);
        return $picture;
    }

    public static function updateArticle($new_src, $new_title, $new_description, $updateDate, $id)
    {
        $db = connectDB();
        $sql = $db->prepare("UPDATE picture SET src=?, title=?, description=?, updated_at=? WHERE id = ?");
        $sql->execute(array($new_src, $new_title, $new_description, $updateDate, $id));
        return true;
    }
}
