<?php 
include '../Core/conexao.php';
$conexao = $pdo;
require_once '../Controllers/IgarapeController.php'; 
$controller = new IgarapeController($conexao);
$search = $_POST['search'] ?? $_GET['search'] ?? '';
$sql_query = $controller->buscarIgarapes($search);

$lugares = $sql_query;  // Already PDO::FETCH_ASSOC array
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Turismo Curuçá - Igarapés</title>
   <link rel="stylesheet" href="../../public/css/conexao.css">
</head>

<body>

   <nav class="back-nav">
      <div class="text-box">
         <h1>Igarapés</h1>
      </div>
      <div class="btn-box">
         <a href="menu.html" class="btn-voltar">
            <i class="fas fa-chevron-left"></i> Voltar
         </a>

         <form action="" method="post">
            <input type="search" name="search" id="search-input" placeholder="Buscar igarapés..." value="<?php echo htmlspecialchars($search ?? ''); ?>">
            <button type="submit"><i class="fas fa-search"></i></button>
         </form>

         <a href="../index.php" class="btn-voltar">
            Início <i class="fas fa-house"></i>
         </a>
      </div>
   </nav>

   <main>
      <section class="catalogo">
         <div class="cards-grid">
            <?php if (count($lugares) > 0): ?>
               <?php foreach ($lugares as $lugar): ?>
                  <div class="card" onclick="openModal('igarape-<?php echo $lugar['id']; ?>')">
                     <img src="<?php echo $lugar['imagem_principal']; ?>" alt="<?php echo $lugar['nome']; ?>">
                     <h3><?php echo $lugar['nome']; ?></h3>
                  </div>
               <?php endforeach; ?>
            <?php else: ?>
               <p style="padding:20px;">Nenhum igarape encontrado para "<strong><?php echo htmlspecialchars($search ?: 'nenhum termo'); ?></strong>".</p>
            <?php endif; ?>
         </div>
      </section>
   </main>

   <?php foreach ($lugares as $lugar): ?>
   <div id="modal-igarape-<?php echo $lugar['id']; ?>" class="modal">
      <div class="modal-box">
         <span class="close" onclick="closeModal('igarape-<?php echo $lugar['id']; ?>')">&times;</span>
         <div class="image-carousel">
            <div class="carousel-images">
               <div class="carousel-image" style="background-image: url('<?php echo $lugar['imagem_principal']; ?>');"></div>
            </div>
            <button class="carousel-btn prev" onclick="prevImage('igarape-<?php echo $lugar['id']; ?>')">&10094;</button>
            <button class="carousel-btn next" onclick="nextImage('igarape-<?php echo $lugar['id']; ?>')">&10095;</button>
            <div class="carousel-indicators">
            </div>
         </div>
         <div class="text-box">
            <h2><?php echo $lugar['nome']; ?></h2>
            <p><?php echo $lugar['descricao']; ?></p>
            <div class="info-tags">
               <span class="tag"><i class="fas fa-phone"></i><?php echo $lugar['numero']; ?></span>
               <?php if (!empty($lugar['instagram'])): ?>
               <a class="tag insta" href="https://www.instagram.com/<?php echo $lugar['instagram']; ?>/" target="_blank">
                  <i class="fab fa-instagram"></i>@<?php echo $lugar['instagram']; ?>
               </a>
               <?php endif; ?>
               <?php if ($lugar['possui_restaurante']): ?>
               <span class="tag"><i class="fas fa-utensils"></i>Restaurante</span>
               <?php endif; ?>
            </div>
         </div>
      </div>
   </div>
   <?php endforeach; ?>

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
<script src="../../public/js/script.js"></script>
<script src="../../public/js/catalogo.js"></script>

</html>
