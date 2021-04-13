<?php
  class ListAllPeopleController {
    private IPeopleRepository $peopleRepository;

    public function __construct(IPeopleRepository $peopleRepository) {
      $this->peopleRepository = $peopleRepository;
    }

    public function handle() {
      $peoples = $this->peopleRepository->findAll();

      return Response::json($peoples);
    }
  }