<?php
class UsuarioModel {
    private $db;

    public function __construct($conexao) {
        $this->db = $conexao;
    }

    public function buscarPorEmailESenha($email, $senha) {
        $sql = "SELECT * FROM usuarios WHERE email = ? AND senha = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$email, $senha]);
        $user = $stmt->fetch();
        return $user ?: false;
    }
}
?>
