<?php
  class UpdateProductController {
    private IStockRepository $stockRepository;
    private IStockHandlingRepository $stockHandlingRepository;

    public function __construct(
      IStockRepository $stockRepository, 
      IStockHandlingRepository $stockHandlingRepository
    ) {
      $this->stockRepository = $stockRepository;
      $this->stockHandlingRepository = $stockHandlingRepository;
    }


    public function handle() {
      $id = Request::params();

      if (!is_numeric($id)) {
        return (new AppError('Param is not numeric', 500))->exception();
      }

      $validation = Request::validator([
        'tipo',
        'saldo_atual'
      ]);

      if (!$validation) {
        return (new AppError('Parameters not passed', 401))->exception();
      }

      $product = $this->stockRepository->findById($id);
      $product = $product[0];

      if (empty($product)) {
        return (new AppError('Product non exists', 404))->exception();
      }

      $request = Request::body();
      
      try {
        if ($request['tipo'] === 'ENTRADA') {
          $amount = $product->saldo_atual + $request['saldo_atual'];
        } else if ($request['tipo'] === 'SAIDA') {
          if ($product->saldo_atual <= 0) {
            return (new AppError('Missing product', 400))->exception();
          }

          $amount = $product->saldo_atual - $request['saldo_atual'];
        } else {
          return (new AppError('Operation type not valid', 400))->exception();
        }

        $data = [
          'saldo_atual' => $amount,
        ];

        $this->stockRepository->updateAmount($data, ['id' => intval($id)]);

        $data = [
          'id_produto' => $id,
          'saldo_antes' => $product->saldo_atual,
          'saldo_depois' => $amount,
          'qtde' => $request['saldo_atual'],
          'tipo' => $request['tipo']
        ];

        $this->stockHandlingRepository->create($data, ['id' => intval($id)]);
      } catch(Exception $err) {
        return (new AppError($err->getMessage(), 500))->exception();
      } 

      return Response::status(202);
    }
  }