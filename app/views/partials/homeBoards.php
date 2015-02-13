<?php foreach ($boards as $board): ?>

  <h2><?php echo $board->name; ?></h2>
  <div class="description">
  <?php 
  	$len = $board->description;
  	$tronc = 15;
  	$post = substr($len, $tronc, 1);
  		if($post !=" "){
  			while($post != " "){
  				$i = 1;
  				$tronc = $tronc + $i;
  				$len = $board->description;
  				$post = substr($len, $tronc, 1);
  			}
  		}
  		$post = substr($len, 0, $tronc);

  		echo $post;
  		$id = $board->id;
  		echo '<a href="../board/'.$id.'">Voir plus</a>';


  ?>
  </div>
  <div class="author"><?php echo $board->author ?></div>


<?php endforeach; ?>
