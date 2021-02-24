<?php
  class Notebook {
    private $marca;
    private $status;

    public function __construct($marca)
    {
      $this->marca = $marca;
      $this->status = false;
    }

    private function statusNotebook() {
      $this->status = !$this->status;

      return $this->status ? 'Ligado' : 'Desligado';
    }

    public function ligarNotebook() {
      return "{$this->marca}: {$this->statusNotebook()}";
    }

    public function desligarNotebook() {
      return "{$this->marca}: {$this->statusNotebook()}";
    }
  }

  class Faculdade {
    private $notebook;

    public function __construct($notebook)
    {
      $this->notebook = $notebook;
    }

    public function iniciarAula($inicio) {
      echo "Inicio: {$inicio} <br />";
      echo "{$this->notebook->ligarNotebook()}";
    }

    public function terminarAula($termino) {
      echo "Termino: {$termino} <br />";
      echo "{$this->notebook->desligarNotebook()}";
    }
  }

  $notebook = new Notebook('Notebook');

  $faculdade = new Faculdade($notebook);
  echo '<br />';
  $faculdade->iniciarAula('19h00');
  echo '<br />';
  $faculdade->terminarAula('22h30');

  