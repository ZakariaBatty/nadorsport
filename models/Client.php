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
    //function for update client
    static public function update($data)
    {
        $stmt = DB::connect()->prepare('UPDATE clients SEt 
        name = :name ,email = :email ,phone = :phone  WHERE id= :id');
        $stmt->bindParam(':id', $data['id']);
        $stmt->bindParam(':name', $data['name']);
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
    static public function getClient($data)
    {
        $id = $data['id'];
        try {

            $query = 'SELECT * FROM clients WHERE id=:id';
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
}
