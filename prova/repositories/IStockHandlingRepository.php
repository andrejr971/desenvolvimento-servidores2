<?php
  interface IStockHandlingRepository {
    public function findAll();
    public function create(Array $data);
  }