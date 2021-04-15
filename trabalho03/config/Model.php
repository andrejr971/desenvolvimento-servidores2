<?php
  class Model {
    private static PDO $pdo;
    private static string $table;

    private function __construct() {}

    public static function setConnection(PDO $connection): void {
      self::$pdo = $connection;
    }

    private static function sqlInsert(Array $data): string {
      $columns = implode(', ', array_keys($data));
      $params = ':' . implode(', :', array_keys($data));
  
      $lineSql = 'INSERT INTO ' . self::$table;
      $lineSql .= ' (' . $columns . ') VALUES (' . $params . ')'; 
  
      return $lineSql;
    }

    private static function sqlUpdate(Array $data,  Array $conditions): string {
      $lineSql = 'UPDATE ' . self::$table . ' SET ';
  
      foreach ($data as $key => $value) {
        if (is_array($value)) {
          $lineSql .= " {$key}";
          foreach ($value as $v) {
            $lineSql .= " {$v}";
          }

          $lineSql .= " ,";
        } else { 
          $lineSql .= " {$key} = :{$key} ,";
        }
      }
  
      $lineSql = rtrim($lineSql, ', ');
  
      $lineSql .= ' WHERE ';
  
      foreach ($conditions as $key => $value) {
        if (is_array($value)) {
          $lineSql .= " {$key}";
          foreach ($value as $v) {
            $lineSql .= " {$v}";
          }

          $lineSql .= " AND";
        } else { 
          $lineSql .= " {$key} = :{$key} AND";
        }
      }
  
      $lineSql =  rtrim($lineSql, 'AND');
  
      return $lineSql;
    }

    private static function sqlDelete(Array $data): string {
      $lineSql = 'DELETE FROM ' . self::$table . ' WHERE ';
  
      foreach ($data as $key => $value) {
        if (is_array($value)) {
          $lineSql .= " {$key}";
          foreach ($value as $v) {
            $lineSql .= " {$v}";
          }

          $lineSql .= " AND";
        } else { 
          $lineSql .= " {$key} = :{$key} AND";
        }
      }
  
      $lineSql = rtrim($lineSql, 'AND');
  
      return $lineSql;
    }

    public static function setTable(string $table): void {
      self::$table = $table;
    }

    public static function select(string $sql, $conditions, $fetchAll) {
      $stmt = self::$pdo->prepare($sql);

      foreach($conditions as $key => $value) {
        $stmt->bindValue(':' . $key, $value);
      }
  
      $stmt->execute();
  
      if ($fetchAll) {
        return $stmt->fetchAll(PDO::FETCH_OBJ);
      } else {
        return $stmt->fetch(PDO::FETCH_OBJ);
      }
    }

    public static function insert(Array $data): bool {
      $lineInsert = self::sqlInsert($data);
      $stmt = self::$pdo->prepare($lineInsert);
  
      foreach ($data as $key => $value) {
        $stmt->bindValue(':' . $key, $value);
      }
  
      $return = $stmt->execute();
  
      return $return;
    }

    public static function update(Array $data, Array $conditions): bool {
      $lineUpdate = self::sqlUpdate($data, $conditions);
      $stmt = self::$pdo->prepare($lineUpdate);
      
      foreach ($data as $key => $value) {
        if (!is_array($value)) {
          $stmt->bindValue(':' . $key, $value);
        }
      }
    
      foreach ($conditions as $key => $value) {
        if (!is_array($value)) {
          $stmt->bindValue(':' . $key, $value);
        }
      }

      $return = $stmt->execute();

  
      return $return;
    }

    public static function delete(Array $data): bool {
      $lineDelete = self::sqlDelete($data);

      $stmt = self::$pdo->prepare($lineDelete);

      foreach ($data as $key => $value) {
        if (!is_array($value)) {
          $stmt->bindValue(':' . $key, $value);
        }
      }

      $return = $stmt->execute();

      return $return;
    }
  }