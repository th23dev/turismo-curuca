<?php 
class LugaresModel {
    private $db;

    public function __construct($conexao) {
        $this->db = $conexao;
    }

    public function buscarLugares($search = '', $tipo) {
        $sql = "SELECT * FROM lugares LEFT JOIN midias ON lugares.id = midias.lugar_id WHERE (lugares.nome LIKE :likeNome OR lugares.descricao LIKE :likeDescricao) AND lugares.tipo = :tipo";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':likeNome', "%{$search}%", PDO::PARAM_STR);
        $stmt->bindValue(':likeDescricao', "%{$search}%", PDO::PARAM_STR);
        $stmt->bindValue(':tipo', $tipo, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
