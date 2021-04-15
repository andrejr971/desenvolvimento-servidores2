<?php
  require_once 'config/Model.php';

  class Product extends Model {
    public function __construct(PDO $connection) {
      self::setConnection($connection);
      self::setTable('tb_produto');
    }
  }