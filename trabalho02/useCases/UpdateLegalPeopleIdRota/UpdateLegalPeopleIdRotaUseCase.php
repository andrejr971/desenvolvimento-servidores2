<?php
  class UpdateLegalPeopleIdRotaUseCase {
    private IPeopleRepository $peopleRepository;

    public function __construct(IPeopleRepository $peopleRepository) {
      $this->peopleRepository = $peopleRepository;
    }

    public function execute(Array $data, Array $condition, string $sql = ''): bool {
      return $this->peopleRepository->update($data, $condition, $sql);
    }
  }