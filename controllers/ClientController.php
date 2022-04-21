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
    //change password
    public function PasswordClient()
    {
        if (isset($_POST['changePassword'])) :
            $options = [
                'cost' => 12
            ];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
            $data = array(
                'id' => $_POST['user_id'],
                'password' => $password,
            );
            $result = Client::changePassowrd($data);
            if ($result === 'ok') {
                Session::set('success', 'Le mot de passe a été changé avec succès');
                Redirect::to('my-profile');
            } else {
                Session::set('error', 'Veuillez réessayer*');
                Redirect::to('my-profile');
            }
        endif;
    }

    // function for update admin
    public function uploadPhoto()
    {
        if (isset($_POST['upload'])) :

            $dir = "assets/img/avatars/";
            $target = $dir . basename($_FILES['image']['name']);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target, PATHINFO_EXTENSION));

            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if ($check !== false) {

                $uploadOk = 1;
            }
            // Allow certain file formats
            if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            ) {
                // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                return "error";
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target)) {
                }
            }

            $data = array(
                'id' => $_POST['id'],
                'photo' => $_FILES['image']['name'],
            );
            $result = Client::upload($data);
            if ($result === 'ok') {
                Session::set('success', 'Photo Modifié');
                Redirect::to('my-profile');
            } else {
                Session::set('error', 'Veuillez réessayer*');
                Redirect::to('my-profile');
            }
        endif;
    }
}
