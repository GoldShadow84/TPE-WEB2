<?php

require_once './app/views/admin.view.php';
require_once './app/models/admin.model.php';

class AdminController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new AdminModel();
        $this->view = new AdminView();
    }

    public function login() {

        $this->view->login();

    }

  

    

    public function updateSerie() {

    }

    public function updatePlatform() {

    }

    public function deleteSerie($id) {

        $choice = 'serie';
        $this->model->deleteSerieOrPlatformById($id, $choice);
        header("Location: ". BASE_URL);

    }

    public function deletePlatform($id) {
        $choice = 'platform';
        $this->model->deleteSerieOrPlatformById($id, $choice);
        header("Location: ". BASE_URL);
       
    }

    

} 