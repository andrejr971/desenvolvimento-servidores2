<?php
  class CreatePeopleUseCase {
    private IPeopleRepository $peopleRepository;

    public function __construct(IPeopleRepository $peopleRepository) {
      $this->peopleRepository = $peopleRepository;
    }

    public function execute(): bool {
      $insert = $this->peopleRepository->create();

      return $insert;
    }
  }