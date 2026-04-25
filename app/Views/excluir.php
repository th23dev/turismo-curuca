<?php
include('../Core/conexao.php');
include('../Controllers/protect.php');
include('../Controllers/LugaresController.php');

$controller = new LugaresController($pdo);

$id = isset($_GET['id']) ? $_GET['id'] : null;
$lugar = null;
$mensagem = '';

if ($id) {
   $lugar = $controller->excluirLugar($id);
   header('location: admin.php');
}

if (!$lugar && $id) {
    echo "Lugar não encontrado!";
    exit;
}