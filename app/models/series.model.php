<?php

class SeriesModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_series;charset=utf8', 'root', '');
    }

    /**
     * Devuelve la lista de tareas completa.
     */
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

    public function getAllPlatforms() {
   


        $query = $this->db->prepare("SELECT * FROM platform");
        $query->execute();

        
        $platforms = $query->fetchAll(PDO::FETCH_OBJ); 
        
        return $platforms;
    }

    
    public function getAllSeriesWithPlatforms() {

        $query = $this->db->prepare("SELECT serie.*, platform.company as companies FROM serie JOIN platform ON serie.id_platform_fk = platform.id_platform");
        $query->execute();
        $serieandplatform = $query->fetchAll(PDO::FETCH_OBJ); 

    

        return $serieandplatform;
    }

    public function getSeriesByPlatforms($choice) {

        $query = $this->db->prepare("SELECT serie.*, platform.company as companies FROM serie JOIN platform ON serie.id_platform_fk = platform.id_platform WHERE platform.company = ?");
        $query->execute(array($choice));
        $serieandplatform = $query->fetchAll(PDO::FETCH_OBJ); 

    

        return $serieandplatform;
        
    } 


    public function addNewSerie($name, $genre, $choice) {
        $query = $this->db->prepare("SELECT serie.*, platform.company as companies FROM serie JOIN platform ON serie.id_platform_fk = platform.id_platform WHERE platform.company = ?");
        $query->execute(array($choice));
        $serieandplatform = $query->fetchAll(PDO::FETCH_OBJ); 


        $serieandplatform = $this->db->prepare("INSERT INTO serie (`name`,`genre`) VALUES (?, ?) WHERE platform.company = ?");
        $serieandplatform->execute([$name, $genre, $choice]);
    
    }
    
    
    public function addNewPlatform($company, $price) {
  
      
        $query = $this->db->prepare("INSERT INTO platform (`company`,`price`) VALUES (?, ?)");
        $query->execute([$company, $price]);
    
    }   


    public function deleteSerie($id) {
   
            $query = $this->db->prepare("DELETE FROM serie WHERE id_serie = ?");
            $query->execute([$id]);
     
    }

    public function deletePlatform($id) {
        
        $query = $this->db->prepare("DELETE FROM platform WHERE id_platform = ?");
        $query->execute([$id]);
    }

} 


    