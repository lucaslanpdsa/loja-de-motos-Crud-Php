<?php

include 'produtoRepositorio.php';
$connection = new Connection();
$produtosRepositorio = new ProdutoRepositorio($connection);
$produtosRepositorio->deleteProduct($_POST['id']);
