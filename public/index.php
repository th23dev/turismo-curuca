<?php 
if (!isset($_SESSION)) {
   session_start();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terminal de Navegação Turística - Curuçá</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/your-code.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/conexao.css">
</head>

<body>

    <nav id="main-nav" aria-label="Navegação principal">
        <div class="logo-area">
            <img src="imgs/logos-bg/logo-sec-turismo.webp" alt="Secretaria de Turismo" class="logo-img">
            <span class="logo-text">Turismo Curuçá</span>
        </div>

        <button class="menu-toggle" id="menu-toggle" aria-label="Menu" aria-expanded="false">
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
        </button>

        <ul class="nav-links" id="nav-links">
            <li><a href="#inicio">Início</a></li>
            <li><a href="">Explore</a></li>
            <li><a href="">Contatos</a></li>
            <li>
                <button class="dark-mode-toggle" id="dark-mode-toggle" aria-label="Alternar modo escuro">
                    <i class="fas fa-moon"></i>Tema
                </button>
            </li>
            <?php if (isset($_SESSION['id'])): ?>
             <li><a href="../app/Views/admin.php">Painel Administrativo</a></li>
            <?php else: ?>
                <li><a href="../app/Views/login.php">Login</a></li>
            <?php endif; ?>
        </ul>
    </nav>

    <section class="hero" id="inicio">
        <div class="hero-bg hero-bg-1"></div>
        <div class="hero-bg hero-bg-2"></div>
        <div class="hero-bg hero-bg-3"></div>
        <div class="hero-bg hero-bg-4"></div>
        <div class="hero-bg hero-bg-5"></div>
        <div class="hero-bg hero-bg-6"></div>
        <div class="hero-overlay"></div>
        <h1>Terminal de Navegação Turística</h1>
        <p>A sua porta de entrada para as belezas naturais de Curuçá.</p>
        <a href="../app/Views/menu.php" class="btn-start">NAVEGAR</a>
    </section>

    <footer>
        <div class="footer-logos">
            <a href="https://www.sebrae.com.br/" target="_blank"><img src="imgs/logos-bg/logo-sebrae.webp" alt="sebrae"></a>
            <a href="https://www.cidadeempreendedora.com.br/" target="_blank"><img src="imgs/logos-bg/logo-cidade-empreendedora.webp" alt="cidade empreendedora"></a>
            <a href="https://www.instagram.com/turismocuruca.oficial" target="_blank"><img src="imgs/logos-bg/logo-sec-turismo.webp" alt="secretaria de turismo Curuçá"></a>
            <a href="https://www.instagram.com/prefeituracuruca/" target="_blank"><img src="imgs/logos-bg/logo-prefeitura-curuca.webp" alt="prefeitura de Curuçá"></a>
        </div>
        <div class="social-links">
            <a href="">Siga-nos: @turismocuruca.oficial</a>
        </div>
        <hr style="border: 0.5px solid #444; margin-bottom: 20px;">
        <p>&copy; 2026 - Prefeitura Municipal de Curuçá - Todos os direitos reservados.</p>
        <p>Desenvolvedor - <a href="https://github.com/th23dev" target="_blank">Th23dev</a> - <a href="https://instagram.com/th23_dev" target="_blank">@th23_dev</a></p>
    </footer>
</body>
<script src="js/script.js"></script>

</html>
