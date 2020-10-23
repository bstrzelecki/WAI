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
    public function getPhoto($id){
        $query = ["_id"=>$id];
        return $this->db->photos->findOne($query);
    }
}