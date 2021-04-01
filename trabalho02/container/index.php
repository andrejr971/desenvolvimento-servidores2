<?php
  require_once 'repositories/implementations/PeopleRepository.php';

  require_once 'useCases/ListAllPeoplesByIdRouteOdd/ListAllPeoplesByIdRouteOddUseCase.php';
  require_once 'useCases/ListAllPeoplesByIdRouteOdd/ListAllPeoplesByIdRouteOddController.php';

  require_once 'useCases/CreatePeople/CreatePeopleController.php';
  require_once 'useCases/CreatePeople/CreatePeopleUseCase.php';

  require_once 'useCases/UpdateLegalPeopleIdRota/UpdateLegalPeopleIdRotaUseCase.php';
  require_once 'useCases/UpdateLegalPeopleIdRota/UpdateLegalPeopleIdRotaUseCaseController.php';

  require_once 'useCases/DeletePeople/DeletePeopleUseCase.php';
  require_once 'useCases/DeletePeople/DeletePeopleController.php';

  require_once 'useCases/CountRegisterPeople/CountRegisterPeopleUseCase.php';
  require_once 'useCases/CountRegisterPeople/CountRegisterPeopleController.php';

  require_once 'useCases/SelectLastId/SelectLastIdUseCase.php';
  require_once 'useCases/SelectLastId/SelectLastIdController.php';

  require_once 'useCases/SelectFirstId/SelectFirstIdUseCase.php';
  require_once 'useCases/SelectFirstId/SelectFirstIdController.php';


  $people = new People(Database::getConnection());
  $peopleRepository = new PeopleRepository($people);
  
  $listPeoplesUseCase = new ListAllPeoplesByIdRouteOddUseCase($peopleRepository);
  $listPeoplesController = new ListAllPeoplesByIdRouteOddController($listPeoplesUseCase);

  $createPeopleUseCase = new CreatePeopleUseCase($peopleRepository);
  $createPeopleController = new CreatePeopleController($createPeopleUseCase);

  $updateLegalPeopleIdRotaUseCase = new UpdateLegalPeopleIdRotaUseCase($peopleRepository);
  $updateLegalPeopleIdRotaUseCaseController = new UpdateLegalPeopleIdRotaUseCaseController($updateLegalPeopleIdRotaUseCase);

  $deletePeopleUseCase = new DeletePeopleUseCase($peopleRepository);
  $deletePeopleController = new DeletePeopleController($deletePeopleUseCase);

  $countRegisterPeopleUseCase = new CountRegisterPeopleUseCase($peopleRepository);
  $countRegisterPeopleController = new CountRegisterPeopleController($countRegisterPeopleUseCase);

  $selectLastIdUseCase = new SelectLastIdUseCase($peopleRepository);
  $selectLastIdController = new SelectLastIdController($selectLastIdUseCase);

  $selectFirstIdUseCase = new SelectFirstIdUseCase($peopleRepository);
  $selectFirstIdController = new SelectFirstIdController($selectFirstIdUseCase);