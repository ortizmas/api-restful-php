<?php

include '../../Models/State.php';

class StateController
{
    public function index()
    {
        $state = new State();
        return $state->findAll();
    }

    public function show($id=null)
    {
        $state = new State();
        $result = $state->find($id);
        // get retrieved row
        $row = $result->fetch(PDO::FETCH_ASSOC);
    
        // set values to object properties
        $this->name = $row['name'];
        $this->abbreviation = $row['abbreviation'];
    }
}

?>