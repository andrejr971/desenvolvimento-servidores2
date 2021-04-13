<?php
  require_once 'classes/Model.php';

  class People extends Model {
    public function __construct(PDO $connection) {
      self::setConnection($connection);
      self::setTable('tb_pessoa');
    }
  }