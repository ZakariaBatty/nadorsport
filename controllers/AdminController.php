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
                $_SESSION['admin'] = true;
                $_SESSION['admin_info'] = $result;
                Redirect::to('c-panel');
            else :
                Session::set('error', 'Pseudo ou mot de passe est incorrect');
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

    //function for inscription
    public function Password()
    {
        if (isset($_POST['chnagePassword'])) :
            $options = [
                'cost' => 12
            ];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
            $data = array(
                'id' => $_POST['id'],
                'password' => $password,
            );
            $result = Admin::changePassowrd($data);
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
