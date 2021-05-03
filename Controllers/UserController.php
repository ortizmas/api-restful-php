<?php

include '../../Models/User.php';
include '../../Models/Address.php';

class UserController
{
    public function index()
    {
        $users = new User();
        return $users->findAll();
    }

    public function insert($obj)
    {
        $user = new User();
        $inserUser = $user->insert($obj);

        if ($inserUser > 0) {

            $data = [
                'cep' => $obj->cep,
                'street' => $obj->street,
                'number' => $obj->number,
                'district' => $obj->district,
                'additional' => $obj->additional,
                'city_id' => $obj->city_id,
                'user_id' => $inserUser
            ];
            $address = new Address();
            $inserAddress = $address->insert($data);
            
            if ($inserAddress) {
                return true;
            }
        }

        return false;
    }

    public function show($id=null)
    {
        $user = new User();
        $result = $user->find($id);
        // get retrieved row
        $row = $result->fetch(PDO::FETCH_ASSOC);
    
        // set values to object properties
        $this->id = $row['id'];
        $this->name = $row['name'];
        $this->email = $row['email'];
    }

    public function update($obj, $id)
	{
		$user = new User();
		return $user->update($obj, $id);
	}

    public function delete($id)
	{
		$user = new User();
		return $user->delete($id);
	}
}

?>