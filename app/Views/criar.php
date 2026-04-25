<?php
include('../Core/conexao.php');
include('../Controllers/protect.php');
include('../Controllers/LugaresController.php');

$controller = new LugaresController($pdo);
$mensagem = '';
$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $resultado = $controller->criarLocal($_POST);
    if ($resultado) {
        $mensagem = 'Local criado com sucesso!';
        header('location: admin.php');
    } else {
        $erro = 'Erro ao criar o local. Tente novamente.';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Turismo Curuçá - Criar Novo Local</title>
   <link rel="stylesheet" href="../../public/css/conexao.css">
</head>

<body>
   <nav class="back-nav">
      <div class="text-box">
         <h1>Criar Novo Local</h1>
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
         <?php if ($mensagem): ?>
            <div class="alert alert-success">
               <i class="fas fa-check-circle"></i> <?= $mensagem ?>
            </div>
         <?php endif; ?>
         <?php if ($erro): ?>
            <div class="alert alert-erro">
               <i class="fas fa-exclamation-circle"></i> <?= $erro ?>
            </div>
         <?php endif; ?>

         <form action="" method="post" class="editar-form">
            <!-- Preview da Imagem -->
            <div class="form-group image-preview-group">
               <label>Preview da Imagem Principal</label>
               <div class="image-preview-box">
                  <img id="preview-img" src="" alt="Preview" style="display: none;">
                  <div class="image-placeholder" id="image-placeholder" style="display: flex;">
                     <i class="fas fa-image"></i>
                     <span>Nenhuma imagem selecionada</span>
                  </div>
               </div>
               <input type="text" name="imagem_principal" id="imagem_principal" placeholder="URL da imagem principal">
            </div>

            <!-- Informações Básicas -->
            <div class="form-section">
               <h3><i class="fas fa-info-circle"></i> Informações Básicas</h3>
               <div class="form-row">
                  <div class="form-group">
                     <label for="nome">Nome do Local</label>
                     <input type="text" name="nome" id="nome" placeholder="Ex: Praia do Farol">
                  </div>
                  <div class="form-group">
                     <label for="tipo">Tipo</label>

                        <option value="Hotel">Hotel</option>
                        <option value="Igarapé">Igarapé</option>
                        <option value="Praia">Praia</option>
                     </select>
                  </div>
               </div>
            </div>

            <!-- Contato -->
            <div class="form-section">
               <h3><i class="fas fa-address-book"></i> Contato</h3>
               <div class="form-row">
                  <div class="form-group">
                     <label for="numero">Número de Telefone</label>
                     <input type="text" name="numero" id="numero" placeholder="Ex: (91) 99999-9999">
                  </div>
                  <div class="form-group">
                     <label for="instagram">Arroba do Instagram</label>
                     <div class="input-icon">
                        <i class="fab fa-instagram"></i>
                        <input type="text" name="instagram" id="instagram" placeholder="Ex: @curuca_turismo">
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <label for="linkInstagram">Link do Instagram</label>
                  <div class="input-icon">
                     <i class="fas fa-link"></i>
                     <input type="text" name="linkInstagram" id="linkInstagram" placeholder="https://instagram.com/...">
                  </div>
               </div>
            </div>

            <!-- Descrição -->
            <div class="form-section">
               <h3><i class="fas fa-align-left"></i> Descrição</h3>
               <div class="form-group">
                  <label for="descricao">Sobre o local</label>
                  <textarea name="descricao" id="descricao" placeholder="Descreva o local, atrações, diferenciais..." rows="5"></textarea>
               </div>
            </div>

            <!-- Restaurante -->
            <div class="form-section">
               <h3><i class="fas fa-utensils"></i> Restaurante</h3>
               <div class="form-group toggle-group">
                  <span class="toggle-label">Possui restaurante no local?</span>
                  <label class="toggle-switch">
                     <input type="checkbox" name="restaurante" value="sim" id="restaurante-toggle">
                     <span class="toggle-slider"></span>
                  </label>
                  <input type="hidden" name="restaurante" value="nao" id="restaurante-hidden">
               </div>
            </div>

            <!-- Ações -->
            <div class="form-actions">
               <button type="submit" class="btn-salvar">
                  <i class="fas fa-plus"></i> Criar Local
               </button>
               <a href="admin.php" class="btn-cancelar">
                  <i class="fas fa-times"></i> Cancelar
               </a>
            </div>
         </form>
      </section>
   </main>

   <?php include 'components/footer.php'; ?>

   <script>
      // Preview dinâmico da imagem
      const imgInput = document.getElementById('imagem_principal');
      const previewImg = document.getElementById('preview-img');
      const placeholder = document.getElementById('image-placeholder');

      imgInput.addEventListener('input', function() {
         const url = this.value.trim();
         if (url) {
            previewImg.src = url;
            previewImg.style.display = 'block';
            placeholder.style.display = 'none';
         } else {
            previewImg.style.display = 'none';
            placeholder.style.display = 'flex';
         }
      });

      previewImg.addEventListener('error', function() {
         this.style.display = 'none';
         placeholder.style.display = 'flex';
      });

      previewImg.addEventListener('load', function() {
         if (imgInput.value.trim()) {
            this.style.display = 'block';
            placeholder.style.display = 'none';
         }
      });

      // Toggle switch lógica
      const toggle = document.getElementById('restaurante-toggle');
      const hidden = document.getElementById('restaurante-hidden');

      toggle.addEventListener('change', function() {
         hidden.disabled = this.checked;
      });
      hidden.disabled = toggle.checked;
   </script>
   <script src="../../public/js/script.js"></script>
   <script src="../js/menu.js"></script>
</body>

</html>

