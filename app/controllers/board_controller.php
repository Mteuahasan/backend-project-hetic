<?php

namespace APP\CONTROLLERS;

class board_controller{

  private $tpl;
  private $model;
  private $boards;
  private $board;

  function __construct(){
    $this->model=new \APP\MODELS\board_model();
  }

  public function newBoard($f3){
    $this->tpl = 'new-board.php';
    if($f3->get('VERB')=='POST'){
      $this->model->newBoard($f3->get('POST'));
    }
  }

  public function singleBoard($f3, $params){
    $this->tpl = 'single-board.php';
    $this->board = $this->model->getBoard($params['id']);
    $f3->set('board', $this->board);
    if($f3->get('VERB')=='POST'){
      $this->model->newBoard($f3->get('POST'));
    }
  }

  public function afterroute(){
    echo \View::instance()->render($this->tpl);
  }
}

?>