<?php
  interface IPeopleRepository {
    public function findAll();
    public function findById($id);
    public function create(Array $people);
    public function update(Array $data, Array $conditions): bool;
    public function deleteById(Array $data): bool;
  }