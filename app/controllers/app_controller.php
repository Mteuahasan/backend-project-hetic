<?php

namespace APP\CONTROLLERS;

class app_controller{

  private $tpl;
  private $model;

  function __construct(){
    $this->model=new \APP\MODELS\app_model();
  }

  public function home(){
    $this->tpl = 'main.php';
  }

  public function afterroute(){
    echo \View::instance()->render($this->tpl);
  }

}

?>