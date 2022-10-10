<?php

class LoginView {

    
    private $smarty;

    public function __construct() {
        
        $this->smarty = new Smarty();
        $this->smarty->assign('basehref', BASE_URL);


    }

    //ver seccion login-formulario login
    public function showLogin($logged, $error = null) {

        $this->smarty->assign('logged', $logged);
        $this->smarty->assign('error', $error);
        $this->smarty->assign('titulo', 'Iniciar Sesión');
        $this->smarty->display('templates/loginForm.tpl');
    }



}