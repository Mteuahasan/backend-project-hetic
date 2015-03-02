<?php

namespace APP\CONTROLLERS;

class app_controller{

  private $tpl;
  private $model;
  private $boards;
  private $ajax = NULL;

  function __construct(){
    $this->model=new \APP\MODELS\app_model();
    $this->boardsModel = new \APP\MODELS\board_model();
    $this->usersModel = new \APP\MODELS\users_model();
  }

  public function landing($f3){
    $this->tpl='landing.php';
    $this->user = $this->usersModel->getAllUsers();
    $f3->set('allUsers', $this->user);
  }

  public function home($f3){
    $this->tpl = 'main.php';
    $this->boards = $this->boardsModel->getHomeBoards();
    $f3->set('mostLikedBoards', $this->boardsModel->getMostLiked());
    $f3->set('mostLikedCategories', $this->boardsModel->getMostLikedCategories());
    $f3->set('boards',$this->boards);
    $this->boardCategories  = $this->boardsModel->getBoardCategory();
    $f3->set('cat', $this->boardCategories);
  }

  public function search($f3){
    $this->ajax = $f3->get('POST.ajax');
    $search = $this->model->search($f3->get('POST.search'));
    echo $search;
  }


  public function getPage($f3, $param = 1){
    $boards = $this->boardsModel->getPageBoards($param['page']);
    echo "<pre>";
    var_dump($boards);
    echo "</pre>";
  }

  public function afterroute(){
    if(!$this->ajax) {
      echo \View::instance()->render($this->tpl);
    } else {

    }
  }

}

?>