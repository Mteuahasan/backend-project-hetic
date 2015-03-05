<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Document</title>
	<meta name="description" content="">
	<base href="<?php echo $BASE; ?>/" />
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./dist/assets/css/main.css">
</head>
<body>
  <!-- POP UP SEARCH -->
  <section id="searchFilter" class="page-filters-search">
    <div id="pageSearch" class="page-search">
      <i id="closeSearch" class="flaticon-cancel22"></i>
      <h1>Search anything by tiping here</h1>
      <i class="flaticon-information32" title="Category, people or tag"></i>
      <form action="search/" method="post" id='search-form'>
          <input type="text" name="name" placeholder="" autocomplete="off" id="search-content"/>
      </form>
    </div>
  </section>

  <!-- POP UP CATEGORY -->
  <section id="categoryFilter" class="page-filters-category">
    <div id="pageCategory" class="page-category">
      <i id="closeCategory" class="flaticon-cancel22"></i>
      <h1>Set up a maximum of <strong>3</strong> categories</h1>
        <form autocomplete="off">
        <ul>
          <li><input type="checkbox" id="cat1"><label for="cat1">Comics</label></li>
          <li><input type="checkbox" id="cat2"><label for="cat2">Humor</label></li>
          <li><input type="checkbox" id="cat3"><label for="cat3">Politic</label></li>
        </ul>
        <ul>
          <li><input type="checkbox" id="cat4"><label for="cat4">Celebrities</label></li>
          <li><input type="checkbox" id="cat5"><label for="cat5">Dark Humor</label></li>
          <li><input type="checkbox" id="cat6"><label for="cat6">Gore</label></li>
          <li><input type="checkbox" id="cat7"><label for="cat7">Sensual</label></li>
        </ul>
        <ul>
          <li><input type="checkbox" id="cat8"><label for="cat8">Religious</label></li>
          <li><input type="checkbox" id="cat9"><label for="cat9">For kids</label></li>
          <li><input type="checkbox" id="cat10"><label for="cat10">Daily</label></li>
        </ul>
      </form>  
      <input type="submit" value="Let's go" class="btn-little">
      <a href="#" class="btn-little"><span>Let's go</span><i class="flaticon-right11"></i></a>
    </div>
  </section>
  <?php include('partials/nav.php') ?>
	

	<div id="mainContent" class="main-container">
	    <section class="header-profile">
	      <img src="./dist/assets/img/profile.jpg">
	    </section>

	    <div class="wrapper-home-content">
	      <div class="filters">
	        <a href="#" id="category">
	          <span>Categories</span>
	          <i class="flaticon-telephone106"></i>
	        </a>
	        <a href="#" id="search">
	          <span>Search</span>
	          <i class="flaticon-magnifier52"></i>
	        </a>
	        <a href="user/<?php echo $users[0]->id ?>/settings" id="setting">
	          <span>Settings</span>
	          <i class="flaticon-screwdriver26"></i>
	        </a>
	        <a href="user/<?php echo $users[0]->id ?>/about" id="about">
	          <span>About</span>
	          <i class="flaticon-information32"></i>
	        </a>
	      </div>
	      <div id="settings-content" class="top-content">
	      	<div class="selection">
	      		<span class="liked color">SETTINGS</span>
	      	</div>
	      	<div class="separation"></div>
	      	<section class="settings">
	      		<div class="container-settings">
	      		<form enctype="multipart/form-data" action="" method="post">
	      			<div class="settings-content container-settings-left">  
	      				<section class="content">
							<span class="input input--hoshi">
								<div class="information"><?php echo $users[0]->name; ?></div>

								<input class="input__field input__field--hoshi" type="text" name="name" id="input-5" />
								<label class="input__label input__label--hoshi input__label--hoshi-color-2" for="input-5">
								<span class="input__label-content input__label-content--hoshi">Username</span>

								</label>
							</span>

						</section>

						<section class="content">
							<span class="input input--hoshi">
								<div class="information"><?php echo $users[0]->description ?></div>					
								<input class="input__field input__field--hoshi" type="text" name="description" id="input-5" />
								<label class="input__label input__label--hoshi input__label--hoshi-color-2" for="input-5">
								<span class="input__label-content input__label-content--hoshi">Descritpion</span>

								</label>
							</span>

						</section>  

						<section class="content">
							<span class="input input--hoshi">
								<div class="information"><?php echo $users[0]->city ?></div>

								<input class="input__field input__field--hoshi" type="text" name="city" id="display-linkdin" />
								<label class="input__label input__label--hoshi input__label--hoshi-color-2" for="site">
								<span class="input__label-content input__label-content--hoshi">Current City</span>

								</label>
							</span>
	
						</section>      			
							
			      					
					</div>
					<div class="settings-content container-settings-right">

					<section class="content">
						<span class="input input--hoshi">
							<div class="information"><?php echo $users[0]->email ?></div>

							<input class="input__field input__field--hoshi" type="text" name="mail" id="display-twitter" />
							<label class="input__label input__label--hoshi input__label--hoshi-color-2" for="twitter">
							<span class="input__label-content input__label-content--hoshi">Mail adresse</span>

							</label>
						</span>
		
					</section>

					<section class="content">
						<span class="input input--hoshi">
							<div class="information"></div>

							<input class="input__field input__field--hoshi" type="text" name="categorie" id="display-facebook" />
							<label class="input__label input__label--hoshi input__label--hoshi-color-2" for="facebook">
							<span class="input__label-content input__label-content--hoshi">Catégorie of interest (3 max).</span>

							</label>
						</span>
						
					</section> 

					<section class="content">
						<span class="input input--hoshi">
							<div class="information"><?php echo $users[0]->website ?></div>

							<input class="input__field input__field--hoshi" type="text" name="site" />
							<label class="input__label input__label--hoshi input__label--hoshi-color-2" for="site">
							<span class="input__label-content input__label-content--hoshi">Portfolio URL</span>

							</label>
						</span>
						
					</section>      
					</div>
					<div class="settings-content container-settings-bottom">
						<section class="bottom">
							<span class="input input--hoshi">
								<div class="information"><?php echo $users[0]->url_twitter ?></div>

								<input class="input__field input__field--hoshi" type="text" name="twitter" />
								<label class="input__label input__label--hoshi input__label--hoshi-color-2" for="twitter">
								<span class="input__label-content input__label-content--hoshi">Twitter</span>

								</label>
							</span>
							
						</section>

						<section class="bottom">
							<span class="input input--hoshi">
								<div class="information"><?php echo $users[0]->url_facebook ?></div>

								<input class="input__field input__field--hoshi" type="text" name="facebook" />
								<label class="input__label input__label--hoshi input__label--hoshi-color-2" for="facebook">
								<span class="input__label-content input__label-content--hoshi">Facebook</span>

								</label>
							</span>
						</section> 

						<section class="bottom">
							<span class="input input--hoshi">
								<div class="information"><?php echo $users[0]->url_linkdin ?></div>

								<input class="input__field input__field--hoshi" type="text" name="linkdin" />
								<label class="input__label input__label--hoshi input__label--hoshi-color-2" for="linkdin">
								<span class="input__label-content input__label-content--hoshi">Linkdin</span>

								</label>
							</span>
						</section> 
					</div>

					<input type="submit" value="add">

					</form>

					


						


						<!-- <div class="btn--file-upload">
				            <span>Add a profil picture</span>
				            <input type="file" name="userfile2" class="input-file">
       				    </div> -->
					
				</div>
			</section>
		  </div>
		</div>
	</div>




  <script type="text/javascript" src="dist/assets/scripts/main.js"></script>
  <script type="text/javascript" src="dist/assets/scripts/actionMenu.js"></script>	
  <script type="text/javascript" src="dist/assets/scripts/profile.js"></script>	
</body>
</html>