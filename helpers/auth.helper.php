<?php



class AuthHelper {



    public function __construct() {

      

    }


    public function login($user) {
        // INICIO LA SESSION Y LOGUEO AL USUARIO
        session_start();
        $_SESSION['ID_USER'] = $user->id_users;
        $_SESSION['USERNAME'] = $user->email;
    }

    public function logout() {
        session_start();
        session_destroy();

    }

    public function checkLoggedIn() {
       session_start();
        if (!isset($_SESSION['ID_USER'])) {
            $logged = false;
        }
        else {
            $logged = true;
           /* //desloguear con timeout tras 10 minutos
            if(time() - $_SESSION['LAST_ACTIVITY'] > 10) {
                header("Location: " .LOGOUT);
                die();
            }
            $_SESSION['LAST_ACTIVITY'] = time(); 
        */
        }       

        return $logged;
    }

     /*public function getLoggedUserName() {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
           
        }

        return $_SESSION['USERNAME'];
    }

    */
    

    

 }    