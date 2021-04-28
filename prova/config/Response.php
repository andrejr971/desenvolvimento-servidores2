<?php 
  class Response {
    public static function status($statusCode) {
      http_response_code($statusCode);
    }

    public static function json($response) {
      echo json_encode($response);
    }
  }