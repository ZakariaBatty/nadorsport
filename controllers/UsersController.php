<?php

class UsersController
{
    //function for Connexion
    public function auth()
    {
        if (isset($_POST['submit'])) :
            $data['email'] = $_POST['email'];
            $result = User::login($data);

            if ($result->email === $_POST['email'] && password_verify($_POST['password'], $result->password)) :
                $_SESSION['logged'] = true;
                $_SESSION['email'] = $result->email;
                $_SESSION['user_id'] = $result->user_id;
                header("Location: dashbord");
            else :
                Session::set('error', 'Email ou mot de passe est incorrect');
                Redirect::to('login');
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
                'firstName' => $_POST['firstName'],
                'lastName' => $_POST['lastName'],
                'phone' => $_POST['phone'],
                'email' => $_POST['email'],
                'password' => $password,

            );
            $result = User::createUser($data);
            if ($result === 'ok') {
                Session::set('success', 'Compte crée');
                Redirect::to('login');
            } else {
                Session::set('error', 'Veuillez réessayer*');
                Redirect::to('register');
            }
        endif;
    }
    // function for déconnexion
    static public function logout()
    {
        session_destroy();
    }
}
