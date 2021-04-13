<?php
  class CreatePeopleController {
    private IPeopleRepository $peopleRepository;

    public function __construct(IPeopleRepository $peopleRepository) {
      $this->peopleRepository = $peopleRepository;
    }

    public function handle() {
      $request = $_POST;

      if (!isset($request['NOME']) || !isset($request['EMAIL']) || !isset($request['TIPO'])) {
        return (new AppError('Parameters not passed', 401))->exception();
      }

      try {
        $this->peopleRepository->create($request);
      } catch(Exception $err) {
        return (new AppError($err->getMessage(), 500))->exception();
      } 

      return Response::status(201);
    }
  }