<?php

class LoginModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_series;charset=utf8', 'root', '');
    }
    
    public function getByEmail($email) {
        $query = $this->db->prepare('SELECT * FROM users WHERE email = ?');
        $query->execute([$email]);

        return $query->fetch(PDO::FETCH_OBJ);
    }


} 