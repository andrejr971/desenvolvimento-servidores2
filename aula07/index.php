<?php
  require_once 'classes/Database.php';
  require_once 'controller/ListPeoplesController.php';

  $conection = Database::getConnection();
  $listPeoples = new ListPeoplesController($conection);
  var_dump($listPeoples->handle());
