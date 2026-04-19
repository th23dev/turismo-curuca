<?php 
class IgarapeModel {
    private $db;

    public function __construct($conexao) {
        $this->db = $conexao;
    }

    public function buscarIgarapes($search = '') {
        $searchEscapado = $this->db->real_escape_string($search);
        $sql = "SELECT * FROM lugares WHERE (nome LIKE '%$searchEscapado%' OR descricao LIKE '%$searchEscapado%') AND tipo = 'igarape'";
        return $this->db->query($sql);
    }
}
?>

