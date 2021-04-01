<?php
  class SelectLastIdController {
    private SelectLastIdUseCase $selectLastIdUseCase;

    public function __construct(SelectLastIdUseCase $repository) {
      $this->selectLastIdUseCase = $repository;
    }

    public function handle(): int {
      return $this->selectLastIdUseCase->execute();
    }
  }