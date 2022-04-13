<?php
class User
{
    //create user
    static public function createUser($data)
    {
        $stmt = DB::connect()->prepare('INSERT INTO clients (firstName,lastName,phone,email,password)
            VALUES(:firstName,:lastName,:phone,:email,:password)');
        $stmt->bindParam(':lastName', $data['lastName']);
        $stmt->bindParam(':firstName', $data['firstName']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':password', $data['password']);
        $stmt->bindParam(':phone', $data['phone']);

        if ($stmt->execute()) :
            return 'ok';
        else :
            return 'error';
        endif;
        $stmt = null;
    }
    static public function login($data)
    {
        $email = $data['email'];
        try {

            $query = 'SELECT * FROM clients WHERE email = :email';
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":email" => $email));
            $user = $stmt->fetch(PDO::FETCH_OBJ);
            return $user;
            if ($stmt->execute()) :
                return 'ok';
            endif;
        } catch (PDOException $ex) {
            echo 'erreur' . $ex->getMessage();
        }
    }
}
