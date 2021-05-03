<?php

require_once '../../Connection/Connection.php';

class User extends Connection
{
    private $name;
    private $email;
    private $password;

	function  getName() {
		return $this->name;
	}

	function setName($name) {
		$this->name = $name;
	}

	function  getEmail() {
		return $this->email;
	}

	function setEmail($mail) {
		$this->email = $email;
	}

	function getPassword() {
		return $this->password;
	}

	function setPassword($assword) {
		$this->password = $password;
	}

    public function findAll()
    {
        $sql = "SELECT * FROM users";
        $query = Connection::prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
}

?>