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
          $this->f3->reroute('/');
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

  private function getUsersMapper($table='users'){
    return new \DB\SQL\Mapper($this->dB,$table);
  }

}

?>