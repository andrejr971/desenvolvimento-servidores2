<?php
  class CreateProductController {
    private IProductRepository $productRepository;

    public function __construct(IProductRepository $productRepository) {
      $this->productRepository = $productRepository;
    }

    public function handle() {
      $request = $_POST;

      $validation = Request::validator([
        'DESCRICAO',
        'VALOR',
        'STATUS'
      ]);

      if (!$validation) {
        return (new AppError('Parameters not passed', 401))->exception();
      }

      $request['VALOR'] = str_replace(',', '.', $request['VALOR']);

      try {
        $this->productRepository->create($request);
      } catch(Exception $err) {
        return (new AppError($err->getMessage(), 500))->exception();
      } 

      return Response::status(201);
    }
  }