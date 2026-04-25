<?php
include('../Core/conexao.php');
include('../Controllers/protect.php');
include('../Controllers/LugaresController.php');

$controller = new LugaresController($pdo);

// Verifica se existe filtro via GET
$tipo = isset($_GET['tipo']) ? $_GET['tipo'] : null;

if ($tipo) {
   $lugares = $controller->buscarLugares($tipo);
} else {
   $lugares = $controller->buscarTodosOsLugares();
}

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

   <main>
      <section id="functions-section">
         <div class="container" id="lugares">
            <div class="functions">
               <h2>Lugares</h2>

               <div class="filtros">
                  <!-- Links agora passam o parâmetro tipo -->
                  <a href="admin.php?tipo=hotel">Hotéis</a>
                  <a href="admin.php?tipo=igarape">Igarapés</a>
                  <a href="admin.php?tipo=praia">Praias</a>
                  <!-- Link para mostrar todos -->
                  <a href="admin.php">Todos</a>
               </div>

               <button class="ver-mais" id="ver-mais-lugares">Ver mais <i class="fas fa-eye"></i></button>
            </div>

            <div class="cards">
               <div class="card-lugar" id="add-lugar"><i class="fas fa-plus"></i></div>
               <?php foreach ($lugares as $lugar): ?>
                  <div class="card-lugar" style="background: url('<?= $lugar['imagem_principal']; ?>') no-repeat center center / cover;">
                     <?php echo $lugar['nome']; ?>
                     <a href="editar.php?id=<?php echo $lugar['id']; ?>">Editar</a>
                  </div>
               <?php endforeach ?>
            </div>
         </div>
      </section>
   </main>

   <?php include 'components/footer.php'; ?>

</body>
<script src="../../public/js/script.js"></script>
<script src="../js/menu.js"></script>
<script src="../../public/js/admin.js"></script>

</html>