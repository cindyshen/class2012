<?php
    // get the data from the form
    $future_value = $_POST['future_value'];
    $interest_rate = $_POST['interest_rate'];
    $years = $_POST['years'];
	
    // validate investment entry
    if ( empty($future_value) ) {
        $error_message = 'Investment is a required field.'; 
    } else if ( !is_numeric($future_value) )  {
        $error_message = 'Investment must be a valid number.'; 
    } else if ( $future_value <= 0 ) {
        $error_message = 'Investment must be greater than zero.';        
    // validate interest rate entry
    } else if ( empty($interest_rate) ) {
        $error_message = 'Interest rate is a required field.'; 
    } else if ( !is_numeric($interest_rate) )  {
        $error_message = 'Interest rate must be a valid number.'; 
    } else if ( $interest_rate <= 0 || $interest_rate >15  ) {
        $error_message = 'Interest rate must be greater than zero and less or equal than 15.';        
    // set error message to empty string if no invalid entries
    } else if ( $years<= 0 || $years >50) {
		$error_message = 'years must be greater than zero and less or equal than 50.';  
	} else {
        $error_message = '';
    }

    // if an error message exists, go to the index page
    if ($error_message != '') {
        include('index.php');
        exit();
    }
	

    // calculate the future value
    // $future_value = $investment;
    // for ($i = 1; $i <= $years; $i++) {
    // $future_value = ($future_value + ($future_value * $interest_rate *.01));
    // }
	
	
	//Eduardo's solution
    $future_value = $present_value;
    for ($i = 1; $i <= $years; $i++) {
        $future_value = $future_value/ (1.0 + $interest_rate * .01);
    }
	
	//	Rich Google's solution
	//	$present_value = $future_value * (1.0 / pow(1.0 + $interest_rate * .01, $years));
	
	// mine solution
	//$SPPWF = 1.0 / pow(1.0 + $interest_rate * .01,  $years);
	//$present_value = $future_value * $SPPWF;

    // apply currency and percent formatting
    //$investment_f = '$'.number_format($investment, 2);
	$future_value_f = '$'.number_format($future_value, 2);
    $yearly_rate_f = $interest_rate.'%';
    $present_value_f = '$'.number_format($present_value, 2);
	$date = date('m/d/y');	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Future Value Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>
<body>
    <div id="content">
        <h1>Future Value Calculator</h1>
		
        <label>Future Value:</label>
        <span><?php echo $future_value_f; ?></span><br />	

        <label>Yearly Interest Rate:</label>
        <span><?php echo $yearly_rate_f; ?></span><br />

        <label>Number of Years:</label>
        <span><?php echo $years; ?></span><br />
		
        <label>Present Value:</label>
        <span><?php echo $present_value_f; ?></span><br />
		
		<?php if (!empty($date)) { ?>
        <p>This calculation was done on <?php echo $date; ?></p>
		<?php }
		?>
    </div>
</body>
</html>