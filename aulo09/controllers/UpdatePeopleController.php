<?php
  class UpdatePeopleController {
    private IPeopleRepository $peopleRepository;

    public function __construct(IPeopleRepository $peopleRepository) {
      $this->peopleRepository = $peopleRepository;
    }

    public function handle() {
      $id = Request::params();

      $people = $this->peopleRepository->findById($id);

      if (empty($people)) {
        return (new AppError('People non exists', 404))->exception();
      }

      $request = Request::body();
      
      try {
        $this->peopleRepository->update($request, ['ID' => intval($id)]);
      } catch(Exception $err) {
        return (new AppError($err->getMessage(), 500))->exception();
      } 

      return Response::status(202);
    }
  }