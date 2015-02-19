<h1>Your profil :)</h1>

<?php 
if(isset($SESSION) && !empty($SESSION)){
	echo "Salut ".$SESSION['name'];
}

$id = $SESSION['id'];






require('partials/likedBoards.php');
require('partials/usersBoards.php');



?>

<div><a href="<?php echo $id ?>/profil">Your profil</a></div>





