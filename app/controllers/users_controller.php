<?php

namespace APP\CONTROLLERS;

class users_controller{

  private $tpl;
  private $model;
  private $ajax = NULL;

  function __construct(){
    $this->model=new \APP\MODELS\users_model();
  }


  public function signin($f3){
    $this->tpl = 'signin.php';
    if($f3->get('VERB')=='POST'){
      $this->model->signin($f3->get('POST'));
    }
  }


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
        $f3->reroute('/');
      } else {
        echo $auth;
      }
    }
  }


  public function logout($f3){
    session_start();
    session_destroy();
    $f3->reroute('/');
  }


  public function verifName($f3){
    $this->ajax = $f3->get('POST.ajax');
    $response = $this->model->verifName($f3->get('POST.name'));
  }


  public function verifEmail($f3){
    $this->ajax = $f3->get('POST.ajax');
    $response = $this->model->verifEmail($f3->get('POST.email'));
  }

  public function afterroute(){
    if(!$this->ajax) {
      echo \View::instance()->render($this->tpl);
    } else {

    }
  }
}

?>