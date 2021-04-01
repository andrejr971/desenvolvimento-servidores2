<?php
  ini_set('display_errors', 1);

  require_once 'database/index.php';
  require_once 'entities/index.php';
  require_once 'utils/randomString.php';

  require_once 'container/index.php';

  // $createPeoples = $createPeopleController->handle();
  // echo $createPeoples ? 'SUCESSO NA CRIAÇÃO' : 'FALHA NA CRIAÇÃO';
  // echo '<br />';

  // $updatePeople = $updateLegalPeopleIdRotaUseCaseController->handle();
  // echo $updatePeople ? 'SUCESSO NA ATUALIZAÇÃO' : 'FALHA NA ATUALIZAÇÃO';
  // echo '<br />';

  // $deletePeople = $deletePeopleController->handle();
  // echo $deletePeople ? 'SUCESSO AO DELETAR' : 'FALHA AO DELATAR';
  // echo '<br />';

  // $listAllOdd = $listPeoplesController->handle();
  // echo json_encode($listAllOdd);


  $countRegister = $countRegisterPeopleController->handle();
  echo "Total de registros: {$countRegister}";
  echo '<br />';

  $firstId = $selectFirstIdController->handle();
  echo "Primeiro ID: {$firstId}";
  echo '<br />';

  $lastId = $selectLastIdController->handle();
  echo "Último ID: {$lastId}";
  echo '<br />';