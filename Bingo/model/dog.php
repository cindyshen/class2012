<?php
class Dog 
{
        public $sHungry = 'hell yeah I am hungry.';
        public $sBreed ='Lab';
        
        function __construct($sBreed)
        {
        	$this->sBreed = $sBreed;
        }
        
        function eat($food)
        {
        	
        	$this->sHungry = "not so much. I don't like " . $food . 'because I am a ' . $this->sBreed ;
        	
        }
        
        function __destruct()
        {
        	echo " in destructor for breed" . $this->sBreed ;
        }
}
?>