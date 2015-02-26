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


  function newBoard($data, $filepath){
    $session = $this->f3->get('SESSION');
    if(isset($data) && !empty($data)){
      if(!empty($data['name'])){
        if(!empty($data['description'])){
          $board=$this->getBoardsMapper();
          $board->name=$data['name'];
          $board->description=$data['description'];
          $board->author=$session['name'];
          $board->user_id=$session['id'];
          if(isset($filepath[0])){
            $board->filepath=$filepath[0]['name'];
          }
          if(isset($filepath[1])){
            $board->filepath2=$filepath[1]['name'];
          }
          if(isset($filepath[2])){
            $board->filepath3=$filepath[2]['name'];
          }
          if(isset($filepath[3])){
            $board->filepath4=$filepath[3]['name'];
          }
          if(isset($filepath[4])){
            $board->filepath5=$filepath[4]['name'];
          }
          $board->date=date("Y-m-d H:i:s");
          $board->tags=$data['tags'];
          $board->save();
          foreach ($data['categories'] as $categorie) {
            $has_categories=$this->getHasCategoriesMapper();
            $has_categories->boards_id = $board['id'];
            $has_categories->categories_id = $categorie;
            $has_categories->save();
          }
          $this->f3->reroute('/home');
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


  function getHomeBoards(){
    $boards = $this->getBoardsMapper()->select('*',NULL , array(
      'group'=>NULL,
      'order'=>'id DESC',
      'limit'=>10,
      'offset'=>0
    ));
    return $boards;
  }


  function getPageBoards($page){
    $pagination = 10;
    $offset = ($page - 1) * $pagination;
    $boards = $this->getBoardsMapper()->select('*',NULL , array(
      'group'=>NULL,
      'order'=>'id DESC',
      'limit'=>$pagination,
      'offset'=>$offset
    ));
    echo "<pre>";
    var_dump($boards);
    echo "</pre>";
    return $boards;
  }


  function getBoard($data){
    $board = $this->getBoardsMapper()->select('*', 'id = "'.$data.'"');
    if(!empty($board)){
      return $board;
    } else {
      $this->f3->error(404);
    }
  }

  function getBoardCategory() {
    $get_categories = $this->getCategoriesMapper()->select('*');
    $table['categories']=array();
    $table['boards']=array();

    foreach($get_categories as $get_categorie) {
      $idCat = $get_categorie->id;

      $nameCat = array(
      'id'=> $get_categorie->id,
      'categories_name'=>$get_categorie->name

      );
      array_push($table['categories'], $nameCat);

      $get_hasCategories = $this->getHasCategoriesMapper()->select('*', 'categories_id = "'.$idCat.'"');
      foreach($get_hasCategories as $get_hasCategorie) {
        $id_hasCat = $get_hasCategorie->boards_id;

        $get_boards = $this->getBoardsMapper()->select('*', 'id = "'.$id_hasCat.'"');
        foreach($get_boards as $get_board) {
          $boards_name = $get_board->name;

          $board_name = array(
          'boards_id'=>$get_hasCategorie->boards_id,
          'boards_name'=>$get_board->name,
          'category_id'=>$get_hasCategorie->categories_id
          );

          array_push($table['boards'],$board_name);

        }
      }
    }

    var_dump($table);
    return $table;
  }





  function getBoardCategories($data){
    $categories_id = $this->getHasCategoriesMapper()->select('*', 'boards_id = "'.$data.'"');
    $categories = array();
    $request = '';

    foreach($categories_id as $categorie){
         $request = $request.'id = '.$categorie->categories_id.' OR ';
    }

    $request = substr($request, 0, -4);
    return $categoriesMapper = $this->getCategoriesMapper()->select('*', $request);
  }


  function getAllCategories(){
    $categories = $this->getCategoriesMapper()->select('*');
    return $categories;
  }


  function likes($post, $params){
    $SESSION = $this->f3->get('SESSION');
    $canLike = "";
    if(!empty($SESSION)){
      $user_id = $this->f3->get('SESSION')['id'];
      $hasLiked = $this->getHasLikesMapper()->select('*', 'users_id = "'.$user_id.'"');
      foreach ($hasLiked as $key) {
        if (intval($key['boards_id']) === intval($params['id'])){
          $canLike = 0;
        }
      }
      if($canLike !== 0){
        if($post == '1'){
          $board=$this->getBoardsMapper();
          $board->load(array('id=?', $params['id']));
          $likes = $board->get('likes');
          $board->set('likes', $likes + 1);
          $response = $likes + 1;
          $board->update();
          $hasLikedMapper = $this->getHasLikesMapper();
          $hasLikedMapper->users_id = $user_id;
          $hasLikedMapper->boards_id = $params['id'];
          $hasLikedMapper->save();
          return $response;
        } else if ($post == '-1') {
          $board=$this->getBoardsMapper();
          $board->load(array('id=?', $params['id']));
          $likes = $board->get('likes');
          $board->set('likes', $likes + (-1));
          $response = $likes - 1;
          $board->save();
          $hasLikedMapper = $this->getHasLikesMapper();
          $hasLikedMapper->users_id = $user_id;
          $hasLikedMapper->boards_id = $params['id'];
          $hasLikedMapper->save();
          return $response;
        } else {
          return 'error';
        }
      } else {
        $error = 'Un seul vote authorisé';
        return $error;
      }
    }
    $error = 'Vous devez être loggué';
    return $error;
  }


  function newComment($post, $params){
    $commentsMapper = $this->getCommentsMapper();
    $commentsMapper->content = $post;
    $commentsMapper->author = $this->f3->get('SESSION')['name'];
    $commentsMapper->date = date("Y-m-d H:i:s");
    $commentsMapper->board_id = $params['id'];
    $commentsMapper->save();
    $response = array('content'=>$post, 'author'=>$this->f3->get('SESSION')['name'], 'date'=>date("Y-m-d H:i:s"));
    echo json_encode($response);
  }


  function getComments($param){
    $commentsMapper = $this->getCommentsMapper();
    $response = $commentsMapper->select('*', 'board_id = "'.$param.'"', array('order'=>'id DESC'));
    return $response;
  }


  private function getBoardsMapper($table='boards'){
    return new \DB\SQL\Mapper($this->dB,$table);
  }
  private function getCategoriesMapper($table='categories'){
    return new \DB\SQL\Mapper($this->dB,$table);
  }
  private function getHasCategoriesMapper($table='boards_has_categories'){
    return new \DB\SQL\Mapper($this->dB,$table);
  }
  private function getHasLikesMapper($table='users_has_likes'){
    return new \DB\SQL\Mapper($this->dB,$table);
  }
  private function getCommentsMapper($table='comments'){
    return new \DB\SQL\Mapper($this->dB,$table);
  }
}

?>