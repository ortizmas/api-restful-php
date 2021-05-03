<?php

require_once '../../Connection/Connection.php';

class User extends Connection
{
    private $name;
    private $email;
    private $password;

	private $table = 'users';

	function  getName() {
		return $this->name;
	}

	function setName($name) {
		$this->name = $name;
	}

	function  getEmail() {
		return $this->email;
	}

	function setEmail($email) {
		$this->email = $email;
	}

	function getPassword() {
		return $this->password;
	}

	function setPassword($password) {
		$this->password = $password;
	}

    public function findAll()
    {
        $sql = "SELECT * FROM $this->table";
        $query = Connection::prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

	public function insert($obj){
    	$sql = "INSERT INTO $this->table(name,email,password) VALUES (:name,:email,:password)";
    	$query = Connection::prepare($sql);
        $query->bindValue('name',  $obj->name);
        $query->bindValue('email', $obj->email);
        $query->bindValue('password' , password_hash($obj->password, PASSWORD_DEFAULT));
    	$query->execute();
		$result = $query->db->lastInsertId();

		return $result;
		

		

	}
}

?>