<?php
require_once './app/models/platforms.model.php';
require_once './app/models/series.model.php';
require_once './app/views/platforms.view.php';
require_once './helpers/auth.helper.php';



class PlatformsController {
    private $model;
    private $seriesModel;
    private $view;
    private $authHelper;


    public function __construct() {
        $this->authHelper = new AuthHelper();
        $this->model = new PlatformsModel();
        $this->seriesModel = new SeriesModel();
        

        $this->view = new PlatformsView();
    }

    //redirecciones
    public function showHomeLocation() {
    header("Location: ". BASE_URL."home");
    }

    public function showSeriesLocation() {
        header("Location: ". BASE_URL."series");
    }

    public function showPlatformsLocation() {
        header("Location: ". BASE_URL."platforms");
    }

     //funciones ver, filtrar, añadir, eliminar, actualizar

      //ver pagina principal
      public function showHome() {

    //si esta logeado se ve logout, si no lo está se ve login en el header
        $logged = $this->authHelper->checkLoggedIn();

        $this->view->showHome($logged);
    }

    //ver todas las plataformas
    public function showAllPlatforms() {
        $platforms = $this->model->getAllPlatforms();

    //si esta logeado se ve logout, si no lo está se ve login en el header
        $logged = $this->authHelper->checkLoggedIn();

        $this->view->showAllPlatforms($platforms, $logged);
    }

    //select para ver las series filtradas por plataforma
    public function searchByPlatform() {
        //si esta logeado se ve logout, si no lo está se ve login en el header
        $logged = $this->authHelper->checkLoggedIn();


        $platforms = $this->model->getAllPlatforms();

        $this->view->searchByPlatform($platforms, $logged);
    }

    //ver series con la plataforma elegida con el select
    public function seriesFiltred() {

        if(isset($_POST['choice']) && !empty($_POST['choice'])) {
            $choice = $_POST['choice'];

            //si esta logeado se ve logout, si no lo está se ve login en el header
            $logged = $this->authHelper->checkLoggedIn();

            $list = $this->model->getSeriesByPlatforms($choice);
            $this->view->showSeriesByPlatform($list, $logged);
        }
    }   

    //añadir nueva plataforma
    public function addNewPlatform() {

        if(isset($_POST['company']) && !empty($_POST['company'])&&isset($_POST['price'])) {
            $company = $_POST['company'];
            $price = $_POST['price'];

            $this->model->addNewPlatform($company, $price);

            $this->showPlatformsLocation();
        }
        else {
            $logged = $this->authHelper->checkLoggedIn();
            $this->view->showErrorEmptyForm($logged);
        }
    }

    //borrar una plataforma (no debe estar vinculada con ninguna serie)
    public function deletePlatform($id) {

        $this->model->deletePlatform($id);
        
        $this->showPlatformsLocation();

    }

    //ir al formulario para actualizar una  plataforma

    public function updatePlatform($id) {

        $logged = $this->authHelper->checkLoggedIn();

        $series = $this->seriesModel->getAllSeries();
        $platforms = $this->model->getAllPlatforms();
        
        $this->view->formUpdatePlatform($id, $series, $platforms, $logged);
    }

    //realizamos el update sql en la base de datos
    public function confirmUpdatePlatform() {

        
        if(isset($_POST['id']) && !empty($_POST['id'])&&isset($_POST['company']) && !empty($_POST['company'])&&isset($_POST['price']) && !empty($_POST['price'])) {

            $id = $_POST['id'];
            $company = $_POST['company'];
            $price = $_POST['price'];   
           

            $this->model->updatePlatform($id, $company, $price);
 
            $this->showPlatformsLocation();

        }
        else {

        $logged = $this->authHelper->checkLoggedIn();
        $this->view->showErrorEmptyForm($logged);
        
        }
    }




}    