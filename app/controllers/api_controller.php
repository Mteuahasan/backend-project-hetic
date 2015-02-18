<?php

namespace APP\CONTROLLERS;

class api_controller{

  private $tpl;
  private $model;
  private $ajax = NULL;

  function __construct(){
    $this->model=new \APP\MODELS\api_model();
  }

  public function getUser($f3, $params) {
    $user = $this->model->getUser($params['id']);
    echo $user;
  }

  public function getBoard($f3, $params) {
    $board = $this->model->getBoard($params['id']);
    echo $board;
  }
}

?>