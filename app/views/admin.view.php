<?php

class AdminView {

    
    private $smarty;

    public function __construct() {
        
        $this->smarty = new Smarty();
        $this->smarty->assign('basehref', BASE_URL);


    }



    function login() {


        $this->smarty->assign('titulo', 'Ingresar');
        $this->smarty->display('templates/loginForm.tpl');

    }



    //ver todas las series
    function showAllSeries($series) {

        
        $this->smarty->assign('titulo', 'Lista de Series');
        $this->smarty->assign('series', $series);



       $this->smarty->display('templates/showAllSeries.tpl');
        
    }

    //ver todas las plataformas
    function showAllPlatforms($platforms) {
        
        $this->smarty->assign('titulo', 'Lista de Plataformas - Streaming');
        $this->smarty->assign('platforms', $platforms);



       $this->smarty->display('templates/showAllPlatforms.tpl');
        
    }

    //select para elegir una plataforma y ver las series que contiene

    function searchByPlatform($platforms) { 

        $this->smarty->assign('platforms', $platforms);

       $this->smarty->display('templates/form_search.tpl');

    }

    //ver series con la plataforma elegida con el select
    function showSeriesByPlatform($series)  {
        $this->smarty->assign('series', $series);

        $this->smarty->display('templates/showFiltredSeries.tpl');

    }

    //ver en detalle una serie particular
    function viewTask($series) {
        $this->smarty->assign('series', $series);

        $this->smarty->display('templates/showSerieInfo.tpl');
    }



}