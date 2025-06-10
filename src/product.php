<?php

namespace crudPhp;

require_once __DIR__ . '/../vendor/autoload.php';


class product
{

  private $id;
  private $image;
  private $name;
  private $price;

  public function __construct($id, $image, $name, $price)
  {
    $this->id = $id;
    $this->image = $image;
    $this->name = $name;
    $this->price = $price;
  }

  public function getId()
  {
    return $this->id;
  }

  public function getImage()
  {
    return $this->image;
  }

  public function getName()
  {
    return $this->name;
  }

  public function getPrice()
  {
    return $this->price;
  }

  public function setImage($image)
  {
    $this->image = $image;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function setPrice($price)
  {
    $this->price = $price;
  }
}
