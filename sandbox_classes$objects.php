<?php 

	//classes 
 	//class - is like blueprint for an object (for data type). Describes what properties and what functions an object of the type will have.

	class User {

		//public $email;
		//public $name;
		private $email;
		private $name;

		public function __construct($name, $email){
			// $this->email = 'mario@netninja.co.uk';
			// $this->name = 'mario';
			$this->email = $email;//доступ к переменным класса User
			$this->name = $name;
		}

		public function login(){
			//echo 'the user logged in';
			echo $this->name . ' logged in';
		}

		public function getName(){
			return $this->name;
		}

		public function setName($name){
			if(is_string($name) && strlen($name) > 1){
				$this->name = $name; 
				return "name has been updated to $name";
			} else {
				return ' is not a valid name';
			}
		}

	}

	//creating a new object based on this class
	// $userOne = new User(); //- instantiating a class

	// $userOne->login();
	// echo $userOne->email;

	$userTwo = new User('yoshi', 'yoshi@netninja.co.uk');
	// echo $userTwo->name;
	// echo ' ' . $userTwo->email;
	//$userTwo->login();
	//echo $userTwo->getName();
	//echo $userTwo->setName(50); 
	echo $userTwo->setName('shaun'); 
	echo $userTwo->getName();

 ?>