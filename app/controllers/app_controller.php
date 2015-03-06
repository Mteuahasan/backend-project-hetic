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



  /*******
  * Controller for the landing page
  *******/
  public function landing($f3){
    if(!null == $f3->get('SESSION')){
      $f3->reroute('/home');
    } else {
      $this->tpl='landing.php';
      $this->user = $this->usersModel->getAllUsers();
      $f3->set('allUsers', $this->user);
    }
  }



  /*******
  * Controller for the home page
  *******/
  public function home($f3){
    $this->tpl = 'main.php';
    $f3->set('mostLikedBoards', $this->boardsModel->getMostLiked());
    $f3->set('mostLikedCategories', $this->boardsModel->getHomeCategories($this->boardsModel->getMostLiked()));
    $f3->set('mostCommentedBoards', $this->boardsModel->getMostCommented());
    $f3->set('mostCommentedCategories', $this->boardsModel->getHomeCategories($this->boardsModel->getMostCommented()));
    $f3->set('mostUnlikedBoards', $this->boardsModel->getMostUnliked());
    $f3->set('mostUnlikedCategories', $this->boardsModel->getHomeCategories($this->boardsModel->getMostUnliked()));
    $f3->set('allCategories', $this->boardsModel->getAllCategories());
  }



  /*******
  * Controller for the search feature
  *******/
  public function search($f3){
    $this->ajax = $f3->get('POST.ajax');
    $search = $this->model->search($f3->get('POST.search'));
    echo $search;
  }


  public function afterroute(){
    if(!$this->ajax) {
      echo \View::instance()->render($this->tpl);
    } else {

    }
  }

}

?>