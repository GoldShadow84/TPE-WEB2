<?php

class SeriesModel {

    private $db;

    //abrimos conexion con la base de datos db_series
    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_series;charset=utf8', 'root', '');
    }

    //devuelve lista de series completa
    public function getAllSeries() {
        // 1. abro conexión a la DB
        // ya esta abierta por el constructor de la clase

        // 2. ejecuto la sentencia (2 subpasos)
        $query = $this->db->prepare("SELECT * FROM serie");
        $query->execute();

        // 3. obtengo los resultados
        $series = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        
        return $series;
    }

    //obtener informacion de una serie en particular, segun su id
    public function getSeriesById($id) {
        // 1. abro conexión a la DB
        // ya esta abierta por el constructor de la clase

        // 2. ejecuto la sentencia (2 subpasos)

        $query = $this->db->prepare("SELECT * FROM serie WHERE id_serie = ?");
        $query->execute(array($id));

        // 3. obtengo los resultados
        $series = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        
        return $series;
    }

    //añadir una nueva serie
    public function addNewSerie($name, $genre, $choice, $imagen = null) {

        $pathImg = null;

        if($imagen) 
            $pathImg = $this->uploadImageSerie($imagen);
        

        $query = $this->db->prepare('INSERT INTO serie (name, genre, id_platform_fk, image) VALUES(?,?,?,?)');
        
        $query->execute([$name, $genre, $choice, $pathImg]);
    }

    private function uploadImageSerie($imagen) {
        $target = "img/series" . uniqid() . "." . strtolower(pathinfo($imagen['name'], PATHINFO_EXTENSION));  
        move_uploaded_file($imagen['tmp_name'], $target);
        return $target;
    }
 
    //borrar una serie segun su id
    public function deleteSerie($id) {
   
            $query = $this->db->prepare("DELETE FROM serie WHERE id_serie = ?");
            $query->execute([$id]);
    }

    //actualizar una serie segun su id
    public function updateSerie($id, $name, $genre, $choice, $imagen = null) {

        $pathImg = null;

        if($imagen) 
        $pathImg = $this->uploadImageSerie($imagen);

        $query = $this->db->prepare('UPDATE serie SET name = ?, genre = ?, image = ?, id_platform_fk = ? WHERE id_serie = ?');

        $query->execute([$name, $genre, $pathImg, $choice, $id]);
    }

} 


    