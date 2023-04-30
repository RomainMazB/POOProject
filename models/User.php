<?php

require_once('Model.php');

class User extends Model {
  protected string $table = 'users';

  public int $id;
  public string $pseudo;
  public string $email;
  public string $password;
}