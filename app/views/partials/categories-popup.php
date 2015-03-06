<section id="categoryFilter" class="page-filters-category">
    <div id="pageCategory" class="page-category">
      <i id="closeCategory" class="flaticon-cancel22"></i>
      <h1>Set up a maximum of <strong>3</strong> categories</h1>
        <form autocomplete="off" method="get">
        <ul>
        <?php foreach ($allCategories as $cat): ?>
          <a href="gallery?category=<?php echo $cat->id ?>&sortby=date&page=1"><li><?php echo $cat->name; ?></li></a>
        <?php endforeach ?>
        </ul>
        <input type="submit" value="Let's go" class="btn-little">
      </form>
      <a href="#" class="btn-little"><span>Let's go</span><i class="flaticon-right11"></i></a>
    </div>
  </section>