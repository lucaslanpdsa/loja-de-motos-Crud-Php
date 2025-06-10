<?php

require_once __DIR__ . '/../vendor/autoload.php';

use crudPhp\Connection;
use crudPhp\ProductRepositorio;

$connection = new Connection();
$productsRepository = new ProductRepositorio($connection);
$productsRepository->deleteProduct($_POST['id']);
