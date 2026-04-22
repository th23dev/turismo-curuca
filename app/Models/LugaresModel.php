<?php 
class LugaresModel {
    private $db;

    public function __construct($conexao) {
        $this->db = $conexao;
    }

    public function buscarLugares($search = '', $tipo) {
        $sql = "SELECT * FROM lugares WHERE (nome LIKE :likeNome OR descricao LIKE :likeDescricao) AND tipo = :tipo";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':likeNome', "%{$search}%", PDO::PARAM_STR);
        $stmt->bindValue(':likeDescricao', "%{$search}%", PDO::PARAM_STR);
        $stmt->bindValue(':tipo', $tipo, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
