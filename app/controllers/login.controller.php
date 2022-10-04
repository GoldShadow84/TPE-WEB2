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

        //si esta logeado se ve login en el head, si no lo está, se ve logout.
        $logged = $this->authHelper->checkLoggedIn();
        $this->view->showLogin($logged);

    }

    public function verifyLogin() {

            $email = $_POST['email'];
            $password = $_POST['password'];

    
            $user = $this->model->getByEmail($email);

            if (!empty($user) && password_verify($password, $user->password)) {


                $this->authHelper->login($user);
                $this->showHomeLocation();
    
                
            } else {
                $this->view->showLogin("Login incorrecto");
            }
            
        }

        public function logout() {
            $this->authHelper->logout();
            header('Location: ' . LOGIN);
        }    


        public function showHomeLocation() {
            header("Location: ". BASE_URL."home");
        }
    
            
  

    


    

} 