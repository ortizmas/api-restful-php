<?php

include '../../Models/City.php';

class CityController
{
    public function index()
    {
        $city = new City();
        return $city->findAll();
    }

    public function show($id=null)
    {
        $city = new City();
        $result = $city->find($id);
        // get retrieved row
        $row = $result->fetch(PDO::FETCH_ASSOC);
    
        // set values to object properties
        $this->name = $row['name'];
        $this->ibge_code = $row['ibge_code'];
        $this->state_id = $row['state_id'];

    }
}

?>