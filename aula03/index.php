<?php
  ini_set('display_errors', 1);

  /**
   * Encapsulamento e injeção de dependências
   */

  class Client {
    public $name;
    public $cnpj;
    
    public function __construct($name, $cnpj)
    {
      $this->name = $name;
      $this->cnpj = $cnpj;
    }
  }

  class Order {
    private $number;
    private $price;
    private  $date;
    private  $client;


    public function __construct($client, $price)
    {
      $this->client = $client;
      $this->number = $this->generateNumber();
      $this->price = $price;
      $this->date = date('Y-m-d');
    }

    public function setClient($client) {
      $this->client = $client;
    }

    private function generateNumber() {
      return 33;
    }

    public function informations() {
      echo "Nº: {$this->number} <br />";
      echo "Price: {$this->price} <br />";
      echo "Date: {$this->date} <br />";
      echo "Information Client ------ <br />";
      echo "Name: {$this->client->name} <br />";
      echo "Cnpj: {$this->client->cnpj} <br />";
    }
  }

  $client = new Client('André', '000');

  $order = new Order($client, 1000);

  $order->informations();