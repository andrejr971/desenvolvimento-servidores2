<?php
  require_once 'repositories/IPeopleRepository.php';

  class PeopleRepository implements IPeopleRepository {
    private People $peopleEntity;

    public function __construct(People $peopleEntity) {
      $this->peopleEntity = $peopleEntity;
    }

    public function findAll() {
      $sql = 'SELECT * FROM tb_pessoa';

      $peoples = $this->peopleEntity::select($sql, [], true);

      return $peoples;
    }

    public function findById($id) {
      $sql = 'SELECT * FROM tb_pessoa WHERE ID = :ID';

      $peoples = $this->peopleEntity::select($sql, ['ID' => $id], true);

      return $peoples;
    }

    public function create(Array $people) {
        try {
          $this->peopleEntity::insert($people);
        } catch(Exception $err) {
          return (new AppError('Failed to add a new record' . $err->getMessage(), 400))->exception();
        }
      
      return;
    }

    public function update(array $data, array $conditions): bool {
      return $this->peopleEntity::update($data, $conditions);
    }

    public function deleteById(array $data): bool {
      return $this->peopleEntity::delete($data);
    }
  }