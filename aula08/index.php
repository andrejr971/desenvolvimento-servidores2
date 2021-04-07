<?php
  ini_set('display_errors', 1);

  require_once 'mysql/index.php';
  require_once 'classes/Schema.php';

  $connection = Database::getConnection();
  Schema::setConnection($connection);

  $uri = basename($_SERVER['REQUEST_URI']);
  echo $uri;

  $dados_put = file_get_contents('php://input');
  parse_str($dados_put, $_PUT);

  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo 'a';
    http_response_code(200);
  }