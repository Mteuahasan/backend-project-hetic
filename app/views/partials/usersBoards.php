<h1>Her are the boards you added</h1>

<?php foreach ($added as $add): ?>


<h3><?php echo $add->name ?></h3>
<div class="description">
<?php 
	$len = $add->description;
	$tronc = 15;
	$post = substr($len, $tronc, 1);
		if($post !=" "){
			while($post != " "){
				$i = 1;
				$tronc = $tronc + $i;
				$len = $add->description;
				$post = substr($len, $tronc, 1);
			}
		}
		$post = substr($len, 0, $tronc);

		echo $post;
		$id = $add->id;
		echo '<a href="board/'.$id.'">Voir plus</a>';


?>
</div>

<div class="author"><?php echo $add->author ?></div>

<span class="likes"><?php echo $add->likes ?> likes</span>


 
 
<?php endforeach; ?>
