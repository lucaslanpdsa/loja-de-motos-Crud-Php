<?php

require_once __DIR__ . '/../vendor/autoload.php';

use crudPhp\Connection;
use crudPhp\Product;
use crudPhp\ProductRepositorio;

$connection = new Connection();
$productsRepository = new ProductRepositorio($connection);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $priceFormatado = str_replace(['R$', '.', ','], ['', '', '.'], $_POST['price']);

  $product = new Product(
    $_POST['id'],
    $_POST['image'],
    $_POST['name'],
    $priceFormatado,
  );

  $productsRepository->updateProduct($product);

  header('Location: admin.php');
  exit;
}
