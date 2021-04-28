<?php
  ini_set('display_errors', 1);

  require_once 'config/Response.php';
  require_once 'config/Request.php';
  require_once 'config/AppError.php';
  require_once 'pdo/index.php';
  require_once 'container/index.php';


  header('Access-Control-Allow-Origin: *');
  header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
  header("Access-Control-Allow-Headers: Origin, Content-Type");
  header('Content-Type: application/json');
  header('Access-Control-Max-Age: 86400');

  
  switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
      $createProductController->handle();
      break;
    case 'GET':
      $listAllStockHandlingController->handle();
      break;
    case 'PUT':
      $updateProductController->handle();
      break;
    default:
      (new AppError('Ops... method non exists', 404));
      break;
  }
