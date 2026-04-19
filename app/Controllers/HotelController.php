<?php
require_once '../Core/conexao.php';
require_once '../Models/HotelModel.php';
class HotelController {
    private $model;

    public function __construct($conexao) {
        $this->model = new HotelModel($conexao);
    }

public function buscarHoteis() {
        $search = isset($_POST['search']) ? $_POST['search'] : '';
        return $this->model->buscarHoteis($search);
    }
}

?>