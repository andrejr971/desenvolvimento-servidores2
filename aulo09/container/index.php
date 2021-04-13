<?php
  require_once 'repositories/implementations/PeopleRepository.php';

  require_once 'controllers/CreatePeopleController.php';
  require_once 'controllers/ListAllPeopleController.php';
  require_once 'controllers/UpdatePeopleController.php';
  require_once 'controllers/DeletePeopleController.php';

  $people = new People(Database::getConnection());
  $peopleRepository = new PeopleRepository($people);

  $createPeopleController = new CreatePeopleController($peopleRepository);
  $listAllPeoplesController = new ListAllPeopleController($peopleRepository);
  $updatePeopleController = new UpdatePeopleController($peopleRepository);
  $deletePeopleController = new DeletePeopleController($peopleRepository);