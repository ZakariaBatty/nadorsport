<?php

class ClientController
{
    // function for recover clients
    public function getAllClients()
    {
        $Client = Client::getAll();
        return $Client;
    }

    // function for recover clients limit 10
    public function getLimitClients()
    {
        $Client = Client::getLimit();
        return $Client;
    }
    // function for recover One client
    public function getOneClient()
    {
        $Client = Client::getClient($_SESSION['user_id']);
        return $Client;
    }
    // function for update client
    public function updateClient()
    {
        if (isset($_POST['submit'])) :
            $data = array(
                'id' => $_POST['id'],
                'firstName' => $_POST['firstName'],
                'lastName' => $_POST['lastName'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone'],
            );
            $result = Client::update($data);
            if ($result === 'ok') {
                Session::set('success', 'Compte Modifié');
                Redirect::to('dashbord');
            } else {
                Session::set('error', 'Veuillez réessayer*');
                Redirect::to('dashbord');
            }
        endif;
    }
    // function for delete client
    public function desactive()
    {
        if (isset($_POST['accountDesactivation'])) :
            $data = array(
                'id' => $_POST['id'],
                'status' => $_POST['status'],
            );
            $result = Client::desaClient($data);
            if ($result === 'ok') {
                Session::set('success', 'compte a bien été desactive');
                Redirect::to('dashbord');
            } else {
                echo $result;
            }
        endif;
    }
}
