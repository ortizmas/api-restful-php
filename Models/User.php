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
		$conn = Connection::connect();
		$sql = "INSERT INTO $this->table(name,email,password) VALUES (?,?,?)";
		$query = $conn->prepare($sql);
		$query->execute([$obj->name, $obj->email, password_hash($obj->password, PASSWORD_DEFAULT)]);
		$lastId = $conn->lastInsertId();

		if ($lastId > 0) {
			return $lastId;
		}
		return false;
	}

	public function find($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id={$id}";
        $query = Connection::prepare($sql);
        $query->bindParam(1, $this->id);
        $query->execute();
        return $query;
    }

	public function update($obj,$id = null){
		$sql = "UPDATE $this->table SET name = :name, email = :email, password = :password WHERE id = :id ";
		$query = Connection::prepare($sql);
		$query->bindValue('name', $obj->name);
		$query->bindValue('email', $obj->email);
		$query->bindValue('password', password_hash($obj->password, PASSWORD_DEFAULT));
		$query->bindValue('id', $id);
		return $query->execute();
	}

	public function delete($id = null){
		$sql = "DELETE FROM $this->table WHERE id = :id ";
		$query = Connection::prepare($sql);
		$query->bindParam('id', $id);

		if ($query->execute()) {
			return true;
		}

		return false;
	}
}

?>