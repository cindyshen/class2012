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
	    <?php foreach(Meal::find('all') as $oMeal){ ?>
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

