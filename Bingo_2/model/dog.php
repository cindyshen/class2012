<?php
class Animal implements Showable
{
        public $sHungry = ' hell yeah I am hungry.';
        
        function eat($food)
        {
        	
        	$this->sHungry = "not so much. I don't like " . $food;        	
        }    

        function show()
        {
        	foreach($this as $name => $value)
        	{
        		echo "<li>$name = $value</li>";
        	}
        }
}

interface Gender{	
	const MALE ='m';
	const FEMALE ='f';
}

// the interface function has to be abstract
interface Showable{
	public function show();	
}

class Dog extends Animal implements Gender, Showable
{
	function __construct($sBreed)
	{
		$this->sBreed = $sBreed;
		$this->sGender = Gender::MALE;	// reference the const, we are hard code here 
		$this->show();	
	}
	
	/*
	function show()
	{
		echo $this->sGender; 
		echo $this->sBreed;
		echo $this->sHungry;
	}
	*/
	
	function show()
	{
		echo " I am a dog .............";	
	}
}
?>