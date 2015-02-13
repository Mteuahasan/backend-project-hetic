<h1>Your profil :)</h1>

<?php 
if(isset($SESSION) && !empty($SESSION)){
	echo "Salut ".$SESSION['name'];
}

$id = $SESSION['id'];

// require('partials/homeBoards.php');

// foreach($boards as $board){
// 	echo $board->name;
// }

?>

<!-- <form action="#" method="post">
  <label for="website">Your website :</label><input type="text" name="website">
  <input type="submit" value="Add">
</form> -->




