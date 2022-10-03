<?php

class SeriesView {

    
    private $smarty;

    public function __construct() {
        
        $this->smarty = new Smarty();
        $this->smarty->assign('basehref', BASE_URL);


    }

    function showHome() { 

        $this->smarty->display('templates/home.tpl');

    }

    function showAllSeries($series, $platforms) {

        
        $this->smarty->assign('titulo', 'Lista de Series');
        $this->smarty->assign('series', $series);
        $this->smarty->assign('platforms', $platforms);

        
       $this->smarty->display('templates/showAllSeries.tpl');
       $this->smarty->display('templates/form_serie.tpl');
        
    }

    function showAllPlatforms($platforms) {
        
        $this->smarty->assign('titulo', 'Lista de Plataformas - Streaming');
        $this->smarty->assign('platforms', $platforms);



       $this->smarty->display('templates/showAllPlatforms.tpl');
        
    }

    function searchByPlatform($platforms) { 

        $this->smarty->assign('platforms', $platforms);

       $this->smarty->display('templates/form_search.tpl');

    }

    function showSeriesByPlatform($series)  {
        $this->smarty->assign('series', $series);

        $this->smarty->display('templates/showFiltredSeries.tpl');

    }

    function viewTask($series) {
        $this->smarty->assign('series', $series);

        $this->smarty->display('templates/showSerieInfo.tpl');
    }





}