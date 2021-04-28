<?php
  require_once 'config/Model.php';
  require_once 'repositories/IStockRepository.php';

  class StockRepository extends Model implements IStockRepository {
    public function __construct($connection) {
      self::setConnection($connection);
    }

    public function findAll() {
      $sql = 'SELECT * FROM estoque';

      $stock = self::select($sql, [], true);

      return $stock;
    }

    public function findById($id) {
      $sql = 'SELECT * FROM estoque WHERE id = :id';

      $stock = self::select($sql, ['id' => $id], true);

      return $stock;
    }

    public function create(Array $data) {
        try {
          self::insert($data, 'estoque');
        } catch(Exception $err) {
          return (new AppError('Failed to add a new record ' . $err->getMessage(), 400))->exception();
        }
      
      return;
    }

    public function updateAmount(array $data, array $conditions): bool {
      return self::update($data, $conditions, 'estoque');
    }

    public function deleteById(array $data): bool {
      return self::delete($data, 'estoque');
    }
  }