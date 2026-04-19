<?php 
class PraiaModel {
    private $db;

    public function __construct($conexao) {
        $this->db = $conexao;
    }

    public function buscarPraias($search = '') {
        $searchEscapado = $this->db->real_escape_string($search);
$sql = "SELECT * FROM lugares WHERE (nome LIKE '%$searchEscapado%' OR descricao LIKE '%$searchEscapado%') AND tipo = 'praia'";

        return $this->db->query($sql);
    }
}
?>