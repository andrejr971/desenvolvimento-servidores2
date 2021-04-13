<?php
  class Request {
    public static function body() {
      return (Array) json_decode(file_get_contents('php://input'));
    }

    public static function params() {
      $explode = basename($_SERVER['REQUEST_URI']);
      return $explode;
    }
  }