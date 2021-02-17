<?php
  ini_set('display_errors', 1);
  /**
   * Herança
   * Abstract - a classe Animal serve como base,
   * não pode ser instaciada diretamente
   */

  abstract class Animal {
    public $peso;
    private $altura;
    protected $pelagem;


    public function comer() {
      echo $this->nadar();
    }

    
  /**
   * A superclasse não implementa
   * Todas as subclasse terção que implementar este método
   */
    abstract public function respirar();
  }

  /**
   * Classe Ave extendo de animal
   */
  class Ave extends Animal {
    private $formato_bico;

    public function __construct($tipo)
    {
      $this->formato_bico = $tipo;
    }

    public function tipo_bico() {
      echo $this->formato_bico;
    }

    public function voar() {
      echo 'Voando';
    }

    public function respirar() {
      echo 'Respirando através de pulmões';
    }
  }

  /**
   * Classe Peixes extendo de animal
   */
  class Peixes extends Animal {
    private $tipo_escamas;

    public function piracema() {
      echo 'Subindo';
    }

    /**
     * Polimorfismo -  reescrever um método da superclasse na subclasse
     */

    public function respirar() {
      echo 'Respirando através da brânquias ou guelras';
    }
  }

  $obj_ave = new Ave('pinça');
  $obj_ave->voar();
  echo '<br />';
  $obj_ave->tipo_bico();
  
  echo '<br />';
  $obj_peixe = new Peixes();
  $obj_ave->respirar();

?>