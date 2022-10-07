<?php
require_once './app/models/series.model.php';
require_once './app/models/platforms.model.php';
require_once './app/views/series.view.php';
require_once './helpers/auth.helper.php';



class SeriesController {
    private $model;
    private $view;
    private $authHelper;
    private $platforms;


    public function __construct() {
        $this->authHelper = new AuthHelper();

        $this->model = new SeriesModel();
        $this->view = new SeriesView();

        $this->platforms = new PlatformsModel();
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
        $logged = $this->authHelper->isLogged();

        $this->view->showHome($logged);
        var_dump($logged);
    }

        //ver todas las series
    public function showAllSeries() {
        
        //se traen todas las series junto a la plataforma a la que pertenecen
        $series = $this->platforms->getAllSeriesWithPlatforms();
        $platforms = $this->platforms->getAllPlatforms();

        //si esta logeado se ve logout, si no lo está se ve login en el header
        $logged = $this->authHelper->isLogged();

        //pasamos plataformas/series para poder elegirlas en el formulario de nuevas series
        $this->view->showAllSeries($series, $platforms, $logged);
    }

    //ver en detalle una serie particular
    public function viewSerie($id) {

        $logged = $this->authHelper->isLogged();


        $series = $this->model->getSeriesById($id);
   

       $this->view->viewSerie($series, $logged);

    }

    //añadir nueva serie
    public function addNewSerie() {

        $this->authHelper->checkLoggedIn();

        if(isset($_POST['name']) && !empty($_POST['name'])&&isset($_POST['genre']) && !empty($_POST['genre'])&&isset($_POST['choice']) && !empty($_POST['choice']) ) {   
            $name = $_POST['name'];
            $genre = $_POST['genre'];
            $choice = $_POST['choice'];

            $agregar = true;

           if($agregar) {
                if($_FILES['input_name']['type'] == "image/jpg" || $_FILES['input_name']['type'] == "image/jpeg" || $_FILES['input_name']['type'] == "image/png") {
                    $this->model->addNewSerie($name, $genre, $choice, $_FILES['input_name']);       
                }
                else {
                    $this->model->addNewSerie($name, $genre, $choice);       
                }
            }
              

           $this->showSeriesLocation();

        }   
        else {
            $logged = $this->authHelper->isLogged();
            $this->view->showErrorEmptyForm($logged);
        }
    
    }

    //borrar una serie
    public function deleteSerie($id) {

        $this->authHelper->checkLoggedIn();

            $this->model->deleteSerie($id);
            
            $this->showSeriesLocation();

    }

    //ir al formulario para actualizar una serie
    public function updateSerie($id) {

        $this->authHelper->checkLoggedIn();

        $logged = $this->authHelper->isLogged();

        $series = $this->model->getAllSeries();
        $platforms = $this->platforms->getAllPlatforms();
        
        $this->view->formUpdateSerie($id, $series, $platforms, $logged);
    }

    //realizamos el update sql en la base de datos
    public function confirmUpdateSerie() {

        $this->authHelper->checkLoggedIn();

        if(isset($_POST['id']) && !empty($_POST['id'])&&isset($_POST['name']) && !empty($_POST['name'])&&isset($_POST['genre']) && !empty($_POST['genre'])&&isset($_POST['choice']) && !empty($_POST['choice'])) {

            $id = $_POST['id'];
            $name = $_POST['name'];
            $genre = $_POST['genre'];
            $choice = $_POST['choice'];

            $agregar = true;

           if($agregar) {
            if($_FILES['input_name']['type'] == "image/jpg" || $_FILES['input_name']['type'] == "image/jpeg" || $_FILES['input_name']['type'] == "image/png") {
                $this->model->updateSerie($id, $name, $genre, $choice, $_FILES['input_name']);       
            }
            else {
                $this->model->updateSerie($id, $name, $genre, $choice);       
            }
        }

            $this->showSeriesLocation();

        }
        else {
             $logged = $this->authHelper->isLogged();
            $this->view->showErrorEmptyForm($logged);
        }   
  
    }

}
