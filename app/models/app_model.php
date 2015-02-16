<?php

namespace APP\MODELS;

class app_model{

  function __construct(){
    $f3=\Base::instance();
    $this->dB=new \DB\SQL('mysql:host='.$f3->get('db_host').';port='.$f3->get('db_port').';dbname='.$f3->get('db_name'),
    $f3->get('db_login'),$f3->get('db_password'));
  }


  public function getPage(){

  }


  public function search($post){
    $response = $this->getBoardsMapper()->find(
      array('name LIKE :name or description LIKE :description or tags LIKE :tags or author LIKE :author',':name'=>'%'.$post.'%',':description'=>'%'.$post.'%',':tags'=>'%'.$post.'%',':author'=>'%'.$post.'%'),
      array('order'=>'id DESC'));
    $searchs = array();
    foreach ($response as $resp) {
      $search = array('name'=>$resp->name, 'description'=>$resp->description, 'author'=>$resp->author, 'likes'=>$resp->likes, 'date'=>$resp->date, 'filepath'=>$resp->filepath, 'tags'=>$resp->tags);
      array_push($searchs, $search);
    }
    echo(json_encode($searchs));
  }


  private function getBoardsMapper($table='boards'){
    return new \DB\SQL\Mapper($this->dB,$table);
  }
}

?>