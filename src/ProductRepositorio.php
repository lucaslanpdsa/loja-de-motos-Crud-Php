<?php

namespace crudPhp;

require_once __DIR__ . '/../vendor/autoload.php';


use crudPhp\product;
use crudPhp\Connection;
use PDO;

class ProductRepositorio
{

  private $connection;

  public function __construct(Connection $connection)
  {
    $this->connection = $connection->createConnection();
  }

  public function getAllProducts()
  {
    $sql = "SELECT * FROM `crud_php`.products;";
    $statement = $this->connection->prepare($sql);
    $statement->execute();
    $products = $statement->fetchAll(PDO::FETCH_ASSOC);

    $products = array_map(function ($product) {
      return new product(
        $product['id'],
        $product['image'],
        $product['name'],
        $product['price'],
      );
    }, $products);

    return $products;
  }

  public function deleteProduct(int $id)
  {
    $sql = "DELETE FROM `crud_php`.products WHERE id = :id";
    $statement = $this->connection->prepare($sql);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();

    header('Location: admin.php');
    exit;
  }

  public function addProduct(Product $product)
  {
    $sql = "INSERT INTO `crud_php`.`products` (`image`, `name`, `price`) VALUES (
    :image,
    :name,
    :price
  )";

    $statement = $this->connection->prepare($sql);

    $statement->bindValue(':image', $product->getImage(), PDO::PARAM_STR);
    $statement->bindValue(':name', $product->getName(), PDO::PARAM_STR);
    $statement->bindValue(':price', $product->getPrice(), PDO::PARAM_STR);

    $statement->execute();
  }

  public function updateProduct($product)
  {
    $sql = "UPDATE `crud_php`.`products`
            SET name = :name,
                image = :image,
                price = :price
            WHERE id = :id;";

    $statement = $this->connection->prepare($sql);

    $statement->bindValue(':name', $product->getName(), PDO::PARAM_STR);
    $statement->bindValue(':image', $product->getImage(), PDO::PARAM_STR);
    $statement->bindValue(':price', $product->getPrice(), PDO::PARAM_STR);
    $statement->bindValue(':id', $product->getId(), PDO::PARAM_INT);

    $statement->execute();
  }
}
