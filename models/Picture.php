<?php

require_once("./services/database.php");
require_once("./services/class/Database.php");

class Picture
{
    //====HOME===\\

    public static function getAllGallery()
    {
        $db = new Database();
        $pictures = $db->selectAll("SELECT picture.*,
        users.pseudo AS user_pseudo, 
        photo.src AS photo_src ,
        users.id AS user_id,
       users.src_photo AS user_photo,
        (SELECT COUNT(*) FROM likes WHERE likes.id_picture = picture.id) AS nbrLikes,
        (SELECT COUNT(*) FROM comment WHERE comment.id_picture = picture.id) AS nbrCom
        FROM picture 
        INNER JOIN users ON users.id = picture.id_user 
        INNER JOIN photo ON photo.id = users.id_photo
        WHERE picture.actif = 'oui'
        ORDER BY picture.id DESC");
        return $pictures;

    }

    public static function getPictureOffset($limit, $offset)
    {
        $db = new Database();
        $query = "SELECT picture.*,
            users.pseudo AS user_pseudo, 
            photo.src AS photo_src,
            users.id AS user_id,
            users.src_photo AS user_photo,
            (SELECT COUNT(*) FROM likes WHERE likes.id_picture = picture.id) AS nbrLikes,
            (SELECT COUNT(*) FROM comment WHERE comment.id_picture = picture.id) AS nbrCom
            FROM picture 
            INNER JOIN users ON users.id = picture.id_user 
            INNER JOIN photo ON photo.id = users.id_photo
            WHERE picture.actif = 'oui'
            ORDER BY picture.id DESC
            LIMIT $limit OFFSET $offset";

        $pictures = $db->selectAll($query);
        return $pictures;
    }

    public static function countAllGallery()
    {
        $db = new Database();
        $count = $db->selectOne("SELECT COUNT(*) AS total FROM picture WHERE actif = 'oui'");
        return $count['total'];
    }



    //====ARTICLE===\\
    public static function getAllArticle()
    {
        $id = $_GET['id'];
        $pictures = [];
        $db = new Database();
        $pictures = $db->selectOne("SELECT *, 
        users.pseudo AS user_pseudo
        FROM picture 
        INNER JOIN users ON users.id = picture.id_user 
        WHERE picture.id = ?",[$id]);
        return $pictures;
    }
    
       //====USERPAGE===\\
       public static function getUserArticle($id)
       {
        $pictures = [];
        $db = new Database();
        $pictures = $db->selectAll("SELECT picture.*,
        users.pseudo AS user_pseudo, 
        photo.src AS photo_src ,
        users.src_photo AS user_photo,
        (SELECT COUNT(*) FROM likes WHERE likes.id_picture = picture.id) AS nbrLikes,
        (SELECT COUNT(*) FROM comment WHERE comment.id_picture = picture.id) AS nbrCom
        FROM picture 
        INNER JOIN users ON users.id = picture.id_user 
        INNER JOIN photo ON photo.id = users.id_photo
        WHERE picture.actif = 'oui' AND picture.id_user = ?
        ORDER BY picture.id DESC",[$id]);
        return $pictures;
       }
   
    //====ADMIN ADD====\\
    public static function insertPicture($src, $title, $description, $userId)
    {
        $db = new Database();
        $db->actionDB("INSERT INTO picture (src,title,description,id_user) VALUES(?,?,?,?)",[$src, $title, $description, $userId]);
        return true;
    }

    //====ADMIN DELETE====\\
    public static function deletePicture($actif, $id)
    {
        $db = new Database();
        $db->actionDB("UPDATE picture SET actif=? WHERE id = ?",[$actif, $id]);
        return true;
    }

    //====ADMIN LISTE====\\

    public static function getListAdmin()
    {
        $db = new Database();
        $pictures = $db->selectAll("SELECT *,
        picture.id AS picture_id ,
        users.pseudo AS user_pseudo
        FROM picture
        INNER JOIN users ON users.id = picture.id_user
        WHERE picture.actif = 'oui'
        ORDER BY picture_id DESC ");
        return $pictures;
    }

    public static function getListPublic($id)
    {
        $db = new Database();
        $pictures = $db->selectAll("SELECT *,picture.id AS picture_id FROM picture WHERE id_user=? AND actif= 'oui' ORDER BY picture_id DESC",[$id]);
        return $pictures;
    }

    //====ADMIN UPDATE====\\
    public static function getArticleUpdate($id)
    {
        $db = new Database();
        $picture = $db->selectOne("SELECT * FROM picture WHERE id = ?",[$id]);
        return $picture;
    }

    public static function updateArticle($new_title, $new_description, $updateDate, $id)
    {
        $db = new Database();
        $db->actionDB("UPDATE picture SET title=?, description=?, updated_at=? WHERE id = ?",[$new_title, $new_description, $updateDate, $id]);
        return true;
    }
}
