<?php 
class IgarapeModel {
    private $db;

    public function __construct($conexao) {
        $this->db = $conexao;
    }

    public function buscarIgarapes($search = '') {
        $sql = "SELECT * FROM lugares WHERE (nome LIKE ? OR descricao LIKE ?) AND tipo = 'igarape'";
        $stmt = $this->db->prepare($sql);
        $like = "%{$search}%";
        $stmt->execute([$like, $like]);
        return $stmt->fetchAll();
    }
}
?>

