<?php 
class HotelModel {
    private $db;

    public function __construct($conexao) {
        $this->db = $conexao;
    }

    public function buscarHoteis($search = '') {
        $sql = "SELECT * FROM lugares WHERE (nome LIKE ? OR descricao LIKE ?) AND tipo = 'hotel'";
        $stmt = $this->db->prepare($sql);
        $like = "%{$search}%";
        $stmt->execute([$like, $like]);
        return $stmt->fetchAll();
    }
}
?>

