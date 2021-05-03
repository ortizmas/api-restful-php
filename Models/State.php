<?php

require_once '../../Connection/Connection.php';

class State extends Connection
{
    // tabele database
    private $table = 'states';

    // Properties
    public $name;
    public $abbreviation;
    public $created_at;
    public $updated_at;

    public function findAll()
    {
        $sql = "SELECT * FROM $this->table";
        $query = Connection::prepare($sql);
        $query->execute();
        // return $query->fetchAll();
        return $query;
    }

    public function find($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id={$id}";
        $query = Connection::prepare($sql);
        $query->bindParam(1, $this->id);
        $query->execute();
        return $query;
    }
}

?>