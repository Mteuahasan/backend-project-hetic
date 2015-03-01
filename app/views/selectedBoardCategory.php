<h1>YO</h1>

<?php foreach($categoryboards['categories'] as $cat): ?>
<h2><?php echo $cat['categories_name'] ?></h2>

	<?php foreach($categoryboards['boards'] as $board): ?>
		<?php if($cat['id']==$board['category_id']): ?>
			<p><?php echo $board['boards_name'] ?></p>
			<a href="../../board/<?php echo $board['boards_id'] ?>">View board</a>
		<?php endif; ?>
	<?php endforeach ?>

<?php endforeach ?>
