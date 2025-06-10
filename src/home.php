<?php

require_once __DIR__ . '/../vendor/autoload.php';

use crudPhp\Connection;
use crudPhp\ProductRepositorio;

$connection = new Connection();
$products = new ProductRepositorio($connection);
$products = $products->getAllProducts();

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title>Loja de Motos</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/home.css">
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
    <div class="products">
      <?php foreach ($products as $product): ?>
        <div class="product">
          <img src="<?= $product->getImage(); ?>" alt="<?= $product->getName(); ?>">
          <div class="info">
            <h2><?= $product->getName(); ?></h2>
            <p class="price">R$ <?= number_format($product->getPrice(), 2, ',', '.'); ?></p>
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