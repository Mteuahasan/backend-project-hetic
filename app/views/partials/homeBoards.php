<?php foreach ($boards as $board): ?>

  <h2><?php echo $board->name; ?></h2>
  <div class="description">
  <?php
  	$len = $board->description;
    echo $len;
  	$tronc = 15;
  	$post = substr($len, $tronc, 1);

		echo $post;
		$id = $board->id;
		echo '<br/> <a href="board/'.$id.'">Voir plus</a>';

  ?>
  </div>
  <div class="author"><?php echo $board->author ?></div>

<?php endforeach; ?>
