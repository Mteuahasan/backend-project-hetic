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



  /*******
  * Return the count of all the users
  *******/
  public function getAllUsers() {
    $allUsers = $this->getUsersMapper()->count();
    return $allUsers;
  }



  /*******
  * $data -> data from the signup form
  * Used for create an unser account
  *******/
  public function signup($data){
    if(isset($data) && !empty($data) && !empty($data['email'])){
      if(filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
        if(strlen($data['name']) > 3){
          if(strlen($data['password']) > 5){
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
                die($error);
              }
            } else {
              $error = 'Email already taken';
              die($error);
            }
          } else {
            $error = 'Password must be at leat 6 characters long';
            die($error);
          }
        } else {
          $error = 'Pseudo must be at leat 3 characters long';
          die($error);
        }
      } else {
        $error = "Email format invalid";
        die($error);
      }
    }
  }



  /*******
  * $data -> data from the login form
  * Used for login an user
  *******/
  public function login($data){
    $user = $this->getUsersMapper()->load(array('email=:email',':email'=>$data['email']));
    if($this->crypt->hash($data['password'], $this->f3->get('salt')) == $user['password']){
      return $user;
    } else {
      return "Password error";
    }
  }



  /*******
  * $id -> the id of the user
  * Return the boards that an user liked
  *******/
  public function userLikes($id) {
    $hasLiked = $this->getHasLikesMapper()->select('boards_id', 'users_id = "'.$id.'"');
    $likedBoards = array();

    $request = '';
    $boardLiked = array();

    foreach ($hasLiked as $like) {
      $request = $request.'id = "'.$like->boards_id.'" OR ';
    }

    $request = substr($request,0, -3);

    if(!empty($request)){
      $boardLiked = $this->getBoardsMapper()->select('*', $request);
    }

    // if(empty($boardLiked)) {
    //   echo 'You didn\'t like any boards';
    // }
    return $boardLiked;
  }



  /*******
  * $id -> the id of the user
  * Return the boards that an user added
  *******/
  public function usersBoards($id) {
    $usersBoard = $this->getBoardsMapper()->select('*', 'user_id = "'.$id.'"');

    // if(empty($usersBoard)) {
    //   echo "you do not have added any boards";
    // }
    return $usersBoard;
  }



  /*******
  * Get informations about an user
  *******/
  public function userProfil($id) {
    $usersProfil = $this->getUsersMapper()->select('*', 'id = "'.$id.'"');

    return $usersProfil;
  }



  /*******
  * $data -> data from the post
  * $params -> contain the id of the user
  * Update the user's profile
  *******/
  public function addurls($data, $params) {
      $addSite=$this->getUsersMapper();
      $addSite->load(array('id=?', $params['id']));
      
      if(!empty($_POST['site'])) {
        $addSite->website=$data['site'];
      }

      if(!empty($_POST['twitter'])) {
        $addSite->url_twitter=$data['twitter'];
      }

      if(!empty($_POST['facebook'])) {
        $addSite->url_facebook=$data['facebook'];
      }

      if(!empty($_POST['linkdin'])) {
        $addSite->url_linkdin=$data['linkdin'];
      }

      if(!empty($_POST['city'])) {
        $addSite->city=$data['city'];
      }

      if(!empty($_POST['description'])) {
        $addSite->description=$data['description'];
      }

      if(!empty($_POST['mail'])) {
        $addSite->email=$data['mail'];
      }

      if(!empty($_POST['name'])) {
        $addSite->name=$data['name'];
      }

      if(!empty($_POST['interest'])) {
        $addSite->interest=$data['interest'];
      }
 
      $addSite->update();
    }



  public function addImg($data, $filepath, $params) {
    $addImg=$this->getUsersMapper();
    $addImg->load(array('id=?', $params['id']));

    if(isset($filepath[0])) {
      $addImg->filepath=$filepath[0]['name'];
    }
    
    $addImg->update();
  }





  /*******
  * $post -> data from the post for checking the availability of the name
  * echo 0 if the name already exists and 1 if it don't
  *******/
  public function verifName($post){
    $user = $this->getUsersMapper()->load(array('name=:name',':name'=>$post));
    if(!$user){
      echo "1";
    } else {
      echo "0";
    }
  }



  /*******
  * $post -> data from the post for checking the availability of the email
  * echo 0 if the name already exists and 1 if it don't
  *******/
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