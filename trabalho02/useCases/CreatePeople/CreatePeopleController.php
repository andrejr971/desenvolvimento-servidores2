<?php
  class CreatePeopleController {
    private CreatePeopleUseCase $createPeopleUseCase;

    public function __construct(CreatePeopleUseCase $repository) {
      $this->createPeopleUseCase = $repository;
    }

    public function handle(): bool {
      return $this->createPeopleUseCase->execute();
    }
  }