<?php 
class HotelModel {
    private $db;

    public function __construct($conexao) {
        $this->db = $conexao;
    }

    public function buscarHoteis($search = '') {
        $searchEscapado = $this->db->real_escape_string($search);
        $sql = "SELECT * FROM lugares WHERE (nome LIKE '%$searchEscapado%' OR descricao LIKE '%$searchEscapado%') AND tipo = 'hotel'";
        return $this->db->query($sql);
    }
}
?>

