<?php

function sayHello()
{
	echo "Hello World";	
}

// anonymous function 
$fSayGoodDay = function()
{
	echo "Good day";
};

function callMeBack($fCallMe) // require a function variable
{
	$fCallMe();
}
?>

<html>
<body>
	<?php sayHello(); ?><br>
	<?php $fSayGoodDay(); ?><br>
	<?php callMeBack($fSayGoodDay); ?>  
</body>

</html>