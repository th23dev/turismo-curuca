<?php
class AuthController
{
   public function login($db)
   {

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         $email = $_POST['email'] ?? '';
         $senha = $_POST['senha'] ?? '';

         if (empty($email)) {
            echo "Preencha seu e-mail";
         } else if (empty($senha)) {
            echo "Preencha sua senha";
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
               echo "Falha ao logar! E-mail ou senha incorretos";
            }
         }
      }
   }
}
?>


