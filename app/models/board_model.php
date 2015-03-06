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


  /*******
  * $data -> data from the form
  * $filepath -> array with the different filepaths for the images
  * Get the fourth most liked boards for the home page
  *******/
  function newBoard($data, $filepath){
    $session = $this->f3->get('SESSION');
    if(isset($data) && !empty($data)){
      if(!empty($data['name'])){
        if(!empty($data['description'])){
          if(!empty($data['categories'])){
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
            foreach ($data['categories'] as $category) {
              $this->dB->exec('INSERT INTO boards_has_categories VALUES (:boards_id, :categories_id)', array(':boards_id'=>$board['id'],':categories_id'=>$category));
            }
          }
          else{
            $error = "No category";
            echo $error;
          }
        }
        else {
          $error = 'Description is needed';
          echo $error;
        }
      } else {
        $error = 'Comic\'s name needed';
        echo $error;
      }
    }
  }


  /*******
  * Get the fourth most liked boards for the home page
  *******/
  function getMostLiked(){
    $boards = $this->getBoardsMapper()->select('*',NULL , array(
      'group'=>NULL,
      'order'=>'likes DESC',
      'limit'=>4,
      'offset'=>0
    ));
    return $boards;
  }



  /*******
  * Get the fourth most commented boards for the home page
  *******/
  function getMostCommented(){
    $boards = $this->getBoardsMapper()->select('*',NULL , array(
      'group'=>NULL,
      'order'=>'commentNumber DESC',
      'limit'=>4,
      'offset'=>0
    ));
    return $boards;
  }



  /*******
  * Get the fourth most unliked boards for the home page
  *******/
  function getMostUnliked(){
    $boards = $this->getBoardsMapper()->select('*',NULL , array(
      'group'=>NULL,
      'order'=>'likes ASC',
      'limit'=>4,
      'offset'=>0
    ));
    return $boards;
  }


  /*******
  * $boards -> group of boards
  * Return the categories of a group of boards
  *******/
  function getHomeCategories($boards){
    $categories = array();
    $category = array();
    foreach ($boards as $board) {
      $cate = $this->getBoardCategories($board->id);
      foreach ($cate as $cat) {
        array_push($category, array("categorie" => $cat->name));
      }
      array_push($categories, $category);
      $category = array();
    }
    return $categories;
  }


  /*******
  * $id -> board's id
  * Return a specific board's informations
  *******/
  function getBoard($id){
    $board = $this->getBoardsMapper()->select('*', 'id = "'.$id.'"');
    if(!empty($board)){
      return $board;
    } else {
      $this->f3->error(404);
    }
  }


  /*******
  * $id -> category's id
  * $pagination -> number of boards to display
  * $page -> current page
  * Used for the categories pages
  *******/
  function getSelectedBoardCategory($id, $pagination, $page) {
    $hasCategorieMapper = $this->getHasCategoriesMapper();
    $boardsMapper = $this->getBoardsMapper();

    $selectedCategory = $hasCategorieMapper->select('*', 'categories_id = "'.$id.'"');

    $request = "";

    foreach ($selectedCategory as $cat) {
      $request = $request.'id = '.$cat->boards_id.' OR ';
    }

    $request = substr($request,0,-3);
    $request = $request.' LIMIT '.$pagination.' OFFSET '.($page - 1) * $pagination;

    $boards = $boardsMapper->select('*', $request);

    return $boards;
  }


  /*******
  * $id -> board's id
  * Get the categories of a specific board
  *******/
  function getBoardCategories($id){
    $categories_id = $this->getHasCategoriesMapper()->select('*', 'boards_id = "'.$id.'"');
    $request = '';

    foreach($categories_id as $category){
         $request = $request.'id = '.$category->categories_id.' OR ';
    }

    $request = substr($request, 0, -4);

    $cats = $categoriesMapper = $this->getCategoriesMapper()->select('*', $request);

    return $cats;
  }


  /*******
  * Get all the categories
  *******/
  function getAllCategories(){
    $categories = $this->getCategoriesMapper()->select('*');
    return $categories;
  }


  /*******
  * $id -> category's id
  * Return the name of a specific category
  *******/
  function getCategorieName($id){
    return $this->getCategoriesMapper()->select('name', 'id = '.$id);
  }



  /*******
  * $post -> data of the post
  * $params -> contain informations about the current board
  * Makes the likes system work
  *******/
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



  /*******
  * $post -> data of the post
  * $params -> contain the informations about the current board
  * Makes the comment system work
  *******/
  function newComment($post, $params){
    $commentsMapper = $this->getCommentsMapper();
    $commentsMapper->content = $post;
    $commentsMapper->author = $this->f3->get('SESSION')['name'];
    $commentsMapper->date = date("Y-m-d H:i:s");
    $commentsMapper->board_id = $params['id'];
    $commentsMapper->save();
    $board = $this->getBoardsMapper();
    $board->load(array('id=?', $params['id']));
    $comments = $board->get('commentNumber');
    $board->set('commentNumber', $comments + 1);
    $board->save();
    $response = array('content'=>$post, 'author'=>$this->f3->get('SESSION')['name'], 'date'=>date("Y-m-d H:i:s"));
    echo json_encode($response);
  }



  /*******
  * $param -> current board's id
  * Return comments for a specific board
  *******/
  function getComments($param){
    $commentsMapper = $this->getCommentsMapper();
    $response = $commentsMapper->select('*', 'board_id = "'.$param.'"', array('order'=>'id DESC'));
    return $response;
  }



  /*******
  * $category -> selected category's id
  * $sortby -> selected sort way
  * Return comments for a specific board
  *******/
  function getGalleryBoards($category, $sortby, $pagination, $page){
    $hasCategorieMapper = $this->getHasCategoriesMapper();
    $boardsMapper = $this->getBoardsMapper();
    $selectedCategory = $hasCategorieMapper->select('*', 'categories_id = "'.$category.'"');

    if($category != 'all'){
      $request = "";
      foreach ($selectedCategory as $cat) {
        $request = $request.'id = '.$cat->boards_id.' OR ';
      }
      $request = substr($request, 0, -4);
      if($sortby == 'unliked'){
        $request = $request.' ORDER BY likes ASC limit '.$pagination.' OFFSET '.($page - 1) * $pagination;
      } else {
        $request = $request.' ORDER BY '.$sortby.' DESC limit '.$pagination.' OFFSET '.($page - 1) * $pagination;
      }
      $boards = $boardsMapper->select('*', $request);
    } else {
      if($sortby == 'unliked'){
        $boards = $this->getBoardsMapper()->select('*',NULL , array(
             'group'=>NULL,
             'order'=>'likes ASC',
             'limit'=>$pagination,
             'offset'=>($page-1)*$pagination
           ));
      } else {
        $boards = $this->getBoardsMapper()->select('*',NULL , array(
             'group'=>NULL,
             'order'=>$sortby.' DESC',
             'limit'=>$pagination,
             'offset'=>($page-1)*$pagination
           ));
      }
    }

    return $boards;
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