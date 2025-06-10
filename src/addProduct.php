<?php

require_once __DIR__ . '/../vendor/autoload.php';

use crudPhp\Connection;
use crudPhp\Product;
use crudPhp\ProductRepositorio;

$connection = new Connection();
$productsRepository = new ProductRepositorio($connection);

if (
  isset($_POST['image']) &&
  isset($_POST['name']) &&
  isset($_POST['price'])
) {

  $formatPrice = str_replace(['R$', '.', ','], ['', '', '.'], $_POST['price']);

  $product = new product(
    NULL,
    $_POST['image'],
    $_POST['name'],
    $formatPrice,
  );

  $productsRepository->addProduct($product);
}

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Administração - Loja de Motos</title>
  <link rel="stylesheet" href="styles/addProduct.css">
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

  <div class="form-container">
    <h2>Adicionar produto</h2>
    <form id="formProduct" method="POST" action="addProduct.php">
      <input type="hidden" id="productIndex" name="productIndex" />
      <div class="form-group">
        <label for="name">Name do produto</label>
        <input type="text" id="name" name="name" required />
      </div>
      <div class="form-group">
        <label for="image">URL da Image</label>
        <input type="url" id="image" name="image" required />
      </div>
      <div class="form-group">
        <label for="price">Preço</label>
        <input
          type="text"
          id="price"
          name="price"
          required
          placeholder="Ex: R$ 14.000,00"
          pattern="^R?\$?\s?\d{1,3}(\.\d{3})*,\d{2}$"
          title="Use o formato R$ 14.000,00" />
      </div>
      <div class="form-actions">
        <button type="button" class="btn-cancel" id="btnCancel">Cancelar</button>
        <button type="submit" class="btn-primary" id="btnSave">Salvar</button>
      </div>
    </form>
  </div>
</body>