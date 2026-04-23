<?php
include('../Controllers/protect.php');
?>


<!DOCTYPE html>
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
         <h1>Painel Administrativo</h1>
      </div>

      <div class="btn-box">
         <a href="../../public/index.php" class="btn-voltar">
            <i class="fas fa-chevron-left"></i>
         </a>
         <?php if (isset($_SESSION['nome'])): ?>
            <div id="user-name">Bem-vindo, <?php echo $_SESSION['nome']; ?>!</div>
            <a href="../Controllers/logout.php" class="btn-logout">
               <i class="fas fa-sign-out-alt"></i></a>
         <?php endif; ?>
      </div>
   </nav>

   <main style="min-height: 80dvh;">
   </main>

   <?php include 'components/footer.php'; ?>

</body>
<script src="../../public/js/script.js"></script>
<script src="../js/menu.js"></script>

</html>
