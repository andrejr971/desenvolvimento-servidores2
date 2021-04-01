<?php

class DeletePeopleController {
  private DeletePeopleUseCase $deletePeopleUseCase;
  
  public function __construct(DeletePeopleUseCase $repository) {
    $this->deletePeopleUseCase = $repository;
  }
  
  public function handle(): bool {
      $conditions = ['ID_ROTA' => ['% 2 =', '0'], 'ID' => ['>', '300']];
      
      return $this->deletePeopleUseCase->execute($conditions);
    }
  }