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

   <footer>
      <div class="footer-logos">
         <a href="https://www.sebrae.com.br/" target="_blank"><img src="../../public/imgs/logos-bg/logo-sebrae.webp" alt="sebrae"></a>
         <a href="https://www.cidadeempreendedora.com.br/" target="_blank"><img src="../../public/imgs/logos-bg/logo-cidade-empreendedora.webp" alt="cidade empreendedora"></a>
         <a href="https://www.instagram.com/mturismo/" target="_blank"><img src="../../public/imgs/logos-bg/logo-sec-turismo.webp" alt="secretaria de turismo Curuçá"></a>
         <a href="https://www.instagram.com/prefeituracuruca/" target="_blank"><img src="../../public/imgs/logos-bg/logo-prefeitura-curuca.webp" alt="prefeitura de Curuçá"></a>
      </div>
      <div class="social-links">
         <p>Siga-nos: @turismocuruca.oficial</p>
      </div>
      <hr style="border: 0.5px solid #444; margin-bottom: 20px;">
      <p>&copy; 2026 - Prefeitura Municipal de Curuçá - Todos os direitos reservados.</p>
      <p>Desenvolvedor - <a href="https://github.com/th23dev" target="_blank">Th23dev</a> - <a href="https://instagram.com/th23_dev" target="_blank">@th23_dev</a></p>
   </footer>

</body>
<script src="../js/script.js"></script>
<script src="../js/menu.js"></script>

</html>
