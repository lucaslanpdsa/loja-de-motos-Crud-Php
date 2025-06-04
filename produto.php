<?php

class Produto
{

  private $id;
  private $imagem;
  private $nome;
  private $preco;

  public function __construct($id, $imagem, $nome, $preco)
  {
    $this->id = $id;
    $this->imagem = $imagem;
    $this->nome = $nome;
    $this->preco = $preco;
  }

  public function getId()
  {
    return $this->id;
  }

  public function getImagem()
  {
    return $this->imagem;
  }

  public function getNome()
  {
    return $this->nome;
  }

  public function getPreco()
  {
    return $this->preco;
  }

  public function setImagem($imagem)
  {
    $this->imagem = $imagem;
  }

  public function setNome($nome)
  {
    $this->nome = $nome;
  }

  public function setPreco($preco)
  {
    $this->preco = $preco;
  }
}
