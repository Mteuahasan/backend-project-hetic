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
  private $filepath = array();
  private $comments;

  function __construct(){
    $this->model=new \APP\MODELS\board_model();
    $this->usersModel=new \APP\MODELS\users_model();
  }

  /*******
  * Upload system for the image and controller for the new board page
  *******/
  public function newBoard($f3){
    if(!null == $f3->get('SESSION')){
      $this->tpl        = 'new-board.php';
      $this->categories = $this->model->getAllCategories();
      $f3->set('categories', $this->categories);
      if($f3->get('VERB')=='POST'){
        $this->web = \Web::instance();
        $files = $_FILES;
        $maxsize = 5242880;
        $canUpload = true;
        foreach ($files as $file) {
          if($file['size'] <= $maxsize) {
            $files = $this->web->receive(function($file){
              if(pathinfo($file['name'],PATHINFO_EXTENSION) == "png" || pathinfo($file['name'],PATHINFO_EXTENSION) == 'jpg' || pathinfo($file['name'],PATHINFO_EXTENSION) == 'jpeg'){
                array_push($this->filepath, $file);
              } else {
                echo "Non non petit malin, il ne faut pas toucher au html ! <a href='home'>Allez reviens à l'accueil</a>";
                die();
              }
              return true;
            },true,true);
          } else {
            $canUpload = false;
          }
        }
        if($canUpload){

          $this->model->newBoard($f3->get('POST'), $this->filepath);
          $f3->reroute('/user/'.$f3->get('SESSION')['id']);
        } else {
          echo "File's max weight is 5Mo";
        }
      }
    } else {
      $f3->set('error_permissions', true);
      $f3->reroute('/signup');
    }
  }


  /*******
  * Controller for the single board's page
  *******/
  public function singleBoard($f3, $params){
    $this->tpl              = 'single-board.php';
    $this->board            = $this->model->getBoard($params['id']);
    $this->boardCategories  = $this->model->getBoardCategories($params['id']);
    $this->comments         = $this->model->getComments($params['id']);
    $f3->set('board', $this->board);
    $f3->set('boardCategories', $this->boardCategories);
    $f3->set('comments', $this->comments);
    if($f3->get('VERB')=='POST'){
      $this->model->newBoard($f3->get('POST'));
    }
  }


  /*******
  * Controller for the categories's pages
  *******/
  public function getSelectedCategory($f3, $params) {
    $this->tpl = 'selectedBoardCategory.php';
    $this->boardCategories  = $this->model->getSelectedBoardCategory($params['id'], 20, $params['page']);
    $f3->set('categoryboards', $this->boardCategories);
    $f3->set('categories', $this->model->getHomeCategories($this->model->getSelectedBoardCategory($params['id'], 20, $params['page'])));
    $f3->set('categorie', $this->model->getCategorieName($params['id']));
  }


  /*******
  * Controller for the likes's system
  *******/
  public function likes($f3, $params){
    $response = $this->model->likes($f3->get('POST.like'), $params);
    echo $response;
  }



  /*******
  * Controller for the gallery page
  *******/
  public function gallery($f3){
    $this->tpl = 'gallery.php';
    $get = $f3->get('GET');
    if(isset($get['category']) && isset($get['sortby']) && $get['page']){
      $boards = $this->model->getGalleryBoards($get['category'], $get['sortby'], 20, $get['page']);
      $categories = $this->model->getHomeCategories($this->model->getGalleryBoards($get['category'], $get['sortby'], 20, $get['page']));
      $allCategories = $this->model->getAllCategories();
      $count = $this->model->countBoardsGallery($get['category']);
      $pageNumber = ceil($count/20);
      $f3->set('pageNumber', $pageNumber);
      $f3->set('count', $count);
      $f3->set('boards', $boards);
      $f3->set('categories', $categories);
      $f3->set('allCategories', $allCategories);
    }
  }



  /*******
  * Controller for the comments's system
  *******/
  public function newComment($f3, $params){
    $response = $this->model->newComment($f3->get('POST.content'), $params);
    echo $response;
  }

  public function afterroute($f3){
    $this->userProfil = $this->usersModel->userProfil($f3->get('SESSION.id'));
    $f3->set('users', $this->userProfil);

    if($f3->get('AJAX')){
    } else {
      echo \View::instance()->render($this->tpl);
    }
  }
}

?>