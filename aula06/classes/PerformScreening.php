<?php
  class PerformScreening {
    private Nurse $nurse;
    private String $pression;
    private float $temperature;

    public function __construct(Nurse $nurse) {
      $this->nurse = $nurse;
    }

    public function getPression(): string {
      return $this->pression;
    }

    public function setPression(String $pression): void {
      $this->pression = $pression;
    }

    public function getTemperature(): float {
      return $this->temperature;
    }

    public function setTemperature(float $temperature): void {
      $this->temperature = $temperature;
    }

    public function render() {
      echo "Enfermeiro/a: {$this->nurse->getName()}<br />";
      echo "Temperatura: {$this->temperature} ºC <br />";
      echo "Pressão: {$this->pression} <br />";
    }
  }