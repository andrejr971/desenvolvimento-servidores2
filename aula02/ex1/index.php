<?php
  ini_set('display_errors', 1);

  abstract class Ingresso {
    private $valor = 100;

    public function imprimirValor() {
      return $this->valor;
    }
  }

  class Vip extends Ingresso {
    private $adiocional;

    public function __construct($valor)
    {
      $this->adiocional = $valor;
    }

    public function valorIngresso()
    {
      return number_format($this->imprimirValor() + $this->adiocional, 2, ',', '.');
    }
  }
  
  class Normal extends Ingresso {
    public function tipoIngresso() {
      return 'Ingresso Normal: R$' . number_format($this->imprimirValor(), 2, ',', '.');
    }
  }

  class CamaroteInferior extends Vip {
    private $localizacao = '1º andar';

    public function imprimir() {
      return "Valor: R$ {$this->valorIngresso()} - Localização: {$this->localizacao}";
    }
  }

  class CamaroteSuperior extends Vip {
    private $localizacao = '2º andar';

    public function imprimir() {
      return "Valor: R$ {$this->valorIngresso()} - Localização: {$this->localizacao}";
    }
  }

  $normal = new Normal(10);
  echo $normal->tipoIngresso();
  echo '<br />';
  $camaroteInferior = new CamaroteInferior(20);
  echo $camaroteInferior->imprimir();
  echo '<br />';
  $camaroteSuperior = new CamaroteSuperior(100);
  echo $camaroteSuperior->imprimir();
?>