<?php

require_once '../../Connection/Connection.php';

class Address extends Connection
{
    private $cep;
    private $street;
    private $number;
    private $district;
    private $additional;
    private $city_id;
    private $user_id;

	private $table = 'addresses';

    public function findAll()
    {
        $sql = "SELECT * FROM $this->table";
        $query = Connection::prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

	public function insert($data) {
		$conn = Connection::connect();
		$sql = "INSERT INTO $this->table(cep,street,number,district,additional,city_id,user_id) VALUES (?,?,?,?,?,?,?)";
		$query = $conn->prepare($sql);
		$insert = $query->execute([$data['cep'], $data['street'], $data['number'], $data['district'], $data['additional'], $data['city_id'], $data['user_id']]);
		
        if ($insert) {
            return true;
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

    public function getTotalUsersByCities()
    {
        $sql = "SELECT c.id, c.name, COUNT(a.user_id) AS total_users  FROM $this->table AS a
        INNER JOIN cities AS c ON a.city_id = c.id
        INNER JOIN users AS u ON a.user_id = u.id
        GROUP BY a.city_id";
        $query = Connection::prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function getTotalUsersByStates()
    {
        $sql = "SELECT s.id, s.name, COUNT(a.user_id) AS total_users  FROM $this->table AS a
        INNER JOIN states AS s ON a.state_id = s.id
        INNER JOIN users AS u ON a.user_id = u.id
        GROUP BY a.state_id";
        $query = Connection::prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
}

?>