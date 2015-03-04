<?php foreach ($boardsLiked as $like): ?>
	<a href="board/<?php echo $like[0]->id ?>" class="single-board-home likedBoards">
		<div class="board-hover">
			<h3><?php echo $like[0]->name ?></h3>		  
		</div>
		<img src="<?php echo $like[0]->filepath ?>">
      	<div class="banner">
        	<div class="banner-content">
          		<i class="flaticon-label36"><span><?php echo $like[0]->likes ?></span></i>
          		<i class="flaticon-view28"><span>380</span></i>
        	</div>
      	</div>

	</a>

	<?php endforeach; ?>
