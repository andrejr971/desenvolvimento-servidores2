<?php
  ini_set('display_errors', 1);

  require_once 'database/Database.php';
  require_once 'classes/Schema.php';
  // require_once 'controller/ListPeoplesController.php';

  $conection = Database::getConnection();

  $data = ['EMAIL' => 'atualizado@gmail.com', 'TIPO' => 'FISICA'];

  $codition =  ['ID' => 2];

  Schema::setConnection($conection);
  Schema::setTable('tb_pessoa');

  // $peolpe = Schema::update($data, $codition) . '<br><br>';

  $sql = 'SELECT * FROM tb_pessoa';
  $peoples = Schema::select($sql, [], true);

  print_r($peoples);

  // if ($peolpe) {
  //   echo 'SUCESSO';
  // } else {
  //     echo 'ERRO';
  // }