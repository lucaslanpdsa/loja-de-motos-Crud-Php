<?php
include 'produto.php';
include 'connection.php';

class ProdutoRepositorio
{

  private $connection;

  public function __construct(Connection $connection)
  {
    $this->connection = $connection->createConnection();
  }

  public function getAllProducts()
  {
    $sql = "SELECT * FROM `crud-php`.produtos;";
    $statement = $this->connection->prepare($sql);
    $statement->execute();
    $produtos = $statement->fetchAll(PDO::FETCH_ASSOC);

    $produtos = array_map(function ($produto) {
      return new produto(
        $produto['id'],
        $produto['imagem'],
        $produto['nome'],
        $produto['preco'],
      );
    }, $produtos);

    return $produtos;
  }

  public function deleteProduct(int $id)
  {
    $sql = "DELETE FROM `crud-php`.produtos WHERE id = :id";
    $statement = $this->connection->prepare($sql);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();

    header('Location: admin.php');
    exit;
  }
}
