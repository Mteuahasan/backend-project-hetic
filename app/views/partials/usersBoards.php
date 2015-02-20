<h1>Her are the boards you added</h1>

<?php $j = 0; ?>
<?php foreach ($boardsAdded as $add): ?>
<?php $j++; ?>


<h3><?php echo $add->name ?></h3>
<div class="description">
<?php
	echo $add->description;

?>
</div>

<div class="author"><?php echo $add->author ?></div>

<span class="likes"><?php echo $add->likes ?> likes</span>



<?php endforeach; ?>

<div>You actualy have created <i><?php echo $j; ?></i> boards</div>

