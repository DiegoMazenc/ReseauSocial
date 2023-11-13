<?php

require_once("./services/database.php");

class Users
{
    //====LOG====\\
    public static function usersList()
    {
        $db = new Database();
        $users =  $db->selectAll('SELECT * FROM users');
        return $users;
    }

    public static function userInfos($id)
    {
        $db = new Database();
        $users =  $db->selectOne('SELECT * FROM users WHERE id=?',[$id]);
        return $users;
    }


    //Inscription
    public static function inscription($firstname, $name, $pseudo, $gender, $mail, $hash)
    {
        $db = new Database();
        $db->actionDB('INSERT INTO users (firstname,name,pseudo,gender,mail,password) VALUES(?,?,?,?,?,?)',[$firstname, $name, $pseudo, $gender, $mail, $hash]);
        return true;
    }

    //Connexion
    public static function connexionPseudo($pseudo)
    {
        $db = connectDB();

        $sql = $db->prepare('SELECT * FROM users WHERE pseudo = ?');
        $sql->execute([$pseudo]);
        $user = $sql->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    //Photo USER
    public static function photoProfil($id)
    {
        $db = connectDB();
        $sql = $db->prepare("SELECT *, photo.src AS photo_src, users.pseudo AS user_pseudo, users.id AS user_id FROM users INNER JOIN photo ON photo.id = users.id_photo WHERE users.id=$id");
        $sql->execute();
        $photo = $sql->fetch(PDO::FETCH_ASSOC);
        return $photo;
    }

    //====SETTING====\\

    //charger info User
    public static function getUser($id)
    {
        $db = connectDB();
        $sql = $db->prepare("SELECT * FROM users WHERE id = $id ");
        $sql->execute();
        $user = $sql->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public static function updateUser($new_firstname, $new_name, $new_pseudo, $new_gender, $new_mail , $id)
    {
        $db = connectDB();
        $sql = $db->prepare("UPDATE users SET firstname=?, name=?, pseudo=?, gender=?, mail=? WHERE id = ?");
        $sql->execute(array($new_firstname, $new_name, $new_pseudo, $new_gender, $new_mail , $id));
        return true;
    }

    public static function updateAdmin($admin,$id)
    {
        $db = connectDB();
        $sql = $db->prepare("UPDATE users SET admin=? WHERE id =? ");
        $sql->execute([$admin,$id]);
        $user = $sql->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
}
