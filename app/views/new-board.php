<h1>New board</h1>
<form enctype="multipart/form-data" action="#" method="post">
  <label for="name">Nom</label><input type="text" name="name">
  <label for="description"></label><textarea name="description" id="board-description" cols="30" rows="10"></textarea>
  <input type="file" name="userfile">
  <?php foreach ($categories as $categorie): ?>
    <input type="checkbox" name="categories[]" value="<?php echo $categorie->id ?>"><label for="<?php echo $categorie->slug ?>"><?php echo $categorie->name ?></label>
  <?php endforeach ?>
  <label for="tags">Tags</label><input type="text" name="tags">
  <input type="submit" value="Submit board">
</form>