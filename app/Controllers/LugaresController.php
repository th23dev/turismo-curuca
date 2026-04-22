<?php
require_once '../Models/LugaresModel.php';
class LugaresController {
    private $model;
    private $tipo;

    public function __construct($conexao, $tipo) {
        $this->model = new LugaresModel($conexao);
        $this->tipo = $tipo;
    }

public function buscarLugares() {
        $search = isset($_POST['search']) ? $_POST['search'] : '';
        return $this->model->buscarLugares($search, $this->tipo);
    }
}

