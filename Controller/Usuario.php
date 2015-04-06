<?php 

/**
* 
*/
class Usuario
{
	private $id;
	private $committee_id;
	private $name;
	private $lastName;
	private $age;
	private $email;
	private $password;
	private $address;
	private $school;
	private $school_campus;
	private $phone;
	private $roll;

	function __construct($id, $committee_id, $name, $lastName, $age, $email, $password, $address, $school, $school_campus, $phone,  $roll )
	{
		$this->id=$id;
		$this->committee_id=$committee_id;
		$this->name=$name;
		$this->lastName=$lastName;
		$this->age=$age;
		$this->email=$email;
		$this->password=$password;
		$this->address=$address;
		$this->school=$school;
		$this->school_campus=$school_campus;
		$this->phone=$phone;
		$this->roll=$roll;
	}

	public function printUser(){
		echo "<pre>";
		print_r($this);
		echo "<pre/>";
	}

	public function get_id(){
		return $this->id;
	}

	public function get_name(){
		return $this->name;
	}

	public function get_roll(){
		return $this->roll;
	}
}
 ?>