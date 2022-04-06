<?php

class UsersController
{
    //function for Connexion
    public function auth()
    {
        if (isset($_POST['submit'])) :
            $data['email'] = $_POST['email'];
            $result = User::login($data);
            print_r($result->email);

            if ($result->email === $_POST['email'] && password_verify($_POST['password'], $result->password)) :
                print_r($result);
                $_SESSION['logged'] = true;
                $_SESSION['email'] = $result->email;
                $_SESSION['user_id'] = $result->user_id;
                header("Location: home");
            else :
                setcookie('error', 'Pseudo ou mot de passe est incorrect', time() + 5, "/");
                header("Location: login");
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
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => $password,

            );
            $result = User::createUser($data);
            if ($result === 'ok') {
                // Session::set('success', 'Compte crée');
                // Redirect::to('login');
                setcookie('success', 'Compte crée', time() + 5, "/");
                header("Location: login");
            } else {
                echo $result;
            }
        endif;
    }
    // function for déconnexion
    static public function logout()
    {
        session_destroy();
    }
}
