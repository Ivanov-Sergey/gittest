<?php
class Purcipine extends Animal implements Serializable {
	protected $name; 
	protected $mood; 
        public function getName(){
            return $name;
        }
        public function getMood(){
            return $mood;
        }
        public function setName($sName){
            $name = $sName;
        }
        public function setMood($sMood){
            $mood = $sMood;
        }
        
        public function serialize() {
            return serialize(array(
                    $this->name,
                    $this->mood,
                    $this->weight,
                    $this->normalWeight,
                    $this->isHungry,
                    $this->age
            ));
        }
        public function unserialize($ser) {
            $args = unserialize($ser);
            $this->name = $args[0];
            $this->mood = $args[1];
            $this->weight = $args[2];
            $this->normalWeight = $args[3];
            $this->isHungry = $args[4];
            $this->age = $args[5];
        }
        
	function __construct() {
		parent::__construct();
		$this->name = "Безымянный";
		$this->mood = "отличное";
	}
	public static function makeWithName($setName){
		$obj = new Purcipine();
		$obj->name = $setName;
		return $obj;
	}
	public static function makeWithAll($setName,$setMood,$setWeight,$setNormalWeight,$setHungry,$setAge){
		$obj = new Purcipine();
		$obj->name = $setName;
		$obj->mood = $setMood;
		$obj->weight = $setWeight;
		$obj->normalWeight = $setNormalWeight;
		$obj->isHungry = $setHungry;
		$obj->age = $setAge;
		return $obj;
	}
	public static function makeWithAll0($args){
		$obj = new Purcipine();
		$obj->name = $args[0];
		$obj->mood = $args[1];
		$obj->weight = $args[2];
		$obj->normalWeight = $args[3];
		$obj->isHungry = $args[4];
		$obj->age = $args[5];
		return $obj;
	}
	function __destruct() {
   	}
        
   	public function grow(){ // повзрослеть
		++$this->age;
		if($this->normalWeight<=10){
			++$this->normalWeight;
			$this->weight=$this->normalWeight;
		}
	}
	public function eat(){ // поесть
		$this->weightChange(0.1*rand(2,8));
	}
	private function vomit(){ // рвота
		$this->isHungry = true;
		$this->weightChange(-0.1*rand(1,9));
		echo "Я не хочу есть! Меня вырвало! =(\r\n\r\n";
		$this->isHungry = false;
		$this->mood = "плохое";
	}
        private function tired(){
		echo "Я не хочу играть! Я очень устал =(\r\n\r\n";
		$this->isHungry = true;
		$this->mood = "плохое";
        }
	public function play(){ // играть
		$this->weightChange(-0.1*rand(1,5));
	}
        public function pat(){
                echo "Фрр,фрр..\r\n\r\n";
                $this->mood = "счастлив";
        }
        private function weightChange($a){ // изменить вес
		$tmp = $a+$this->weight;
		if($tmp<=($this->normalWeight+1) && $tmp>($this->normalWeight)){
			$this->weight=$tmp;
			if($tmp<=($this->normalWeight+0.5)){
				$this->isHungry = true;
				$this->mood = "нормальное, но я хочу кушать.";
			}
			else {
				$this->isHungry = false;
				$this->mood = "отличное, я хочу играть!";
			}
		}
		elseif($tmp>($this->normalWeight+1)){
			$this->weight=$this->normalWeight+1;
			$this->mood = "плохое";
			$this->vomit();
		}
		else {
			$this->weight=$this->normalWeight;
			$this->mood = "плохое";
			$this->isHungry = true;
            $this->tired();
		}
	}
	public function getCond(){
		printf(
"%s
Возраст: %s лет
Настроение: %s
Вес: %s кг
Нормальный вес: %s кг
%s",
$this->name,$this->age,$this->mood,$this->weight,$this->normalWeight,$this->isHungry?"Голоден":"Сыт");
	}
}
?>