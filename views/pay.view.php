<?php

class TaskView {

    
    private $smarty;

    public function __construct() {
        
        $this->smarty = new Smarty();
        $this->smarty->assign('basehref', BASE_URL);


    }

    function showPayments($pagos) {
        
        $this->smarty->assign('titulo', 'Tabla de Pagos');
        $this->smarty->assign('pagos', $pagos);

        $this->smarty->display('templates/showPayments.tpl');
    }
}