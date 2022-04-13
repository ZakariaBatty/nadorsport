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
        if (isset($_POST['id'])) {
            $data = array(
                'id' => $_POST['id']
            );
            $Client = Client::getClient($data);
            return $Client;
        }
    }
    // function for update client
    public function updateClient()
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
                Session::set('success', 'Client Modifié');
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
                Session::set('success', 'Le statut du client a bien été modifié');
                Redirect::to('clients');
            } else {
                echo $result;
            }
        endif;
    }
}
