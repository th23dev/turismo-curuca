<?php
require_once '../Models/LugaresModel.php';
class LugaresController
{
    private $model;
    private $tipo;

    public function __construct($conexao)
    {
        $this->model = new LugaresModel($conexao);
    }

    public function buscarLugares($tipo)
    {
        $search = isset($_POST['search']) ? $_POST['search'] : '';
        return $this->model->buscarLugares($search, $tipo);
    }

    public function buscarTodosOsLugares()
    {
        return $this->model->buscarTodosOsLugares();
    }

    public function buscarLugar($id)
    {
        return $this->model->buscarLugar($id);
    }
}
