<?php

class AdminModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_series;charset=utf8', 'root', '');
    }

    public function deleteSerieOrPlatformById($id, $choice) {


        if($choice == 'serie') {
            $query = $this->db->prepare("DELETE FROM serie WHERE id_serie = ?");
            $query->execute([$id]);
        }
        else if($choice == 'platform') {
            $query = $this->db->prepare("DELETE FROM platform WHERE id_platform = ?");
            $query->execute([$id]);
        }
     


    }



} 