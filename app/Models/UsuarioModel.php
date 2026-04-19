<?php
class UsuarioModel {
    private $db;

    public function __construct($conexao) {
        $this->db = $conexao;
    }

    public function buscarPorEmailESenha($email, $senha) {
        $emailEscapado = $this->db->real_escape_string($email);
        $senhaEscapada = $this->db->real_escape_string($senha);

        $sql = "SELECT * FROM usuarios WHERE email = '$emailEscapado' AND senha = '$senhaEscapada'";
        $query = $this->db->query($sql);
        
        return ($query->num_rows == 1) ? $query->fetch_assoc() : false;
    }
}