<?php 
include '../Core/conexao.php';
require_once '../Controllers/LugaresController.php'; 

$controller = new LugaresController($pdo);
$search = $_POST['search'] ?? $_GET['search'] ?? '';
$lugares = $controller->buscarLugares('praia');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Turismo Curuçá - Praias</title>
   <link rel="stylesheet" href="../../public/css/conexao.css">
</head>

<body>

   <nav class="back-nav">
      <div class="text-box">
         <h1>Praias</h1>
      </div>
      <div class="btn-box">
         <a href="menu.php" class="btn-voltar">
            <i class="fas fa-chevron-left"></i> Voltar
         </a>

         <form action="" method="post">
            <input type="search" name="search" id="search-input" placeholder="Buscar praias..." value="<?php echo htmlspecialchars($search ?? ''); ?>">
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
            <?php if ($lugares > 0): ?>
               <?php foreach ($lugares as $lugar): ?>
                  <div class="card" onclick="openModal('hotel-<?php echo $lugar['id']; ?>')">
                     <?php if (!empty($lugar['imagem_principal'])): ?>
                        <img src="<?php echo $lugar['imagem_principal']; ?>" alt="<?php echo $lugar['nome']; ?>">
                     <?php else: ?>
                        <div class="card-image-placeholder"><i class="fas fa-umbrella-beach"></i></div>
                     <?php endif; ?>
                     <h3><?php echo $lugar['nome']; ?></h3>
                  </div>
               <?php endforeach; ?>
            <?php else: ?>
               <p style="padding:20px;">Nenhuma praia encontrado para "<strong><?php echo htmlspecialchars($search ?: 'nenhum termo'); ?></strong>".</p>
            <?php endif; ?>
         </div>
      </section>
   </main>

   <?php foreach ($lugares as $lugar): ?>
   <div id="modal-hotel-<?php echo $lugar['id']; ?>" class="modal">
      <div class="modal-box">
         <span class="close" onclick="closeModal('hotel-<?php echo $lugar['id']; ?>')">&times;</span>
         <div class="image-carousel">
            <div class="carousel-images">
               <?php if (!empty($lugar['imagem_principal'])): ?>
               <div class="carousel-image" style="background-image: url('<?php echo $lugar['imagem_principal']; ?>');"></div>
               <?php else: ?>
               <div class="carousel-image carousel-image-empty"><i class="fas fa-umbrella-beach"></i></div>
               <?php endif; ?>
               <!-- imagens com join para cada local, como fazer para mostrar todas as imagens treladas? -->
               <?php foreach ($lugar['url'] as $imagem): ?>
               <div class="carousel-image" style="background-image: url('<?php echo $imagem; ?>');"></div>
               <?php endforeach; ?>
            </div>
            <button class="carousel-btn prev" onclick="prevImage('hotel-<?php echo $lugar['id']; ?>')"> < </button>
            <button class="carousel-btn next" onclick="nextImage('hotel-<?php echo $lugar['id']; ?>')"> > </button>
            <div class="carousel-indicators">
            </div>
         </div>
         <div class="text-box">
            <h2><?php echo $lugar['nome']; ?></h2>
            <p><?php echo $lugar['descricao']; ?></p>
            <div class="info-tags">
               <?php if(!empty($lugar['numero'])):?>
               <span class="tag"><i class="fas fa-phone"></i><?php echo $lugar['numero']; ?></span>
               <?php endif; ?>
               <?php if (!empty($lugar['instagram'])): ?>
               <a class="tag insta" href="<?php echo $lugar['linkInstagram']; ?>/" target="_blank">
                  <i class="fab fa-instagram"></i><?php echo $lugar['instagram']; ?>
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

   <?php include 'components/footer.php'; ?>

</body>
<script src="../../public/js/script.js"></script>
<script src="../../public/js/catalogo.js"></script>

</html>
