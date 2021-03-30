<?php
  ini_set('display_errors', 1);

  require_once 'classes/Database.php';
  require_once 'classes/Schema.php';
  // require_once 'controller/ListPeoplesController.php';

  $conection = Database::getConnection();

  $dataInsert = ['NOME' => 'vinicius', 'EMAIL' => 'v@gmail.com', 'TIPO' => 'JURIDICO'];

  $dataDelete = ['ID' => 37];

  Schema::setConnection($conection);
  Schema::setTable('tb_pessoa');

  $peolpe = Schema::insert($dataInsert) . '<br><br>';

  if ($peolpe) {
    echo 'SUCESSO';
  } else {
      echo 'ERRO';
  }