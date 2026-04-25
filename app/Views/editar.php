<?php
include('../Core/conexao.php');
include('../Controllers/protect.php');
include('../Controllers/LugaresController.php');

$controller = new LugaresController($pdo);

$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id) {
   $lugares = $controller->buscarLugar($id);
}

if (!$lugares && $id) {
    echo "Lugar não encontrado!";
    exit;
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
         <h1>Editar <?php echo $lugares['nome']?></h1>
      </div>
      <div class="btn-box">
         <a href="admin.php" class="btn-voltar">
            <i class="fas fa-chevron-left"></i> Voltar
         </a>
         <a href="admin.php" class="btn-voltar">
            Início <i class="fas fa-house"></i>
         </a>
      </div>
   </nav>

   <main>
      <section id="section-editar">
         <form action="" method="post">
            <input type="text" name="imagem_principal" placeholder="Imagem principal"
               value="<?= htmlspecialchars($lugares['imagem_principal'] ?? '') ?>">

            <input type="text" name="nome" placeholder="Nome"
               value="<?= htmlspecialchars($lugares['nome'] ?? '') ?>">

            <select name="tipo">
               <option value="Hotel" <?= ($lugares['tipo'] ?? '') === 'Hotel' ? 'selected' : '' ?>>Hotel</option>
               <option value="Igarapé" <?= ($lugares['tipo'] ?? '') === 'Igarape' ? 'selected' : '' ?>>Igarapé</option>
               <option value="Praia" <?= ($lugares['tipo'] ?? '') === 'Praia' ? 'selected' : '' ?>>Praia</option>
            </select>

            <input type="text" name="numero" placeholder="Número"
               value="<?= htmlspecialchars($lugares['numero'] ?? '') ?>">

            <input type="text" name="instagram" placeholder="Arroba do Instagram"
               value="<?= htmlspecialchars($lugares['instagram'] ?? '') ?>">

            <input type="text" name="linkInstagram" placeholder="Link do Instagram"
               value="<?= htmlspecialchars($lugares['linkInstagram'] ?? '') ?>">

            <textarea name="descricao" placeholder="Descrição"><?= htmlspecialchars($lugares['descricao'] ?? '') ?></textarea>

            <label>
               <input type="radio" name="restaurante" value="sim"
                  <?= ($lugares['possui_restaurante'] ?? '') === 'sim' ? 'checked' : '' ?>> Possui restaurante
            </label>
            <label>
               <input type="radio" name="restaurante" value="nao"
                  <?= ($lugares['possui_restaurante'] ?? '') === 'nao' ? 'checked' : '' ?>> Não possui restaurante
            </label>

            <button type="submit">Salvar</button>
         </form>

      </section>
   </main>

   <?php include 'components/footer.php'; ?>

</body>
<script src="../../public/js/script.js"></script>
<script src="../js/menu.js"></script>

</html>