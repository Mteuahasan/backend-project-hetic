<h1>Her are the boards you liked</h1>

<?php $j = 0; ?>
<?php foreach ($boardsLiked as $board): ?>
<?php $j++; ?>


<h3><?php echo $board[0]->name ?></h3>
<div class="description">
<?php
	$len = $board[0]->description;
	$tronc = 15;
	$post = substr($len, $tronc, 1);

		echo $post;
		$board_id = $board[0]->id;
		echo '<a href="board/'.$board_id.'">See more</a>';


?>
</div>

<div class="author"><?php echo $board[0]->author ?></div>

<span class="likes"><?php echo $board[0]->likes ?> likes</span>

<?php endforeach; ?>
<div>You actualy have liked <i><?php echo $j; ?></i> boards</div>
