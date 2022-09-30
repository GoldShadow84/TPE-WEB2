<?php

class TaskModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=practico3;charset=utf8', 'root', '');
    }

    /**
     * Devuelve la lista de tareas completa.
     */
    public function getAllPayments() {
        // 1. abro conexión a la DB
        // ya esta abierta por el constructor de la clase

        // 2. ejecuto la sentencia (2 subpasos)
        $query = $this->db->prepare("SELECT * FROM pagos");
        $query->execute();

        // 3. obtengo los resultados
        $payments = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        
        return $payments;
    }

    /**
     * Inserta una tarea en la base de datos.
     */
    public function insertPayment($deudor, $cuota, $cuota_capital, $fecha_pago) {

       /* echo "<p>sdsaddsadasdasdasdsdssd</p>";
        var_dump($deudor);
        var_dump($cuota);
        var_dump($cuota_capital);
        var_dump($fecha_pago); */

        $query = $this->db->prepare("INSERT INTO pagos (deudor, cuota, cuota_capital, fecha_pago) VALUES (?, ?, ?, ?)");
        //var_dump($query);
        $query->execute([$deudor, $cuota, $cuota_capital, $fecha_pago]);




        return $this->db->lastInsertId();
    }


    /**
     * Elimina una tarea dado su id.
     */
    function deletePaymentById($id) {
        $query = $this->db->prepare('DELETE FROM pagos WHERE id = ?');
        $query->execute([$id]);
    }

}
