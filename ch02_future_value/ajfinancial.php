<?php
	function present_worth_SPPWF ($future_worth, $interest_rate, $number_of_years)
	{
	  //variable and initializations
	  $the_result = 0.0;
	  $SPPWF = 0.0;

	  //calculate present value with the
	  //single payment present worth factor
	  $SPPWF = 1.0 / pow(1.0 + $interest_rate, $number_of_years);
	  $the_result = $future_worth * $SPPWF;

	  //return the value
	  return $the_result;
	}
?>	