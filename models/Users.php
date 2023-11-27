<?php

require_once("./services/class/Database.php");
$db = new Database();
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

    public static function cntMail($mail)
{
    $db = connectDB();
    $sql = $db->prepare("SELECT * FROM users WHERE mail = :mail");
    $sql->bindParam(':mail', $mail);
    $sql->execute();
    $nbrMail = $sql->rowCount();
    return $nbrMail;
}

public static function cntPseudo($pseudo)
{
    $db = connectDB();
    $sql = $db->prepare("SELECT * FROM users WHERE pseudo = :pseudo");
    $sql->bindParam(':pseudo', $pseudo);
    $sql->execute();
    $nbrPseudo = $sql->rowCount();
    return $nbrPseudo;
}

    //Connexion
    public static function connexionPseudo($pseudo)
    {
        $db = new Database();
        $user = $db->selectOne('SELECT * FROM users WHERE pseudo = ?',[$pseudo]);
        return $user;
    }

    //Photo USER
    public static function photoProfil($id)
    {
        $db = new Database();
        $photo = $db->selectAll('SELECT *, photo.src AS photo_src, users.pseudo AS user_pseudo, users.id AS user_id FROM users INNER JOIN photo ON photo.id = users.id_photo WHERE users.id=?',[$id]);
        return $photo;
    }

    //====SETTING====\\

    //charger info User
    public static function getUser($id)
    {
        $db = new Database();
        $user = $db->selectAll('SELECT * FROM users WHERE id = ? ',[$id]);
        return $user;
    }

    public static function updateUser($new_firstname, $new_name, $new_pseudo, $new_gender, $new_mail , $id)
    {
        $db = new Database();
        $db->actionDB("UPDATE users SET firstname=?, name=?, pseudo=?, gender=?, mail=? WHERE id = ?",[$new_firstname, $new_name, $new_pseudo, $new_gender, $new_mail , $id]);
        return true;
    }

    public static function updateAdmin($admin,$id)
    {
        $db = new Database();
        $db->actionDB("UPDATE users SET admin=? WHERE id =? ",[$admin,$id]);
        return true;
    }
}
