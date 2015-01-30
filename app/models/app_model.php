<?php

namespace APP\MODELS;

class app_model{

  function __construct(){
    $f3=\Base::instance();
    $this->dB=new \DB\SQL('mysql:host='.$f3->get('db_host').';port='.$f3->get('db_port').';dbname='.$f3->get('db_name'),
    $f3->get('db_login'),$f3->get('db_password'));
  }

}

?>