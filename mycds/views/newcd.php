
<html><body>
<?php

foreach($aMyCDs as $aCD){
	echo $aCD['name'];
}
?>

<form action='.' method="post">
<input type='text' name='title' /><input type='submit' value='add' />

</form>


</body></html>