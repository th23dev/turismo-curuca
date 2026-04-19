<?php
require_once '../Core/conexao.php';
require_once '../Models/VideoModel.php';
class VideoController {
    private $model;

    public function __construct($conexao) {
        $this->model = new VideoModel($conexao);
    }

public function buscarVideos() {
        $search = isset($_POST['search']) ? $_POST['search'] : '';
        return $this->model->buscarVideos($search);
    }
}

?>