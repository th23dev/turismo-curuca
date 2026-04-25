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

    public function criarLocal($dados)
    {
        $imagem_principal = $dados['imagem_principal'] ?? '';
        $nome = $dados['nome'] ?? '';
        $tipo = $dados['tipo'] ?? '';
        $numero = $dados['numero'] ?? '';
        $instagram = $dados['instagram'] ?? '';
        $linkInstagram = $dados['linkInstagram'] ?? '';
        $descricao = $dados['descricao'] ?? '';
        $possui_restaurante = $dados['restaurante'] ?? 'nao';

        return $this->model->criarLocal($imagem_principal, $nome, $tipo, $numero, $instagram, $linkInstagram, $descricao, $possui_restaurante);
    }

    public function excluirLugar($id){
        return $this->model->excluirLugar($id);
    }
}
