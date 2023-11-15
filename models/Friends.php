<?php
require_once("./services/database.php");
require_once("./services/class/Database.php");

class Friends
{
//====PAGE USER====\\

    //Follow un utilisateur
    public static function insertFriend($id_user, $id_follow)
    {
        $db = new Database();
        $db->actionDB('INSERT INTO friends (id_user,id_follow) VALUES(?,?)',[$id_user , $id_follow]);
    }

    //Unfollow un utilisateur
    public static function deleteFriend($id_sender, $id_receiver)
    {
        $db = new Database();
        $db->actionDB('DELETE from friends WHERE id_user=? AND id_follow=?',[$id_sender , $id_receiver]);
    }
    //Récupérer la liste de follower
    public static function getAllFriends($id_user, $id)
    {
        $db = new Database();
        $friends = $db->selectOne("SELECT * FROM friends WHERE id_user =? AND id_follow=? ", [$id_user, $id]);
        return $friends;
   
    }

}