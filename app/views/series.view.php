<?php

class SeriesView {

    
    private $smarty;

    public function __construct() {
        
        $this->smarty = new Smarty();
        $this->smarty->assign('basehref', BASE_URL);

        


    }

    function showHome($logged) { 
        
        //colocar en el header login o logout segun si se esta logeado o no.
        $this->smarty->assign('logged', $logged);

        $this->smarty->display('templates/home.tpl');   

    }

    function showAllSeries($series, $platforms, $logged) {

        
        $this->smarty->assign('titulo', 'Lista de Series');
        $this->smarty->assign('series', $series);
        $this->smarty->assign('platforms', $platforms);
        $this->smarty->assign('logged', $logged);

        
       $this->smarty->display('templates/showAllSeries.tpl');

        
    }

    function showAllPlatforms($platforms, $logged) {
        
        $this->smarty->assign('titulo', 'Lista de Plataformas - Streaming');
        $this->smarty->assign('platforms', $platforms);
        $this->smarty->assign('logged', $logged);


       $this->smarty->display('templates/showAllPlatforms.tpl');
        
    }

    function searchByPlatform($platforms, $logged) { 

        $this->smarty->assign('logged', $logged);
        $this->smarty->assign('platforms', $platforms);

       $this->smarty->display('templates/form_search.tpl');

    }

    function showSeriesByPlatform($series, $logged)  {

        $this->smarty->assign('logged', $logged);
        $this->smarty->assign('series', $series);

        $this->smarty->display('templates/showFiltredSeries.tpl');

    }

    function viewTask($series, $logged) {

        $this->smarty->assign('logged', $logged);


        $this->smarty->assign('series', $series);

        $this->smarty->display('templates/showSerieInfo.tpl');
    }

    function formUpdateSerie($id, $series, $platforms, $logged) {

        $this->smarty->assign('logged', $logged);


        $this->smarty->assign('id', $id);
           $this->smarty->assign('series', $series);
        $this->smarty->assign('platforms', $platforms);

       $this->smarty->display('templates/updateSerie.tpl');
    }

    function formUpdatePlatform($id, $series, $platforms, $logged) {

        $this->smarty->assign('logged', $logged);
        

        $this->smarty->assign('id', $id);
           $this->smarty->assign('series', $series);
        $this->smarty->assign('platforms', $platforms);

       $this->smarty->display('templates/updatePlatform.tpl');
    }

    function showErrorEmptyForm() {
        $this->smarty->assign('error', 'Datos vacios!');
        $this->smarty->display('templates/emptyError.tpl');

    }



}