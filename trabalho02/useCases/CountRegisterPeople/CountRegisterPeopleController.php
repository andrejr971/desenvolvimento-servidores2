<?php
  class CountRegisterPeopleController {
    private CountRegisterPeopleUseCase $countRegisterPeopleUseCase;

    public function __construct(CountRegisterPeopleUseCase $repository) {
      $this->countRegisterPeopleUseCase = $repository;
    }

    public function handle(): int {
      return $this->countRegisterPeopleUseCase->execute();
    }
  }