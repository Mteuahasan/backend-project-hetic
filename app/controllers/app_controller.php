<?php

namespace APP\CONTROLLERS;

class app_controller{

  private $tpl;
  private $model;
  private $dataset;

  function __construct(){
    $this->model=new \APP\MODELS\app_model();
  }

  public function home(){
    $this->tpl = 'main.php';
  }

  public function signin(){
    $this->tpl = 'signin.php';
  }

  public function post_signin(){
    var_dump($_POST);
  }

  public function login(){
    $this->tpl = 'login.php';
  }

  public function post_login(){
    var_dump($_POST);
  }

  public function afterroute($f3){
    echo \View::instance()->render($this->tpl);
  }

}

?>