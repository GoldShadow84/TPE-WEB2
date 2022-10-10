<?php

class PlatformsModel {

    private $db;

    //abrimos conexion con la base de datos db_series
    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_series;charset=utf8', 'root', '');
    }

     //obtener todas las plataformas
     public function getAllPlatforms() {
   
        $query = $this->db->prepare("SELECT * FROM platform");
        $query->execute();

        $platforms = $query->fetchAll(PDO::FETCH_OBJ); 
        
        return $platforms;
    }

    
    //obtener todas las series junto a las compañias/plataformas a las que estan vinculadas
    public function getAllSeriesWithPlatforms() {

        $query = $this->db->prepare("SELECT serie.*, platform.company as companies FROM serie JOIN platform ON serie.id_platform_fk = platform.id_platform");
        $query->execute();
        $serieandplatform = $query->fetchAll(PDO::FETCH_OBJ); 

        return $serieandplatform;
    }

    //traer solo las series que esten vinculadas a cierta plataforma
    public function getSeriesByPlatforms($choice) {

        $query = $this->db->prepare("SELECT serie.*, platform.company as companies FROM serie JOIN platform ON serie.id_platform_fk = platform.id_platform WHERE platform.company = ?");
        $query->execute(array($choice));
        $serieandplatform = $query->fetchAll(PDO::FETCH_OBJ); 

        return $serieandplatform;
    } 

    //añadir nueva plataforma
    public function addNewPlatform($company, $price) {
  
        $query = $this->db->prepare("INSERT INTO platform (company, price) VALUES (?, ?)");
        $query->execute([$company, $price]);
    } 
    
    //borrar una plataforma segun su id
    public function deletePlatform($id) {

        $confirm = true;
        
        $query = $this->db->prepare("DELETE FROM platform WHERE id_platform = ?");
        try {
            $query->execute([$id]);
        }
        catch(PDOException $e){
            $confirm = false;
        }
        
        return $confirm;
    }

     //actualizar una plataforma segun su id
     public function updatePlatform($id, $company, $price) {

        $query = $this->db->prepare('UPDATE platform SET company = ?, price = ? WHERE id_platform = ?');

        $query->execute([$company, $price, $id]);
    }



}   