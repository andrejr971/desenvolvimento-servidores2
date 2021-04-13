<?php
  ini_set('display_errors', 1);

  require_once 'pdo/index.php';
  require_once 'entities/index.php';
  require_once 'container/index.php';
  require_once 'classes/Response.php';
  require_once 'classes/Request.php';
  require_once 'classes/AppError.php';


  header('Access-Control-Allow-Origin: *');
  header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
  header("Access-Control-Allow-Headers: Origin, Content-Type");
  header('Content-Type: application/json');
  header('Access-Control-Max-Age: 86400');
  header('Content-Type: application/x-www-form-urlencoded');

  
  switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
      $createPeopleController->handle();
      break;
    case 'GET':
      $listAllPeoplesController->handle();
      break;
    case 'PUT':
      $updatePeopleController->handle();
      break;
    case 'DELETE':
      $deletePeopleController->handle();
      break;
    default:
      (new AppError('Ops... method nonexists', 404));
      break;
  }
