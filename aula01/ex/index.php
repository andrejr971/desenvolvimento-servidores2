<?php
  class Car {
    public $model;

    public function __construct()
    {
      $this->model = [];
    }

    public function index() {
      return $this->model;
    }

    public function store($data) {
      array_push($this->model, $data);

      return $data;
    }

    public function show($id) {
      $index = array_search($id, $this->model);

      return $this->model[$index];
    } 

    public function update($id, $data) {
      $index = array_search($id, $this->model);

      $this->model[$index] = $data;

      return $data;
    } 

    public function destroy ($id) {
      array_filter($id, $this->model);
    }
  }

  $car = new Car();

  echo $car->index();
  var_dump($car->store([
    'id' => 1,
    'name' => 'civic',
    'ano' => 2020
  ]));
  var_dump($car->show(1));
  var_dump($car->update(1, 
    [
      'id' => 1,
      'name' => 'civic',
      'ano' => 2021
    ])
  );
  $car->destroy(1);
?>