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


  private function getUsersMapper($table='users'){
    return new \DB\SQL\Mapper($this->dB,$table);
  }
}

?>