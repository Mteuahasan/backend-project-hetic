<?php

namespace APP\MODELS;

class users_model{

  private $f3;
  private $crypt;

  function __construct(){
    $this->f3=\Base::instance();
    $this->dB=new \DB\SQL('mysql:host='.$this->f3->get('db_host').';port='.$this->f3->get('db_port').';dbname='.$this->f3->get('db_name'),
    $this->f3->get('db_login'),$this->f3->get('db_password'));
    $this->crypt = \Bcrypt::instance();
  }


  public function signin($data){
    if(isset($data) && !empty($data)){
      $email = $this->getUsersMapper()->select('*', 'email = "'.$data['email'].'"');
      if(!$email){
        if($data['password'] == $data['password-2']){
          $user=$this->getUsersMapper();
          $user->name=$data['name'];
          $user->email=$data['email'];
          $user->password=$this->crypt->hash($data['password'], $this->f3->get('salt'));
          $user->save();
        }
        else {
          $error = 'Passwords must be similar';
          echo $error;
        }
      } else {
        $error = 'Email already taken';
        echo $error;
      }
    }
  }


  public function login($data){
    $user = $this->getUsersMapper()->load(array('email=:email',':email'=>$data['email']));
    if($this->crypt->hash($data['password'], $this->f3->get('salt')) == $user['password']){
      return $user;
    } else {
      return "Erreur de mot de passe";
    }
  }

  // public function addWebsite($data){
  //   if(!empty($data['website'])){
  //     $site=$this->getUsersMapper();
  //     $site->website=$data['website'];
  //     $site->save();
  //   }
  // }

  public function userLikes() {
    $user_id = $this->f3->get('SESSION')['id'];
    $hasLiked = $this->getHasLikesMapper()->select('boards_id', 'users_id = "'.$user_id.'"');
    $likedBoards = array();
    
    foreach($hasLiked as $key) {
      $boardLiked = $this->getBoardsMapper()->select('*', 'id = "'.$key->boards_id.'"');
      array_push($likedBoards, $boardLiked);
    }

    return $likedBoards;
  }



  public function verifName($post){
    $user = $this->getUsersMapper()->load(array('name=:name',':name'=>$post));
    if(!$user){
      echo "1";
    } else {
      echo "0";
    }
  }


  public function verifEmail($post){
    $email = $this->getUsersMapper()->load(array('email=:email',':email'=>$post));
    if(!$email){
      echo "1";
    } else {
      echo "0";
    }
  }


  private function getUsersMapper($table='users'){
    return new \DB\SQL\Mapper($this->dB,$table);
  }

  private function getHasLikesMapper($table='users_has_likes'){
    return new \DB\SQL\Mapper($this->dB,$table);
  }

  private function getBoardsMapper($table='boards'){
    return new \DB\SQL\Mapper($this->dB,$table);
  }

}

?>