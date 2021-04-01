<?php
  class ListAllPeoplesByIdRouteOddUseCase {
    private IPeopleRepository $peopleRepository;

    public function __construct(IPeopleRepository $peopleRepository) {
      $this->peopleRepository = $peopleRepository;
    }

    public function execute() {
      $peoples = $this->peopleRepository->findByIdRotaImpar();

      return $peoples;
    }
  }