<?php
class Client
{
    //function for recover all clients
    static public function getAll()
    {
        $stmt = DB::connect()->prepare('SELECT * FROM clients');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }

    //function for recover all clients limit 10
    static public function getLimit()
    {
        $stmt = DB::connect()->prepare('SELECT * FROM clients ORDER BY user_id  DESC LIMIT 10');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }
    //function for update client
    static public function update($data)
    {
        $stmt = DB::connect()->prepare('UPDATE clients SEt 
        firstName = :firstName, lastName = :lastName,email = :email ,phone = :phone  WHERE user_id= :id');
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
    //function for recover one client 
    static public function getClient($id)
    {
        try {

            $query = 'SELECT * FROM clients WHERE user_id=:id';
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":id" => $id));
            $employe = $stmt->fetch(PDO::FETCH_OBJ);
            return $employe;
        } catch (PDOException $ex) {
            echo 'erreur' . $ex->getMessage();
        }
    }
    //function for desactive client
    static public function desaClient($data)
    {
        $stmt = DB::connect()->prepare('UPDATE clients SEt 
        status = :status   WHERE user_id= :id');
        $stmt->bindParam(':id', $data['id']);
        $stmt->bindParam(':status', $data['status']);

        if ($stmt->execute()) :
            return 'ok';
        else :
            return 'error';
        endif;
        $stmt = null;
    }
    // change password 
    static public function changePassowrd($data)
    {
        $stmt = DB::connect()->prepare('UPDATE clients SEt 
          password = :password WHERE user_id= :id');
        $stmt->bindParam(':id', $data['id']);
        $stmt->bindParam(':password', $data['password']);
        if ($stmt->execute()) :
            return 'ok';
        else :
            return 'error';
        endif;
        $stmt = null;
    }

    //uplod profile
    static public function upload($data)
    {
        $stmt = DB::connect()->prepare('UPDATE clients SEt photo = :photo  WHERE user_id= :id');
        $stmt->bindParam(':id', $data['id']);
        $stmt->bindParam(':photo', $data['photo']);
        if ($stmt->execute()) :
            return 'ok';
        else :
            return 'error';
        endif;
        $stmt = null;
    }
}
