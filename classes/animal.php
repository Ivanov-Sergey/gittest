<?php
abstract class Animal
{
	protected $age; 
	protected $weight; 
	protected $normalWeight; 
	protected $isHungry; 
        
        public function getAge(){
            return $age;
        }
        public function getWeight(){
            return $weight;
        }
        public function getNormalWeight(){
            return $normalWeight;
        }
        public function getIsHungry(){
            return $isHungry;
        }
        
        public function setAge($sAge){
            $age = $sAge;
        }
        public function setWeight($sWeight){
            $weight = $sWeight;
        }
        public function setNormalWeight($sNormalWeight){
            $normalWeight = $sNormalWeight;
        }
        public function setIsHungry($sIsHungry){
            $isHungry = $sIsHungry;
        }
        
	function __construct()
        {
		echo "Я родился!";
		$this->age = 0;
		$this->isHungry = false;
		$this->weight = 1;
		$this->normalWeight = 1;
	}
}
?>