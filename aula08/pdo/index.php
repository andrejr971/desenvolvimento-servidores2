<?php

  define('HOST', 'localhost');
  define('DB_NAME', 'poo');
  define('DB_USERNAME', 'andre');
  define('DB_PASSWORD', 'andre3387');

  class Database {
    private static $connection;

    private function __construct() {}

    public static function getConnection(): PDO {
      if (!isset(self::$connection)){
        self::$connection = new PDO('mysql:host=' . HOST. ';dbname=' . DB_NAME .';', DB_USERNAME, DB_PASSWORD, [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8']);
      }

      self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      return self::$connection;
    }
  }