<?php
include 'produtoRepositorio.php';

$connection = new Connection();
$produtosRepositorio = new ProdutoRepositorio($connection);
$produtos = $produtosRepositorio->getAllProducts();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Administração - Loja de Motos</title>
  <style>
    /* --- MESMO CSS do exemplo anterior --- */
    * {
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f7f9fc;
      margin: 0;
      padding: 0 20px 40px;
      color: #333;
    }

    header {
      background: #111;
      color: white;
      padding: 20px;
      text-align: center;
      margin-bottom: 30px;
    }

    header h1 {
      margin: 0;
      font-size: 28px;
      letter-spacing: 1.5px;
    }

    .btn-voltar {
      background-color: rgb(73, 71, 71);
      color: white;
      padding: 10px 18px;
      text-decoration: none;
      border-radius: 6px;
      font-weight: 600;
      transition: background-color 0.3s ease;
      user-select: none;
    }

    .admin-container {
      max-width: 1000px;
      margin: 0 auto;
      background: white;
      border-radius: 10px;
      padding: 25px 30px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .actions {
      display: flex;
      justify-content: flex-end;
      margin-bottom: 20px;
    }

    .btn-primary {
      background-color: #007bff;
      color: white;
      padding: 10px 18px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-weight: 600;
      transition: background-color 0.3s ease;
      box-shadow: 0 4px 8px rgb(0 123 255 / 0.4);
      user-select: none;
    }

    .btn-primary:hover {
      background-color: #0056b3;
      box-shadow: 0 6px 12px rgb(0 86 179 / 0.6);
    }

    table {
      width: 100%;
      border-collapse: collapse;
      font-size: 16px;
    }

    thead {
      background: #007bff;
      color: white;
      font-weight: 600;
    }

    th,
    td {
      padding: 12px 15px;
      text-align: left;
      border-bottom: 1px solid #ddd;
      vertical-align: middle;
    }

    tbody tr:hover {
      background: #f1faff;
    }

    .btn-edit,
    .btn-delete {
      padding: 6px 12px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-weight: 600;
      user-select: none;
      transition: background-color 0.3s ease;
      color: white;
    }

    .btn-edit {
      background-color: #28a745;
    }

    .btn-edit:hover {
      background-color: #1e7e34;
    }

    .btn-delete {
      background-color: #dc3545;
    }

    .btn-delete:hover {
      background-color: #a71d2a;
    }

    /* Modal */
    .modal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: rgba(0, 0, 0, 0.5);
      justify-content: center;
      align-items: center;
      z-index: 10;
    }

    .modal.active {
      display: flex;
    }

    .modal-content {
      background: white;
      padding: 25px 30px;
      border-radius: 10px;
      width: 400px;
      max-width: 95%;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
    }

    .modal-content h2 {
      margin-top: 0;
      margin-bottom: 20px;
      font-weight: 700;
      font-size: 24px;
      color: #007bff;
      text-align: center;
    }

    .form-group {
      margin-bottom: 15px;
    }

    label {
      display: block;
      font-weight: 600;
      margin-bottom: 6px;
    }

    input[type="text"],
    input[type="url"],
    input[type="number"] {
      width: 100%;
      padding: 10px 12px;
      border: 1.8px solid #ccc;
      border-radius: 6px;
      font-size: 16px;
      transition: border-color 0.2s ease;
    }

    input[type="text"]:focus,
    input[type="url"]:focus,
    input[type="number"]:focus {
      border-color: #007bff;
      outline: none;
    }

    .form-actions {
      display: flex;
      justify-content: space-between;
      margin-top: 25px;
    }

    .btn-cancel {
      background-color: #6c757d;
      color: white;
      border: none;
      padding: 10px 18px;
      border-radius: 6px;
      cursor: pointer;
      font-weight: 600;
      transition: background-color 0.3s ease;
    }

    .btn-cancel:hover {
      background-color: #565e64;
    }

    /* Imagem pequena na tabela */
    .produto-img {
      width: 80px;
      height: 50px;
      object-fit: cover;
      border-radius: 6px;
      border: 1px solid #ddd;
    }
  </style>
</head>

<body>
  <header>
    <div style="display: flex; align-items: center; justify-content: space-between; max-width: 1000px; margin: 0 auto; padding: 0 30px;">
      <h1 style="margin: 0; font-size: 28px; letter-spacing: 1.5px;">Área de Administração - Loja de Motos</h1>
      <a href="index.php" class="btn-voltar">← Voltar para Home</a>
    </div>
  </header>

  <main class="admin-container">
    <div class="actions">
      <button class="btn-primary" id="btnAddProduto">+ Adicionar Produto</button>
    </div>

    <table>
      <thead>
        <tr>
          <th>Nome</th>
          <th>Imagem</th>
          <th>Preço</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody id="produtosTableBody">
        <?php foreach ($produtos as $produto): ?>
          <tr>
            <td><?= $produto->getNome() ?></td>
            <td>
              <img class="produto-img" src="<?= $produto->getImagem() ?>" alt="<?= $produto->getNome() ?>" />
            </td>
            <td><?= number_format($produto->getPreco(), 2, ',', '.'); ?></td>
            <td class="actions-cell">
              <button class="btn-edit" data-index="<?= $produto->getId() ?>">Editar</button>
              <form method="POST" action="delete-product.php" onsubmit="return confirm('Tem certeza que deseja excluir?')">
                <button type="submit" class="btn-delete">Excluir</button>
                <input type="hidden" name="id" value="<?= $produto->getId() ?>">
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </main>

  <div class="modal" id="modalProduto">
    <div class="modal-content">
      <h2>Adicionar Produto</h2>
      <form id="formProduto">
        <input type="hidden" id="produtoIndex" name="produtoIndex" />
        <div class="form-group">
          <label for="nomeProduto">Nome do Produto</label>
          <input type="text" id="nomeProduto" name="nomeProduto" required />
        </div>
        <div class="form-group">
          <label for="imagemProduto">URL da Imagem</label>
          <input type="url" id="imagemProduto" name="imagemProduto" required />
        </div>
        <div class="form-group">
          <label for="precoProduto">Preço</label>
          <input type="text" id="precoProduto" name="precoProduto" required placeholder="Ex: R$ 19.999,99" />
        </div>
        <div class="form-actions">
          <button type="button" class="btn-cancel" id="btnCancelar">Cancelar</button>
          <button type="submit" class="btn-primary" id="btnSalvar">Salvar</button>
        </div>
      </form>
    </div>
  </div>

  <script>
    // Só para abrir/fechar modal (sem backend)
    const btnAddProduto = document.getElementById('btnAddProduto');
    const modal = document.getElementById('modalProduto');
    const btnCancelar = document.getElementById('btnCancelar');
    const formProduto = document.getElementById('formProduto');
    const modalTitle = modal.querySelector('h2');

    btnAddProduto.addEventListener('click', () => {
      modal.classList.add('active');
      modalTitle.textContent = 'Adicionar Produto';
      formProduto.reset();
      document.getElementById('produtoIndex').value = '';
    });

    btnCancelar.addEventListener('click', () => {
      modal.classList.remove('active');
    });
  </script>
</body>

</html>