<?php
  class Database {
    private static $connection;

    private function __construct() {}

    public static function getConnection(): PDO {
      if (!isset(self::$connection)){
        self::$connection = new PDO("mysql:host=localhost; dbname=poo", "root", "",
          [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8']);
      }

      self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      return self::$connection;
    }
  }