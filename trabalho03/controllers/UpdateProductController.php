<?php
  class UpdateProductController {
    private IProductRepository $productRepository;

    public function __construct(IProductRepository $productRepository) {
      $this->productRepository = $productRepository;
    }

    public function handle() {
      $id = Request::params();

      if (!is_numeric($id)) {
        return (new AppError('Param is not numeric', 500))->exception();
      }

      $product = $this->productRepository->findById($id);

      if (empty($product)) {
        return (new AppError('Product non exists', 404))->exception();
      }

      $request = Request::body();
      
      try {
        $this->productRepository->update($request, ['ID' => intval($id)]);
      } catch(Exception $err) {
        return (new AppError($err->getMessage(), 500))->exception();
      } 

      return Response::status(202);
    }
  }