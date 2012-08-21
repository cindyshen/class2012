<html>
<body>

<h1>Days we ate together</h1>
<form action="." method="post">
	<table>
	<thead>	
		<tr>			
        	<th>Date</th>
            <th>Members</th>            
        </tr>
     </thead>
	    <?php $oMealss = new Meal; ?>
	    <?php $oMeals = $oMealss->find('all'); ?>
	    <?php foreach($oMeals as $oMeal){ ?>
		<tr>
			<td>
			<?php echo date_format($oMeal->date, "Y-m-d" ) ; ?>
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

