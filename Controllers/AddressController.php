<?php

include '../../Models/Address.php';

class AddressController
{
    public function index()
    {
        $address = new Address();
        return $address->findAll();
    }

    public function show($id=null)
    {
        $address = new Address();
        $result = $address->find($id);
        // get retrieved row
        $row = $result->fetch(PDO::FETCH_ASSOC);
    
        // set values to object properties
        $this->id = $row['id'];
        $this->cep = $row['cep'];
        $this->street = $row['street'];
        $this->number = $row['number'];
        $this->district = $row['district'];
        $this->additional = $row['additional'];
        $this->city_id = $row['city_id'];
        $this->user_id = $row['user_id'];
    }

    public function getTotalUsersByCities()
    {
        $address = new Address();
        return $address->getTotalUsersByCities();
    }

    public function getTotalUsersByStates()
    {
        $address = new Address();
        return $address->getTotalUsersByStates();
    }
}

?>