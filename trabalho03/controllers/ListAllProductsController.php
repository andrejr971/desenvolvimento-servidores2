<?php
  class ListAllProductsController {
    private IProductRepository $productRepository;

    public function __construct(IProductRepository $productRepository) {
      $this->productRepository = $productRepository;
    }

    public function handle() {
      $id = Request::params();

      if (is_numeric($id)) {
        $product = $this->productRepository->findById($id);

      if (empty($product)) {
        return (new AppError('Product not found', 404))->exception();
      }

        return Response::json($product);
      }

      $products = $this->productRepository->findAll();

      return Response::json($products);
    }
  }