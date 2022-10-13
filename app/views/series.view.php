<?php

class SeriesView {

    
    private $smarty;

    public function __construct() {
        
        $this->smarty = new Smarty();
        $this->smarty->assign('basehref', BASE_URL);
    }

    //Ver home
    function showHome($logged) { 
        
        //colocar en el header login o logout segun si se esta logeado o no.
        $this->smarty->assign('logged', $logged);
        $this->smarty->display('templates/home.tpl');   
    }

    //mostrar lista series con plataformas entre parentesis
    function showAllSeries($series, $platforms, $logged) {

        $this->smarty->assign('series', $series);
        $this->smarty->assign('platforms', $platforms);
        $this->smarty->assign('logged', $logged);
       $this->smarty->display('templates/showAllSeries.tpl');
    }

    //ver una serie en concreto
    function viewSerie($series, $logged) {

        $this->smarty->assign('logged', $logged);
        $this->smarty->assign('series', $series);
        $this->smarty->display('templates/showSerieInfo.tpl');
    }

    //formulario para actualizar serie
    function formUpdateSerie($id, $series, $platforms, $logged) {

        $this->smarty->assign('logged', $logged);
        $this->smarty->assign('id', $id);
        $this->smarty->assign('series', $series);
        $this->smarty->assign('platforms', $platforms);
       $this->smarty->display('templates/updateSerie.tpl');
    }

    //mensaje de error si el formulario esta vacio
    function showErrorEmptyForm($logged) {

        $this->smarty->assign('logged', $logged);
        $this->smarty->assign('error', 'Datos vacios!');
        $this->smarty->display('templates/emptyError.tpl');
    }

}