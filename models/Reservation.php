<?php
class Reservation
{
    //function for recover all clients
    static public function getAll()
    {
        $stmt = DB::connect()->prepare('SELECT * FROM reservation
        LEFT JOIN terrains
        ON reservation.terrain_id = terrains.terrain_id
        LEFT JOIN clients
        ON reservation.user_id = clients.user_id
        LEFT JOIN sports
        ON reservation.sport_id = sports.sport_id');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }

    //function for recover all clients
    static public function getlimit()
    {
        $stmt = DB::connect()->prepare('SELECT * FROM reservation
        LEFT JOIN terrains
        ON reservation.terrain_id = terrains.terrain_id
        LEFT JOIN clients
        ON reservation.user_id = clients.user_id
        LEFT JOIN sports
        ON reservation.sport_id = sports.sport_id ORDER BY reserv_id 
        DESC
        LIMIT 10');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }
    //function for recover one reservation by id user
    static public function getReserv($data)
    {
        $id = $data['id'];
        try {

            $query = 'SELECT * FROM reservation WHERE reserv_id=:id';
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":id" => $id));
            $employe = $stmt->fetch(PDO::FETCH_OBJ);
            return $employe;
        } catch (PDOException $ex) {
            echo 'erreur' . $ex->getMessage();
        }
    }
    //function for desactive client
    static public function Conferme($data)
    {
        $stmt = DB::connect()->prepare('UPDATE reservation SEt status = :status WHERE reserv_id= :id');
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
