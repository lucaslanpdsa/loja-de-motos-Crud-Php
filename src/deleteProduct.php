<?php

require_once __DIR__ . '/../vendor/autoload.php';

use crudPhp\Connection;
use crudPhp\ProductRepositorio;

$connection = new Connection();
$productsRepositorio = new ProductRepositorio($connection);
$productsRepositorio->deleteProduct($_POST['id']);
