<?php 
class Schema {
  private static $connection;
  private static $table;

  private function __construct() {}

  public static function setConnection(PDO $connection): void {
    self::$connection = $connection;
  }

  public static function setTable(string $table): void {
    self::$table = $table;
  }

  private static function sqlInsert(Array $dataInsert): string {
    $columns = implode(', ', array_keys($dataInsert));
    $params = ':' . implode(', :', array_keys($dataInsert));

    $lineSql = 'INSERT INTO ' . self::$table;
    $lineSql .= ' (' . $columns . ') VALUES (' . $params . ')'; 

    return $lineSql;
  }

  private static function sqlDelete(Array $dataDelete): string {
    $lineSql = 'DELETE FROM ' . self::$table . ' WHERE ';

    foreach ($$dataDelete as $key => $value) {
      $lineSql .= " {$key} = :{$key} AND";
    }

    $lineSql = rtrim($lineSql, 'AND');

    return $lineSql;
  }


  public static function insert(Array $dataInsert): bool {
    $lineInsert = self::sqlInsert($dataInsert);
    $stmt = self::$connection->prepare($lineInsert);

    foreach ($dataInsert as $key => $value) {
      $stmt->bindValue(':' . $key, $value);
    }

    $return = $stmt->execute();

    return $return;
  }

  public static function delete($dataDelete): bool {
      $lineDelete = self::sqlDelete($dataDelete);

      $stmt = self::$connection->prepare($lineDelete);

      foreach ($dataDelete as $key => $value) {
          $stmt->bindValue(':' . $key, $value);
      }

      $return = $stmt->execute();

      return $return;
  }
}


?>