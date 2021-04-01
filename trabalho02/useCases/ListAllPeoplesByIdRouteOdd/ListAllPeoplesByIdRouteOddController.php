<?php
  class ListAllPeoplesByIdRouteOddController {
    private ListAllPeoplesByIdRouteOddUseCase $listAllPeoplesByIdRouteOddUseCase;

    public function __construct(ListAllPeoplesByIdRouteOddUseCase $repository) {
      $this->listAllPeoplesByIdRouteOddUseCase = $repository;
    }

    public function handle() {
      return $this->listAllPeoplesByIdRouteOddUseCase->execute();
    }
  }