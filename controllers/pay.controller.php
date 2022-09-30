<?php
require_once './models/pay.model.php';
require_once './views/pay.view.php';

class PayController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new TaskModel();
        $this->view = new TaskView();
    }

    public function showPayments() {
        $pagos = $this->model->getAllPayments();
        $this->view->showPayments($pagos);
    }

    
    function etc() {
        // TODO: validar entrada de datos
        
        $deudor = $_POST['deudor'];
        $cuota = $_POST['cuota'];
        $cuota_capital = $_POST['cuota_capital'];
        $fecha_pago = $_POST['fecha_pago'];

        $id = $this->model->insertPayment($deudor, $cuota, $cuota_capital, $fecha_pago);

        //echo "<p>sdsaddsadasdasd</p>";
        header("Location: " . BASE_URL); 
    }
   
    function deletePayment($id) {
        $this->model->deletePaymentById($id);
        header("Location: " . BASE_URL);
    }

}
