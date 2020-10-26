<?php
require_once "../vendor/autoload.php";

class MongoDatabaseAdapter
{
    protected $db;
    public function __construct()
    {
        $client = new MongoDB\Client("mongodb://localhost:27017");
        $this->db = $client->wai;
    }
    public function pushPhoto($id, $title, $author){
        $entry = ["_id"=>$id, "title"=>$title, "author"=>$author];
        $this->db->photos->insertOne($entry);
    }
    public function pushPrivatePhoto($id, $title, $author, $visibleBy){
        $entry = ["_id"=>$id, "title"=>$title, "author"=>$author, "visibleBy" => $visibleBy];
        $this->db->photos->insertOne($entry);
    }
    public function getPhoto($id){
        $query = ["_id"=>$id];
        return $this->db->photos->findOne($query);
    }
    public function isLoginAvailable($login){
        $query = ["login"=>$login];
        return $this->db->users->findOne($query) == null;
    }
    public function addUser($login, $email, $password){
        $query = ["login"=>$login, "email"=>$email, "password"=>password_hash($password, PASSWORD_DEFAULT)];
        $this->db->users->insertOne($query);
    }
    public function getSessionKey($login, $password){
        $query = ["login"=>$login];

        $entry = $this->db->users->findOne($query);
        if($entry == null)
            return null;
        if(password_verify($password, $entry["password"])){
            return $entry["_id"];
        }else{
            return null;
        }
    }
    public function getUserLogin($key){
        $query = ["_id" =>$key];
        return $this->db->users->findOne($query)["login"];
    }
}