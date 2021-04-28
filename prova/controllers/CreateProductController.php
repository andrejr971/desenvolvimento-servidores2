<?php
  class CreateProductController {
    private IStockRepository $stockRepository;

    public function __construct(IStockRepository $stockRepository) {
      $this->stockRepository = $stockRepository;
    }

    public function handle() {
      $request = $_POST;

      $validation = Request::validator([
        'descricao',
        'saldo_atual'
      ]);

      if (!$validation) {
        return (new AppError('Parameters not passed', 401))->exception();
      }

      $request['saldo_atual'] = str_replace(',', '.', $request['saldo_atual']);

      try {
        $this->stockRepository->create($request);
      } catch(Exception $err) {
        return (new AppError($err->getMessage(), 500))->exception();
      } 

      return Response::status(201);
    }
  }