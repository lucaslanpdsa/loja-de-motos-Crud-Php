<?php

require_once __DIR__ . '/../vendor/autoload.php';

use crudPhp\ProductRepositorio;
use crudPhp\Connection;

$connection = new Connection();
$productsRepositorio = new ProductRepositorio($connection);
$products = $productsRepositorio->getAllProducts();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Administração - Loja de Motos</title>
  <link rel="stylesheet" href="styles/admin.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <header>
    <div style="display: flex; align-items: center; justify-content: space-between; max-width: 1000px; margin: 0 auto; padding: 0 30px;">
      <h1 style="margin: 0; font-size: 28px; letter-spacing: 1.5px;">Área de Administração - Loja de Motos</h1>
      <a href="home.php" class="btn-voltar">← Voltar para Home</a>
    </div>
  </header>

  <main class="admin-container">
    <div class="actions">
      <a href="addProduct.php" class="btn-primary">+ Adicionar produto</a>
    </div>

    <table>
      <thead>
        <tr>
          <th>Nome</th>
          <th>Image</th>
          <th>Preço</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody id="productsTableBody">
        <?php foreach ($products as $product): ?>
          <tr>
            <td><?= $product->getName() ?></td>
            <td>
              <img class="product-img" src="<?= $product->getImage() ?>" alt="<?= $product->getName() ?>" />
            </td>
            <td><?= number_format($product->getPrice(), 2, ',', '.'); ?></td>
            <td class="actions-cell">
              <div class="buttons">
                <button
                  class="btn-edit"
                  data-id="<?= $product->getId() ?>"
                  data-name="<?= htmlspecialchars($product->getName(), ENT_QUOTES) ?>"
                  data-image="<?= $product->getImage() ?>"
                  data-price="<?= $product->getPrice() ?>">
                  Editar
                </button>
                <form method="POST" action="deleteProduct.php" onsubmit="return confirm('Tem certeza que deseja excluir?')">
                  <button type="submit" class="btn-delete">Excluir</button>
                  <input type="hidden" name="id" value="<?= $product->getId() ?>">
                </form>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </main>

  <div class="modal hidden" id="modalEditProduct">
    <div class="modal-content">
      <h2>Editar produto</h2>
      <form method="POST" action="editProduct.php" id="formEditProduct">
        <input required type="hidden" name="id" id="editProductId">
        <label for="name">Nome</label>
        <input required type="text" name="name" id="editarNameProduct" minlength="4">
        <label for="image">Imagem</label>
        <input required type="url" name="image" id="editarImageProduct">
        <label for="price">Preço</label>
        <input required type="text" name="price" id="editarPriceProduct" pattern="^R?\$?\s?\d{1,3}(\.\d{3})*,\d{2}$" title="Use o formato R$ 14.000,00">
        <button type="submit">Salvar</button>
        <button type="button" id="btnCancelarEdicao">Cancelar</button>
      </form>
    </div>
  </div>

  <script>
    document.querySelectorAll('.btn-edit').forEach(button => {
      button.addEventListener('click', () => {
        const id = button.getAttribute('data-id');
        const name = button.getAttribute('data-name');
        const image = button.getAttribute('data-image');
        const price = button.getAttribute('data-price');

        document.getElementById('editProductId').value = id;
        document.getElementById('editarNameProduct').value = name;
        document.getElementById('editarImageProduct').value = image;
        document.getElementById('editarPriceProduct').value = price;

        document.getElementById('modalEditProduct').classList.add('active');
        document.getElementById('modalEditProduct').classList.remove('hidden');
      });
    });

    document.getElementById('btnCancelarEdicao').addEventListener('click', () => {
      document.getElementById('modalEditProduct').classList.remove('active');
      document.getElementById('modalEditProduct').classList.add('hidden');
    });
  </script>

</body>

</html>