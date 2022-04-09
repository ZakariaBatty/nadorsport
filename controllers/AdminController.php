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
                $_SESSION['logged_admin'] = true;
                $_SESSION['email'] = $result->email;
                $_SESSION['user_id'] = $result->user_id;
                header("Location: c-panel");
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
    // function for déconnexion
    static public function logout()
    {
        session_destroy();
    }
}
