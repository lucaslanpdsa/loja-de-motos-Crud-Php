<?php
include 'produtoRepositorio.php';

$connection = new Connection();
$produtos = new ProdutoRepositorio($connection);
$produtos = $produtos->getAllProducts();

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title>Loja de Motos</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    html,
    body {
      height: 100%;
    }

    body {
      display: flex;
      flex-direction: column;
      font-family: 'Segoe UI', sans-serif;
      background: #f4f4f4;
      color: #333;
    }

    header {
      background: #111;
      color: white;
      padding: 20px;
      text-align: center;
    }

    .header-container {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .logo {
      width: 100%;
    }

    .admin-btn-container {
      display: flex;
      justify-content: end;
    }

    .admin-btn {
      background-color: rgb(73, 71, 71);
      color: white;
      padding: 10px 18px;
      text-decoration: none;
      border-radius: 6px;
      font-weight: 600;
      transition: background-color 0.3s ease;
      user-select: none;
    }

    .admin-btn:hover {
      background-color: #0056b3;
      box-shadow: 0 6px 12px rgb(0 86 179 / 0.6);
    }

    header h1 {
      font-size: 32px;
    }

    .container {
      flex: 1;
      padding: 40px 20px;
      max-width: 1200px;
      margin: 0 auto;
      width: 100%;
    }

    .produtos {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
      gap: 25px;
    }

    .produto {
      background: white;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      transition: transform 0.2s;
    }

    .produto:hover {
      transform: scale(1.02);
    }

    .produto img {
      width: 100%;
      height: 180px;
      object-fit: cover;
    }

    .produto .info {
      padding: 15px;
      text-align: center;
    }

    .produto .info h2 {
      font-size: 20px;
      margin-bottom: 10px;
    }

    .produto .info .preco {
      font-size: 18px;
      color: #c00;
      font-weight: bold;
    }

    footer {
      background: #111;
      color: #ddd;
      text-align: center;
      padding: 20px;
    }

    footer p {
      margin: 5px 0;
    }

    a {
      color: inherit;
      text-decoration: none;
    }
  </style>
</head>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Loja de Motos</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header>
    <div class="header-container">
      <div class="logo">
        <h1>🏍️ Loja de Motos</h1>
        <p>Os melhores modelos com os melhores preços</p>
      </div>
      <div class="admin-btn-container">
        <a href="admin.php" class="admin-btn">Administração</a>
      </div>
    </div>
  </header>

  <div class="container">
    <div class="produtos">
      <?php foreach ($produtos as $produto): ?>
        <div class="produto">
          <img src="<?= $produto->getImagem(); ?>" alt="<?= $produto->getNome(); ?>">
          <div class="info">
            <h2><?= $produto->getNome(); ?></h2>
            <p class="preco">R$ <?= number_format($produto->getPreco(), 2, ',', '.'); ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <footer>
    <p>&copy; 2025 Loja de Motos. Todos os direitos reservados.</p>
    <p>Contato: contato@lojademotos.com.br</p>
  </footer>
</body>

</html>