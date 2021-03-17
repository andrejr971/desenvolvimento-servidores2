<?php

class ItemPedido {
  private $codigo;
  private $descricao;
  private $valor;

  public function __construct($codigo, $descricao, $valor) {
    $this->codigo = $codigo;
    $this->descricao = $descricao;
    $this->valor = $valor;
  }

    public function setCodigo($codigo) {
    $this->codigo = $codigo;    
  }
  
  public function getCodigo() {
    return $this->codigo;
  }
  
  public function setDescricao($descricao) {
    $this->descricao = $descricao;    
  }

  public function getDescricao() {
    return $this->descricao;
  }
  
  public function setValor($valor) {
    $this->valor = $valor;    
  }

  public function getValor() {
    return $this->valor;
  }  
}
