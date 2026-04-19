<?php
require_once '../Core/conexao.php';
require_once '../Models/PraiaModel.php';
class PraiaController {
    private $model;

    public function __construct($conexao) {
        $this->model = new PraiaModel($conexao);
    }

public function buscarPraias() {
        $search = isset($_POST['search']) ? $_POST['search'] : '';
        return $this->model->buscarPraias($search);
    }
}

?>