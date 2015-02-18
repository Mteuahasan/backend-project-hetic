<?php

namespace APP\CONTROLLERS;

class api_controller{

  private $tpl;
  private $model;
  private $ajax = NULL;

  function __construct(){
    $this->model=new \APP\MODELS\api_model();
  }

  public function getUserPage($f3, $params) {
    $user = $this->model->getUser($params['id']);
    echo $user;
    // $this->userLike = $this->model->userLikes($params['id']);
    // $f3->set('boards', $this->userLike);


    // if($f3->get('VERB')=='POST'){
    //   $this->model->addWebsite($f3->get('POST'));
    // }

  }
}

?>