<?php
require_once './app/models/series.model.php';
require_once './app/views/series.view.php';



class SeriesController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new SeriesModel();
        $this->view = new SeriesView();
    }

    //ver pagina principal
    public function showHome() {
        
        $this->view->showHome();
    }

            //ver todas las series
    public function showAllSeries() {

        $series = $this->model->getAllSeriesWithPlatforms();

        $this->view->showAllSeries($series);
    }


        //ver todas las plataformas
    public function showAllPlatforms() {
        $platforms = $this->model->getAllPlatforms();

        $this->view->showAllPlatforms($platforms);
    }


        //select para elegir una plataforma y ver las series que contiene
    public function searchByPlatform() {
        $platforms = $this->model->getAllPlatforms();

        $this->view->searchByPlatform($platforms);
    }

    //ver series con la plataforma elegida con el select
    public function seriesFiltred() {

        if(isset($_POST['choice']) && !empty($_POST['choice'])) {
            $choice = $_POST['choice'];

            $list = $this->model->getSeriesByPlatforms($choice);
            $this->view->showSeriesByPlatform($list);
        }
    }   


        //ver en detalle una serie particular
    public function viewTask($id) {

        $series = $this->model->getSeriesById($id);
   
       $this->view->viewTask($series);

    }

    

}
