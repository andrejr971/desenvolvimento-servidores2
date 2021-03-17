<?php

  require_once 'Class.Pessoa.php';
  require_once 'Class.ItemPedido.php';

  class Pedido {
    private $numeroPedido;
    private $dataPedido;
    private $valorTotal;
    private $cliente;
    private $itens = [];

    public function __construct(Pessoa $pessoa) {
      $this->valorTotal = 0;
      $this->numeroPedido = 2345;
      $this->dataPedido = date('d/m/Y');
      $this->setCliente($pessoa);
    }

    public function setCliente (Pessoa $pessoa) {
      $this->cliente = $pessoa;
    }

    public function getValorTotal() {
      return $this->valorTotal;
    }

    public function addItem (ItemPedido $item) {
      $this->itens[] = $item;
      $this->calculoTotal();
    }

    public function removeItem (ItemPedido $item) {
      $indice = 0;
      foreach($this->itens as $itemTemp):
        if ($item->getCodigo() == $itemTemp->getCodigo()):
          unset($this->itens[$indice]);
        endif;
        $indice++;
      endforeach;

      $this->calculoTotal();
    }  

    public function calculoTotal() {
      $this->valorTotal = 0;
      foreach($this->itens as $item):
        $this->valorTotal += $item->getValor();
      endforeach;
    }

    public function getPedido() {
      echo 'Nome cliente: ' . $this->cliente->getNome() . '<br>';
      echo 'Número pedido: ' . $this->numeroPedido . '<br>';
      echo 'Data pedido: ' . $this->dataPedido . '<br>';
      foreach($this->itens as $item):
        echo 'Cód: ' . $item->getCodigo() . ' - ' . $item->getDescricao() . ' - R$ ' . $item->getValor() . '<br>';
      endforeach;
      echo '<strong>Valor total R$ </strong>' . $this->getValorTotal();
    }
  }
