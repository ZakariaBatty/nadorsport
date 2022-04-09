<?php

class ClientController
{
    // function for recover clients
    public function getAllClients()
    {
        $terrain = Client::getAll();
        return $terrain;
    }
    // function for recover One client
    public function getOneTerrain()
    {
        if (isset($_POST['id'])) {
            $data = array(
                'id' => $_POST['id']
            );
            $terrain = Client::getClient($data);
            return $terrain;
        }
    }
    // function for update client
    public function updateTerrain()
    {
        if (isset($_POST['submit'])) :
            $data = array(
                'id' => $_POST['id'],
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone'],
            );
            $result = Client::update($data);
            if ($result === 'ok') {
                Session::set('success', 'Employé Modifié');
                Redirect::to('home');
            } else {
                echo $result;
            }
        endif;
    }
    // function for delete client
    public function desactive()
    {
        if (isset($_POST['id'])) :
            $data = array(
                'id' => $_POST['id'],
                'status' => $_POST['status'],
            );
            $result = Client::desaClient($data);
            if ($result === 'ok') {
                Session::set('success', 'Patient suprimé');
                Redirect::to('home');
            } else {
                echo $result;
            }
        endif;
    }
}
