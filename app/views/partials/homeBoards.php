<?php foreach ($boards as $board): ?>

  <h2><?php echo $board->name; ?></h2>
  <div class="description"><?php echo $board->description ?></div>
  <div class="author"><?php echo $board->author ?></div>
  <a href="board/<?php echo $board->id ?>">Voir plus</a>

<?php endforeach; ?>
