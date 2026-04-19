<?php
class AuthController
{
   public function login($db)
   {
      $erro = "";

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         $email = $_POST['email'] ?? '';
         $senha = $_POST['senha'] ?? '';

         if (empty($email)) {
            $erro = "Preencha seu e-mail";
         } else if (empty($senha)) {
            $erro = "Preencha sua senha";
         } else {
            $model = new UsuarioModel($db);
            $usuario = $model->buscarPorEmailESenha($email, $senha);

            if ($usuario) {
               if (!isset($_SESSION)) session_start();
               $_SESSION['id'] = $usuario['id'];
               $_SESSION['nome'] = $usuario['nome'];
               header("Location: admin.php");
               exit();
            } else {
               $erro = "Falha ao logar! E-mail ou senha incorretos";
            }
         }
      }
      // Carrega a visão e passa o erro se houver
      include '../app/Views/login.php';
   }
}
?>


