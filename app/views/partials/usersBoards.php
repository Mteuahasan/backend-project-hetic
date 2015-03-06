	<?php foreach ($boardsAdded as $add): ?>
	<a href="board/<?php echo $add->id ?>" class="single-board-home addedBoards">
		<div class="board-hover">
			<h3><?php echo $add->name ?></h3>
		</div>
		<img src="<?php echo $add->filepath ?>">
      	<div class="banner">
        	<div class="banner-content">
          		<i class="flaticon-label36"><span><?php echo $add->likes ?></span></i>
          		<i class="flaticon-comment21"><span><?php echo $add->commentNumber ?></span></i>
        	</div>
      	</div>

	</a>

	<?php endforeach; ?>










