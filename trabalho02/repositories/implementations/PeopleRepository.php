<?php
  require_once 'repositories/IPeopleRepository.php';

  class PeopleRepository implements IPeopleRepository {
    private People $peopleEntity;

    public function __construct(People $peopleEntity) {
      $this->peopleEntity = $peopleEntity;
    }

    public function findByIdRotaImpar() {
      $sql = 'SELECT * FROM tb_pessoa WHERE ID_ROTA % 2 = 1';

      $peoples = $this->peopleEntity::select($sql, [], true);

      return $peoples;
    }

    public function countRegister(): int {
      $sql = 'SELECT COUNT(*) AS COUNT FROM tb_pessoa';

      $count = $this->peopleEntity::select($sql, [], false);

      return $count->COUNT;
    }

    public function firstId(): int {
      $sql = 'SELECT ID FROM tb_pessoa LIMIT 1';

      $firstId = $this->peopleEntity::select($sql, [], false);

      return $firstId->ID;
    }

    public function lastId(): int {
      $sql = 'SELECT ID FROM tb_pessoa ORDER BY ID DESC LIMIT 1';

      $lastId = $this->peopleEntity::select($sql, [], false);

      return $lastId->ID;
    }

    public function create(): bool {
      for ($i = 1; $i <= 1000; $i++) { 
        $name = randomString(5);

        $data['NOME'] = $name;
        $data['EMAIL'] = "{$name}@gmail.com";
        
        if ($i % 2 === 1) {
          $data['TIPO'] = 'FISICA';
        } else {
          $data['TIPO'] = 'JURIDICO';
        }

        try {
          $this->peopleEntity::insert($data);
        } catch(Exception $e) {
          return false;
        }
      }
      
      return true;
    }

    public function update(array $data, array $conditions): bool {
      return $this->peopleEntity::update($data, $conditions);
    }

    public function deleteByIdRota(array $data): bool {
      return $this->peopleEntity::delete($data);
    }
  }