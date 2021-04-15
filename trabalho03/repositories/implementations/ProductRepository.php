<?php
  require_once 'repositories/IProductRepository.php';

  class ProductRepository implements IProductRepository {
    private Product $productEntity;

    public function __construct(Product $productEntity) {
      $this->productEntity = $productEntity;
    }

    public function findAll() {
      $sql = 'SELECT * FROM tb_produto';

      $peoples = $this->productEntity::select($sql, [], true);

      return $peoples;
    }

    public function findById($id) {
      $sql = 'SELECT * FROM tb_produto WHERE ID = :ID';

      $peoples = $this->productEntity::select($sql, ['ID' => $id], true);

      return $peoples;
    }

    public function create(Array $people) {
        try {
          $this->productEntity::insert($people);
        } catch(Exception $err) {
          return (new AppError('Failed to add a new record' . $err->getMessage(), 400))->exception();
        }
      
      return;
    }

    public function update(array $data, array $conditions): bool {
      return $this->productEntity::update($data, $conditions);
    }

    public function deleteById(array $data): bool {
      return $this->productEntity::delete($data);
    }
  }