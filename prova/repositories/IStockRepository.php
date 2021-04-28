<?php
  interface IStockRepository {
    public function findAll();
    public function findById($id);
    public function create(Array $data);
    public function updateAmount(Array $data, Array $conditions): bool;
    public function deleteById(Array $data): bool;
  }