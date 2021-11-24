<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Better Food</title>

  <!-- FavIcon -->
  <link rel="icon" href="./assets/favicon/shopping-bag.svg" />
  <link rel="apple-touch-icon" href="./assets/favicon/shopping-bag.svg" />

  <!-- CSS -->
  <link rel="stylesheet" href="./css/style.css">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

  <!-- Feather Icons -->
  <script src="https://unpkg.com/feather-icons"></script>

  <!--  -->
</head>

<body>
  <header id="index">
    <nav>
      <div class="logo">
        <a href="?page=#index">
          <h1>Better<span>Food</span></h1>
        </a>
      </div>

      <ul class="nav-menu">
        <li><a href="?page=#index">Home</a></li>
        <li><a href="?page=listar_produtos">Produtos</a></li>
        <li><a href="?page=cadastrar_produtos">Cadastrar</a></li>
      </ul>

      <i data-feather="menu" class="menu-toggle"></i>

    </nav>
  </header>

  <main>

    <?php

    include("./connect.php");

    $_page = @$_GET['page'];

    switch ($_page) {
      case 'cadastrar_produtos':
        include('./pages/produtos/produtos_cadastrar.php');
        break;

      case 'listar_produtos':
        include('./pages/produtos/produtos_listar.php');
        break;

      case 'editar_produtos':
        include('./pages/produtos/produtos_editar.php');
        break;

      default:
        include('./pages/home/home.php');
    }

    ?>

  </main>

  <footer>
    <p class="footer-copyright">&copy;2021 - <a href="https://github.com/matheus-gs">Matheus-gs</a></p>
  </footer>

  <!-- JS -->
  <script src="./js/script.js"></script>
</body>

</html>