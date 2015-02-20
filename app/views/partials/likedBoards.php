<h1>Her are the boards you liked</h1>

<?php $j = 0; ?>
<?php foreach ($boardsLiked as $board): ?>
<?php $j++; ?>


<h3><?php echo $board[0]->name ?></h3>
<div class="description">
<?php
	echo $board[0]->description;


?>
</div>

<div class="author"><?php echo $board[0]->author ?></div>

<span class="likes"><?php echo $board[0]->likes ?> likes</span>

<?php endforeach; ?>
<div>You actualy have liked <i><?php echo $j; ?></i> boards</div>
