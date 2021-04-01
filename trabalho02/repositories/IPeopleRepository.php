<?php
  interface IPeopleRepository {
    public function findByIdRotaImpar();
    public function countRegister(): int;
    public function firstId(): int;
    public function lastId(): int;
    public function create(): bool;
    public function update(Array $data, Array $conditions): bool;
    public function deleteByIdRota(Array $data): bool;
  }