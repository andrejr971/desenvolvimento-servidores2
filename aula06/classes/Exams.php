<?php
  abstract class Exams {
    private int $code;

    public function getCode(): int {
      return $this->code;
    }

    public function setCode(int $code): void {
      $this->code = $code;
    }

    abstract public function render(): void;
  }

  class UrineAnalysis extends Exams {
    private string $urine;

    public function getUrine(): string {
      return $this->urine;
    }

    public function setUrine(string $urine): void {
      $this->urine = $urine;
    }

    public function render():void  {
      echo "Exame de Urina:";
      echo "<br />";
      echo "Código: {$this->getCode()}";
      echo "<br />";
      echo "Tipo: {$this->getUrine()}";
    }
  }

  class FecesAnalysis extends Exams {
    private string $feces;

    public function getFeces(): string {
      return $this->feces;
    }

    public function setFeces(string $feces): void {
      $this->feces = $feces;
    }

    public function render():void  {
      echo "Exame de Fezes:";
      echo "<br />";
      echo "Código: {$this->getCode()}";
      echo "<br />";
      echo "Tipo: {$this->getFeces()}";
    }
  }

  class BloodAnalysis extends Exams {
    private string $blood;

    public function getBlood(): string {
      return $this->blood;
    }

    public function setBlood(string $blood): void {
      $this->blood = $blood;
    }

    public function render():void  {
      echo "Exame de Sangue:";
      echo "<br />";
      echo "Código: {$this->getCode()}";
      echo "<br />";
      echo "Tipo: {$this->getBlood()}";
    }
  }