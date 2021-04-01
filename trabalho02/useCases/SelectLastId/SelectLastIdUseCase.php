<?php
  class SelectLastIdUseCase {
    private IPeopleRepository $peopleRepository;

    public function __construct(IPeopleRepository $peopleRepository) {
      $this->peopleRepository = $peopleRepository;
    }

    public function execute(): int {
      $count = $this->peopleRepository->lastId();

      return $count;
    }
  }