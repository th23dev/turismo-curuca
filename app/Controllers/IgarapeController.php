<?php
require_once '../Core/conexao.php';
require_once '../Models/IgarapeModel.php';
class IgarapeController {
    private $model;

    public function __construct($conexao) {
        $this->model = new IgarapeModel($conexao);
    }

    public function buscarIgarapes($search = '') {
        return $this->model->buscarIgarapes($search);
    }
}
?>

