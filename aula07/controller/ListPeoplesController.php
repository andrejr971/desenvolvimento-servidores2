<?php
  class ListPeoplesController {
    private PDO $connection;

    public function __construct(PDO $connection) {
      $this->connection = $connection;
    }

    public function handle(): Array {
      $sql = "SELECT * FROM tb_pessoa";

      $peoples = $this->connection->prepare($sql);
      $peoples->execute();

      return $peoples->fetchAll(PDO::FETCH_OBJ);
    }
  }