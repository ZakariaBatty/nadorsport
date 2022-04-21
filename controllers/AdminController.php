<?php

class AdminController
{
    //function for Connexion
    public function auth()
    {
        if (isset($_POST['submit'])) :
            $data['email'] = $_POST['email'];
            $result = Admin::login($data);

            if ($result->email === $_POST['email'] && password_verify($_POST['password'], $result->password)) :
                if (!$result->status) {
                    Session::set('error', 'compte desactive');
                    Redirect::to('login-admin');
                } else {
                    $_SESSION['admin'] = true;
                    $_SESSION['admin_info'] = $result;
                    Redirect::to('c-panel');
                }
            else :
                Session::set('error', 'Email ou mot de passe est incorrect');
                Redirect::to('login-admin');
            endif;


        endif;
    }
    //function for inscription
    public function register()
    {
        if (isset($_POST['submit'])) :
            $options = [
                'cost' => 12
            ];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
            $data = array(
                'lastName' => $_POST['lastName'],
                'firstName' => $_POST['firstName'],
                'email' => $_POST['email'],
                'password' => $password,
                'phone' => $_POST['phone']

            );
            $result = Admin::createUser($data);
            if ($result === 'ok') {
                Session::set('success', 'Compte crée');
                Redirect::to('account');
            } else {
                Session::set('error', 'Veuillez réessayer*');
                Redirect::to('account');
            }
        endif;
    }

    // function for update admin
    public function updateAdmin()
    {
        if (isset($_POST['updated-admin'])) :
            $data = array(
                'id' => $_POST['id'],
                'firstName' => $_POST['firstName'],
                'lastName' => $_POST['lastName'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone'],
            );
            $result = Admin::update($data);
            if ($result === 'ok') {
                Session::set('success', 'Admin Modifié');
                Redirect::to('account');
            } else {
                Session::set('error', 'Veuillez réessayer*');
                Redirect::to('account');
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
            $result = Admin::upload($data);
            if ($result === 'ok') {
                Session::set('success', 'Photo Modifié');
                Redirect::to('account');
            } else {
                Session::set('error', 'Veuillez réessayer*');
                Redirect::to('account');
            }
        endif;
    }

    // function for recover One client
    public function getOneAdmin()
    {
        $admin = Admin::getAdmmin($_SESSION['admin_info']->id);
        return $admin;
    }

    // function for delete account admin
    public function desactive()
    {
        if (isset($_POST['accountDesactivation'])) :
            $data = array(
                'id' => $_POST['id'],
                'status' => $_POST['status'],
            );
            $result = Admin::desaAdmin($data);
            if ($result === 'ok') {
                Session::set('success', 'compte de admin a bien été desactive');
                Redirect::to('account');
            } else {
                echo $result;
            }
        endif;
    }

    // function for delete client
    public function desactiveClient()
    {
        if (isset($_POST['accountDesactivation'])) :
            $data = array(
                'id' => $_POST['id'],
                'status' => $_POST['status'],
            );
            $result = Client::desaClient($data);
            if ($result === 'ok') {
                Session::set('success', 'compte a bien été desactive');
                Redirect::to('clients');
            } else {
                echo $result;
            }
        endif;
    }

    //function for inscription
    public function Password()
    {
        if (isset($_POST['changePassword'])) :
            $options = [
                'cost' => 12
            ];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
            $data = array(
                'id' => $_POST['id'],
                'password' => $password,
            );
            $result = Admin::changePassowrd($data);
            print_r($result);
            if ($result === 'ok') {
                Session::set('success', 'Le mot de passe a été changé avec succès');
                Redirect::to('change-password');
            } else {
                Session::set('error', 'Veuillez réessayer*');
                Redirect::to('change-password');
            }
        endif;
    }

    // function for déconnexion
    static public function logout()
    {
        session_destroy();
    }
}
