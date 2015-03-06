<section id="categoryFilter" class="page-filters-category">
    <div id="pageCategory" class="page-category">
      <i id="closeCategory" class="flaticon-cancel22"></i>
        <form autocomplete="off" method="get">
        <?php foreach ($allCategories as $cat): ?>
          <a href="gallery?category=<?php echo $cat->id ?>&sortby=date&page=1"><?php echo $cat->name; ?></a><br/>
        <?php endforeach ?>
      </form>
    </div>
  </section>