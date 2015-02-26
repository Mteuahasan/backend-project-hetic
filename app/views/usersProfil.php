<h1>hello</h1>

<h2>Name</h2>
<div><?php echo $users[0]->name; ?></div>

<h2>email</h2>
<div><?php echo $users[0]->email; ?></div>

<h2>website</h2>
<div><?php echo $users[0]->website; ?></div>

<h2>Twitter</h2>
<div><?php echo $users[0]->url_twitter ?></div>

<h2>Facebook</h2>
<div><?php echo $users[0]->url_facebook ?></div>

<h2>Linkdin</h2>
<div><?php echo $users[0]->url_linkdin ?></div>


<form enctype="multipart/form-data" action="#" method="post">
	<label for="site">Website :</label><input type="text" name="site" >
	<label for="twitter">Twitter :</label><input type="text" name="twitter" >
	<label for="facebook">Facebook :</label><input type="text" name="facebook" >
	<label for="linkdin">Linkdin :</label><input type="text" name="linkdin" >
	<input type="submit" value="Submit">
</form>