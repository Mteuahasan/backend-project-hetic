<h1>Her are the boards you liked</h1>

<?php foreach ($boards as $board): ?>


<h3><?php echo $board[0]->name ?></h3>
<div class="description">
<?php
	$len = $board[0]->description;
	$tronc = 15;
	$post = substr($len, $tronc, 1);

		echo $post;
		$id = $board[0]->id;
		echo '<a href="board/'.$id.'">Voir plus</a>';


?>
</div>

<div class="author"><?php echo $board[0]->author ?></div>

<span class="likes"><?php echo $board[0]->likes ?> likes</span>




<?php endforeach; ?>
