<?php

namespace APP\MODELS;

class api_model{

  private $f3;
  private $crypt;

  function __construct(){
    $this->f3=\Base::instance();
    $this->dB=new \DB\SQL('mysql:host='.$this->f3->get('db_host').';port='.$this->f3->get('db_port').';dbname='.$this->f3->get('db_name'),
    $this->f3->get('db_login'),$this->f3->get('db_password'));
    $this->crypt = \Bcrypt::instance();
  }

  function getUser($id){
    $userTable = $this->getUsersMapper()->select('*', 'id = "'.$id.'"');
    if(!empty($userTable)){
      $user = array('id'=>$userTable[0]->id, 'name'=>$userTable[0]->name, 'email'=>$userTable[0]->email);
      return json_encode($user);
    } else {
      return 'An error occured the id must be invalid';
    }
  }

  function getBoard($id){
    $boardTable = $this->getBoardsMapper()->select('*', 'id = "'.$id.'"');
    if(!empty($boardTable)){
      $board = array('id'=>$boardTable[0]->id, 'name'=>$boardTable[0]->name, 'description'=>$boardTable[0]->description, 'author'=>$boardTable[0]->author, 'likes'=>$boardTable[0]->likes, 'filepath'=>substr(__DIR__, 0, -10).$boardTable[0]->filepath, 'date'=>$boardTable[0]->date, 'tags'=>$boardTable[0]->tags);
      return json_encode($board);
    } else {
      return 'An error occured the id must be invalid';
    }
  }


  private function getUsersMapper($table='users'){
    return new \DB\SQL\Mapper($this->dB,$table);
  }
  private function getBoardsMapper($table='boards'){
    return new \DB\SQL\Mapper($this->dB,$table);
  }
}

?>