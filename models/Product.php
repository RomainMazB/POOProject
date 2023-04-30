<?php

require_once('Model.php');

class Product extends Model {
  protected string $table = 'products';

  public int $id;
  public string $name;
  public float $price;
}