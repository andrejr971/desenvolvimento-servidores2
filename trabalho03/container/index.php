<?php
  require_once 'repositories/implementations/ProductRepository.php';

  require_once 'controllers/CreateProductController.php';
  require_once 'controllers/ListAllProductsController.php';
  require_once 'controllers/UpdateProductController.php';
  require_once 'controllers/DeleteProductController.php';

  $product = new Product(Database::getConnection());
  $productRepository = new ProductRepository($product);

  $createProductController = new CreateProductController($productRepository);
  $listAllProductsController = new ListAllProductsController($productRepository);
  $updateProductController = new UpdateProductController($productRepository);
  $deleteProductController = new DeleteProductController($productRepository);