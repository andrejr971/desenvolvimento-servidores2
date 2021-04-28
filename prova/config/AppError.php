<?php
  class AppError {
    private int $statusCode;
    private string $message;

    public function __construct(string $message, $statusCode = 400) {
      $this->message = $message;
      $this->statusCode = $statusCode;
    }

    public function exception(): void {
      http_response_code($this->statusCode);

      echo json_encode([
        'status' => $this->statusCode,
        'message' => $this->message
      ]);
    }
  }