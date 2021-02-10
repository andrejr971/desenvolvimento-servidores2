<?php
  ini_set('display_errors', 1);

  class Animal {
    public $peso;
    private $altura;
    protected $pelagem;

    /**
     *  @param  int  $peso
     */
    public function __construct($peso)
    {
      $this->peso = $peso;
    }


    public function comer() {
      echo $this->nadar();
    }

    private function nadar() {
      echo 'Nadando';
    }
  }
  
  $best = new Animal(100);

  $best->comer();
?>