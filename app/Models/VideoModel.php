<?php 
class VideoModel {
    private $db;

    public function __construct($conexao) {
        $this->db = $conexao;
    }

    public function buscarVideos($search = '') {
        $searchEscapado = $this->db->real_escape_string($search);
        $sql = "SELECT * FROM videos WHERE titulo LIKE '%$searchEscapado%' OR descricao LIKE '%$searchEscapado%'";
        return $this->db->query($sql);
    }
}
?>