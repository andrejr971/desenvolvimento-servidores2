<?php

class UpdateLegalPeopleIdRotaUseCaseController {
  private UpdateLegalPeopleIdRotaUseCase $updateLegalPeopleIdRotaUseCase;
  
  public function __construct(UpdateLegalPeopleIdRotaUseCase $repository) {
    $this->updateLegalPeopleIdRotaUseCase = $repository;
  }
  
  public function handle(): bool {
      $conditions = ['TIPO' => 'JURIDICO'];

      $data = ['ID_ROTA' => ['=', 'ID']];
      
      return $this->updateLegalPeopleIdRotaUseCase->execute($data, $conditions);
    }
  }