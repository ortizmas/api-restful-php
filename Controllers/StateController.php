<?php

include '../../Models/State.php';

class StateController
{
    public function index()
    {
        $state = new State();
        return $state->findAll();
    }
}

?>