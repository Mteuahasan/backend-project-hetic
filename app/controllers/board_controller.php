<?php

namespace APP\CONTROLLERS;

class board_controller{

  private $tpl;
  private $model;
  private $boards;
  private $board;
  private $categories;
  private $boardCategories;
  private $web;
  private $filepath;

  function __construct(){
    $this->model=new \APP\MODELS\board_model();
  }

  public function newBoard($f3){
    if(!empty($f3->get('SESSION'))){
      $this->tpl        = 'new-board.php';
      $this->categories = $this->model->getAllCategories();
      $f3->set('categories', $this->categories);
      if($f3->get('VERB')=='POST'){
        $this->web = \Web::instance();
        $file = $_FILES;
        $files = $this->web->receive(function($file){
          $this->filepath = $file['name'];
          return true;
        },true,true);
        $this->model->newBoard($f3->get('POST'), $this->filepath);
      }
    } else {
      $f3->set('error_permissions', true);
      $f3->reroute('/signin');
    }
  }

  public function singleBoard($f3, $params){
    $this->tpl              = 'single-board.php';
    $this->board            = $this->model->getBoard($params['id']);
    $this->boardCategories  = $this->model->getBoardCategories($params['id']);
    $f3->set('board', $this->board);
    $f3->set('boardCategories', $this->boardCategories);
    if($f3->get('VERB')=='POST'){
      $this->model->newBoard($f3->get('POST'));
    }
  }

  public function likes($f3, $params){
    $response = $this->model->likes($f3->get('POST.like'), $params);
    echo $response;
  }

  public function newComment($f3, $params){
    $response = $this->model->newComment($f3->get('POST.content'), $params);
    echo $response;
  }

  public function afterroute($f3){
    if($f3->get('AJAX')){
    } else {
      echo \View::instance()->render($this->tpl);
    }
  }
}

?>