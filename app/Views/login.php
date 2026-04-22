<?php 
include '../Core/conexao.php';
session_start();
$pdo;  // Available globally

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   require_once '../Controllers/AuthController.php'; 
   require_once '../Models/UsuarioModel.php';
   $controller = new AuthController();
   $controller->login($pdo);
} ?>
?>

<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Turismo Curuçá - Portal</title>
   <link rel="stylesheet" href="../../public/css/conexao.css">
</head>

<body>
   <nav class="back-nav">
      <div class="text-box">
         <h1>Login</h1>
      </div>
      <div class="btn-box">
         <a href="../../public/index.php" class="btn-voltar">
            <i class="fas fa-chevron-left"></i> Voltar
         </a>
      </div>
   </nav>

   <main>
      <section id="login-section">
         <?php if (!empty($erro)) echo "<p style='color:red'>$erro</p>"; ?>

         <form action="" method="post">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required><br><br>

            <button type="submit">Entrar</button>
         </form>
      </section>
   </main>

   <?php include 'components/footer.php'; ?>

</body>

</html>
