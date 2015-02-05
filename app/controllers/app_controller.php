<?php

namespace APP\CONTROLLERS;

class app_controller{

  private $tpl;
  private $model;
  private $boards;

  function __construct(){
    $this->model=new \APP\MODELS\app_model();
    $this->boardsModel = new \APP\MODELS\board_model();
  }

  public function home($f3){
    $this->tpl = 'main.php';
    $this->boards = $this->boardsModel->getBoards();
    $f3->set('boards',$this->boards);
  }

  public function afterroute(){
    echo \View::instance()->render($this->tpl);
  }

}

?>