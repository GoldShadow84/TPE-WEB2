<?php

require_once './app/views/login.view.php';
require_once './app/models/login.model.php';
require_once './helpers/auth.helper.php';

class LoginController {
    private $model;
    private $view;
    private $authHelper;

    public function __construct() {
        $this->model = new LoginModel();
        $this->view = new LoginView();
        $this->authHelper = new AuthHelper();
    }

    public function showLogin() {

        $this->view->showLogin();

    }

    public function verifyLogin() {

            $email = $_POST['email'];
            $password = $_POST['password'];

        
            //$hash = password_hash($password, PASSWORD_DEFAULT);
           

            $user = $this->model->getByEmail($email);

            if (!empty($user) && password_verify($password, $user->password)) {


                $this->authHelper->login($user);
    
                header('Location: ver');
            } else {
                $this->view->showLogin("Login incorrecto");
            }



            /*
            Obtener el $password del formulario que envía el usuario
Obtener el $hash de la base de datos

if (password_verify($password, $hash))
     Credenciales válidas
else
     Credenciales invalidas


            */
        }

            
  

    


    

} 