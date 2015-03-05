<?php

namespace APP\CONTROLLERS;

class users_controller{

  private $tpl;
  private $model;
  private $ajax = NULL;

  function __construct(){
    $this->model=new \APP\MODELS\users_model();
  }



  /*******
  * Controller for the signup page
  *******/
  public function signup($f3){
    $this->tpl = 'signup.php';
    if($f3->get('VERB')=='POST'){
      $this->model->signup($f3->get('POST'));
      $f3->reroute('/home');
    }
  }



  /*******
  * Controller for the login page
  *******/
  public function login($f3){
    $this->tpl = 'login.php';
    if($f3->get('VERB')=='POST'){
      $auth=$this->model->login($f3->get('POST'));
      if(!is_string($auth)){
        $user=array(
          'id'=> $auth->id,
          'name'=> $auth->name,
        );
        $f3->set('SESSION', $user);
        $f3->reroute('/home');
      } else {
        echo $auth;
      }
    }
  }



  /*******
  * Controller for the user's profil page
  *******/
  public function getUserPage($f3, $params) {
    $this->tpl   = 'profile.php';
    $this->userLike = $this->model->userLikes($params['id']);
    $f3->set('boardsLiked', $this->userLike);
    $this->usersBoard = $this->model->usersBoards($params['id']);
    $f3->set('boardsAdded', $this->usersBoard);
  }

  /*******
  * Controller for the user's setting page
  *******/

  public function getUserSettings($f3, $params) {
    $this->tpl = 'settings.php';
    $this->userProfil = $this->model->userProfil($params['id']);
    $f3->set('users', $this->userProfil);

    if($f3->get('VERB')=='POST'){
      $this->model->addurls($f3->get('POST'), $params);
      $f3->reroute('/user/'.$params['id'].'/settings');
    }
  }

  public function getUserAbout($f3, $params) {
    $this->tpl = 'about.php';
  }



  /*******
  * Logout the user
  *******/
  public function logout($f3){
    session_start();
    session_destroy();
    $f3->reroute('/home');
  }


  /*******
  * Function used for checking the availability of the username
  *******/
  public function verifName($f3){
    $this->ajax = $f3->get('POST.ajax');
    $response = $this->model->verifName($f3->get('POST.name'));
  }



  /*******
  * Function used for checking the availability of the mail
  *******/
  public function verifEmail($f3){
    $this->ajax = $f3->get('POST.ajax');
    $response = $this->model->verifEmail($f3->get('POST.email'));
  }

  public function afterroute(){
    if(!$this->ajax) {
      echo \View::instance()->render($this->tpl);
    } else if(isset($_GET)){
    }
  }
}

?>