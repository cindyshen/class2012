<html>
<body>

<h1>Days we ate together</h1>
<form action="." method="post">
	<table>
		<tr>			
        	<th>Date</th>
            <th>Members</th>            
        </tr>
	    <?php foreach(Meal::find('all') as $oMeal){ ?>
		<tr>
			<td>
			<?php echo $oMeal->date; ?>
			</td>
			<td>
			<?php echo $oMeal->members; ?>
			</td>
		</tr>			
		<?php } ?>
	</table>
</form>	

</body>
</html>
