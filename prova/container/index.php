<?php
  require_once 'repositories/implementations/StockRepository.php';
  require_once 'repositories/implementations/StockHandlingRepository.php';

  require_once 'controllers/CreateProductController.php';
  require_once 'controllers/ListAllStockHandlingController.php';
  require_once 'controllers/UpdateProductController.php';
  
  $stockRepository = new StockRepository(Database::getConnection());
  $stockHandlingRepository = new StockHandlingRepository(Database::getConnection());

  $listAllStockHandlingController = new ListAllStockHandlingController($stockHandlingRepository);
  $createProductController = new CreateProductController($stockRepository);
  $updateProductController = new UpdateProductController($stockRepository, $stockHandlingRepository);