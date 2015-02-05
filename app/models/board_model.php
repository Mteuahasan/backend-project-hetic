<?php

namespace APP\MODELS;

class board_model{

  private $f3;
  private $crypt;

  function __construct(){
    $this->f3=\Base::instance();
    $this->dB=new \DB\SQL('mysql:host='.$this->f3->get('db_host').';port='.$this->f3->get('db_port').';dbname='.$this->f3->get('db_name'),
    $this->f3->get('db_login'),$this->f3->get('db_password'));
    $this->crypt = \Bcrypt::instance();
  }

  function newBoard($data){
    var_dump($data);
    $session = $this->f3->get('SESSION');
    if(isset($data) && !empty($data)){
      if(!empty($data['name'])){
        if(!empty($data['description'])){
          $board=$this->getBoardsMapper();
          $board->name=$data['name'];
          $board->description=$data['description'];
          $board->author=$session['name'];
          $board->user_id=$session['id'];
          echo "<pre>";
          var_dump($board);
          echo "</pre>";
          $board->save();
          $this->f3->reroute('/');
        }
        else {
          $error = 'La description doit être renseignée';
          echo $error;
        }
      } else {
        $error = 'Le nom du board doit être renseigné';
        echo $error;
      }
    }
  }

  function getBoards(){
    $boards = $this->getBoardsMapper()->select('*');
    return $boards;
  }

  function getBoard($data){
    $board = $this->getBoardsMapper()->select('*', 'id = "'.$data.'"');
    return $board;
  }

  private function getBoardsMapper($table='boards'){
    return new \DB\SQL\Mapper($this->dB,$table);
  }
}

?>