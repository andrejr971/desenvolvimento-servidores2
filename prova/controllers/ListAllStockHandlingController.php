<?php
  class ListAllStockHandlingController {
    private IStockHandlingRepository $stockHandlingRepository;

    public function __construct(IStockHandlingRepository $stockHandlingRepository) {
      $this->stockHandlingRepository = $stockHandlingRepository;
    }

    public function handle() {
      $products = $this->stockHandlingRepository->findAll();

      return Response::json($products);
    }
  }