<?php

require_once '../../Connection/Connection.php';

class City extends Connection
{
    // tabele database
    private $table = 'cities';

    // Properties
    public $name;
    public $ibge_code;
    public $state_id;
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