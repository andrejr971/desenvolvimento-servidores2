<?php
  abstract class People {
    private string $name = '';

    public function setName(string $name): void {
      $this->name = $name;
    }

    public function getName(): string {
      return $this->name;
    }

    abstract public function render(): void;
  }

  class Patient extends People {
    private string $cpf;
    private string $rg;
    private string $flat_number;

    public function __construct(string $name, string $cpf, string $rg, string $flat_number) {
      $this->name = $name;
      $this->cpf = $cpf;
      $this->rg = $rg;
      $this->flat_number = $flat_number;
    }

    public function getName(): string {
      return $this->name;
    }

    public function getCpf(): string {
      return $this->cpf;
    } 

    public function setCpf(string $cpf): void {
      $this->cpf = $cpf;
    }

    public function getRg(): string {
      return $this->rg;
    } 

    public function setRg(string $rg): void {
      $this->rg = $rg;
    }

    public function getFlatNumber(): string {
      return $this->flat_number;
    } 

    public function setFlatNumber(string $flat_number): void {
      $this->flat_number = $flat_number;
    }

    public function setName(string $name): void {
      $this->name = $name;
    } 

    public function render(): void {
      echo "Nome do paciente: {$this->getName()}<br />";
      echo "CPF do paciente: {$this->getCpf()}<br />";
      echo "RG do paciente: {$this->getRg()}<br />";
      echo "Número do plano: {$this->getFlatNumber()}<br />";
    }
  }

  class RadiologyTechnician extends People {
    private string $conter;

    public function __construct(string $name, string $conter) {
      $this->setName($name);
      $this->conter = $conter;
    }

    public function getConter(): string {
      return $this->conter;
    }

    public function setConter(string $conter): void {
      $this->conter = $conter;
    }

    public function render(): void {
      echo "Nome do Técnico/a: {$this->getName()}<br />";
      echo "Conter do técnico/a: {$this->getConter()}<br />";
    }
  }

  class Doctor extends People {
    private string $crm;

    public function __construct(string $name, string $crm) {
      $this->setName($name);
      $this->crm = $crm;
    }

    public function getCrm(): string {
      return $this->crm;
    }

    public function setCrm($crm): void {
      $this->crm = $crm;
    }

    public function render(): void {
      echo "Nome do médico/a: {$this->getName()}<br />";
      echo "CRM do médico/a: {$this->getCrm()}<br />";
    }
  }

  class Nurse extends People {
    private string $corim;

    public function __construct(string $name, string $corim) {
      $this->setName($name);
      $this->corim = $corim;
    }

    public function getCorim() {
      return $this->corim;
    }

    public function setCorim(string $corim) {
      $this->corim = $corim;
    }

    public function render(): void {
      echo "Nome do enfermeiro/a: {$this->getName()}<br />";
      echo "Corim do enfermeiro/a: {$this->getCorim()}<br />";
    }
  }
  
  class Attendant extends People {
    private string $register;

    public function __construct(string $name, string $register) {
      $this->setName($name);
      $this->register = $register;
    }

    public function getRegister(): string {
      return $this->register;
    }

    public function setRegister(string $register): void {
      $this->register = $register;
    }

    public function render(): void {
      echo "Nome do atendente/a: {$this->getName()}<br />";
      echo "Registro do atendente/a: {$this->getRegister()}<br />";
    }
  }