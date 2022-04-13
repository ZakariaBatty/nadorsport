<?php
class Admin
{
    //create user
    static public function createUser($data)
    {
        $stmt = DB::connect()->prepare('INSERT INTO admin (lastName,firstName,email,password,photo,phone)
            VALUES(:lastName,:firstName,:email,:password,:photo,:phone)');
        $stmt->bindParam(':lastName', $data['lastName']);
        $stmt->bindParam(':firstName', $data['firstName']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':password', $data['password']);
        $stmt->bindParam(':photo', $data['photo']);
        $stmt->bindParam(':phone', $data['phone']);
        if ($stmt->execute()) :
            return 'ok';
        else :
            return 'error';
        endif;
        $stmt = null;
    }
    // function for login
    static public function login($data)
    {
        $email = $data['email'];
        try {

            $query = 'SELECT * FROM admin WHERE email = :email';
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

    //function for select one admin 
    static public function getAdmmin($id)
    {
        try {
            $query = 'SELECT * FROM admin WHERE id = :id';
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":id" => $id));
            $stmtadmin = $stmt->fetch(PDO::FETCH_OBJ);
            return $stmtadmin;
        } catch (PDOException $ex) {
            echo 'erreur' . $ex->getMessage();
        }
    }

    //function for update admin
    static public function update($data)
    {
        $stmt = DB::connect()->prepare('UPDATE admin SEt 
          firstName = :firstName, lastName = :lastName,email = :email ,phone = :phone  WHERE id= :id');
        $stmt->bindParam(':id', $data['id']);
        $stmt->bindParam(':firstName', $data['firstName']);
        $stmt->bindParam(':lastName', $data['lastName']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':phone', $data['phone']);

        if ($stmt->execute()) :
            return 'ok';
        else :
            return 'error';
        endif;
        $stmt = null;
    }

    //function for desactive account client
    static public function desaAdmin($data)
    {
        $stmt = DB::connect()->prepare('UPDATE admin SEt 
          status = :status   WHERE id= :id');
        $stmt->bindParam(':id', $data['id']);
        $stmt->bindParam(':status', $data['status']);

        if ($stmt->execute()) :
            return 'ok';
        else :
            return 'error';
        endif;
        $stmt = null;
    }

    // function for change password 
    static public function changePassowrd($data)
    {
        $stmt = DB::connect()->prepare('UPDATE admin SEt 
          password = :password   WHERE id= :id');
        $stmt->bindParam(':id', $data['id']);
        $stmt->bindParam(':password', $data['password']);

        if ($stmt->execute()) :
            return 'ok';
        else :
            return 'error';
        endif;
        $stmt = null;
    }
}
