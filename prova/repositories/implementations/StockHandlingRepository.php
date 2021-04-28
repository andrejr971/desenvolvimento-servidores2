<?php
  require_once 'repositories/IStockHandlingRepository.php';

  class StockHandlingRepository extends Model  implements IStockHandlingRepository{
    public function __construct($connection) {
      self::setConnection($connection);
    }

    public function findAll() {
      $sql = 'SELECT * FROM movimentacao_estoque';

      $stock = self::select($sql, [], true);

      return $stock;
    }

    public function create(Array $data) {
      try {
        self::insert($data, 'movimentacao_estoque');
      } catch(Exception $err) {
        return (new AppError('Failed to add a new record ' . $err->getMessage(), 400))->exception();
      }
    
    return;
  }
  }