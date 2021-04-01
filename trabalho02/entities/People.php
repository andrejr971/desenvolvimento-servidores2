<?php
  require_once 'classes/Schema.php';

  class People extends Schema {
    public function __construct(PDO $connection) {
      self::setConnection($connection);
      self::setTable('tb_pessoa');
    }
  }