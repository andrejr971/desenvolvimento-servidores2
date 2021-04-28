<?php
  class Request {
    public static function body() {
      if ($_POST) {
        return $_POST;
      }
      
      return (Array) json_decode(file_get_contents('php://input'));
    }

    public static function params() {
      $explode = basename($_SERVER['REQUEST_URI']);
      return $explode;
    }

    public static function validator(Array $validations) {
      $body = self::body();
      $verify = true;

      foreach ($validations as $validation) {
        if (!array_key_exists($validation, $body)) {
          $verify = false;
        }
      }

      return $verify;
    }
  }