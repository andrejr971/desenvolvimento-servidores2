<?php
  abstract class Pessoa {
    private $nome;
    private $email;

    public function setNome($nome) {
      $this->nome = $nome;
    }

    public function getNome() {
      return $this->nome;
    }
    
    public function setEmail($email) {
      $this->email = $email;
    }

    public function getEmail() {
      return $this->email;
    }
  }

  class PessoaFisica extends Pessoa {
    private $cpf;

    public function __construct($nome, $email, $cpf) {
      $this->setNome($nome);
      $this->setEmail($email);
      $this->cpf = $cpf;
    }

    public function setCpf($cpf) {
      $this->cpf = $cpf;
    }

    public function getCpf() {
      return $this->cpf;
    }
  }

  class PessoaJuridica extends Pessoa {
    private $cnpj;

    public function __construct($nome, $email, $cnpj) {
      $this->setNome($nome);
      $this->setEmail($email);
      $this->cnpj = $cnpj;
    }
    
    public function setCnpj($cnpj) {
      $this->cnpj = $cnpj;
    }

    public function getCnpj() {
      return $this->cnpj;
    }
  }
