<html>
<body>
	<h1>Subscribe the newsletter</h1>
	<form action="." method="POST">

	<?php foreach (Email::find('all') as $sEmail) {?>
	<p>
	<?php echo $sEmail->email; ?>
	<a href="?action=Delete&email=<?php echo $sEmail->email; ?>">
	<img src="views/images/cross.png" alt="Delete"</a>
	</p>
	<?php } ?>		


		<div>
			<lable>Email:</label>
			<input type="text" id="email" name="email" maxlength="80" />
		</div>
		<div>
			<input type="submit" name="action" value="Subscribe" />
		</div>
	</form>
</body>
</html>

