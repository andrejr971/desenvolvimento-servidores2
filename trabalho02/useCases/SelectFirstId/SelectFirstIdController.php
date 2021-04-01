<?php
  class SelectFirstIdController {
    private selectFirstIdUseCase $selectFirstIdUseCase;

    public function __construct(selectFirstIdUseCase $repository) {
      $this->selectFirstIdUseCase = $repository;
    }

    public function handle(): int {
      return $this->selectFirstIdUseCase->execute();
    }
  }