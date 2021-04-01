<?php
  class DeletePeopleUseCase {
    private IPeopleRepository $peopleRepository;

    public function __construct(IPeopleRepository $peopleRepository) {
      $this->peopleRepository = $peopleRepository;
    }

    public function execute(Array $conditions): bool {
      return $this->peopleRepository->deleteByIdRota($conditions);
    }
  }