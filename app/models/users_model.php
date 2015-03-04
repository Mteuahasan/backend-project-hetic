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

  public function getAllUsers() {
    $allUsers = $this->getUsersMapper()->select('*');
    return $allUsers;
  }


  public function signup($data){
    if(isset($data) && !empty($data) && !empty($data['email'])){
      $email = $this->getUsersMapper()->select('*', 'email = "'.$data['email'].'"');
      if(!$email){
        if($data['password'] == $data['password-2']){
          $user=$this->getUsersMapper();
          $user->name=$data['name'];
          $user->surname=$data['surname'];
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
      return "Password error";
    }
  }

  public function userLikes() {
    $user_id = $this->f3->get('SESSION')['id'];
    $hasLiked = $this->getHasLikesMapper()->select('boards_id', 'users_id = "'.$user_id.'"');
    $likedBoards = array();

    $request = '';

    foreach ($hasLiked as $like) {
      $request = $request.'id = "'.$like->boards_id.'" OR ';
    }

    $request = substr($request,0, -3);

    $boardLiked = $this->getBoardsMapper()->select('*', $request);

    if(empty($boardLiked)) {
      echo 'You didn\'t like any boards';
    }
    return $boardLiked;
  }

  public function usersBoards() {
    $user_id = $this->f3->get('SESSION')['id'];
    $usersBoard = $this->getBoardsMapper()->select('*', 'user_id = "'.$user_id.'"');
    if(empty($usersBoard)) {
      echo 'Kikikikiki';
    }
      return $usersBoard;
  }

  public function userProfil() {
    $user_id = $this->f3->get('SESSION')['id'];
    $usersProfil = $this->getUsersMapper()->select('*', 'id = "'.$user_id.'"');

    return $usersProfil;
  }

  public function addurls($data, $params) {
      $addSite=$this->getUsersMapper();
      $addSite->load(array('id=?', $params['id']));
      $addSite->website=$data['site'];
      $addSite->url_twitter=$data['twitter'];
      $addSite->url_facebook=$data['facebook'];
      $addSite->url_linkdin=$data['linkdin'];
      $addSite->update();


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