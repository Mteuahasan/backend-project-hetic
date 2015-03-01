<h1>hello</h1>
<p>Select a category</p>
<?php foreach($categoryboards['categories'] as $catName): ?>
	<a href="selectedCategory/<?php echo $catName['id'] ?>"><h3><?php echo $catName['categories_name'] ?></h3></a>
<?php endforeach ?>














	

