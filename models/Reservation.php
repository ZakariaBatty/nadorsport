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
    static public function getReserv($id)
    {
        try {

            $query = 'SELECT * FROM reservation 
            LEFT JOIN terrains 
            ON reservation.terrain_id = terrains.terrain_id 
            LEFT JOIN clients 
            ON reservation.user_id = clients.user_id 
            LEFT JOIN sports 
            ON reservation.sport_id = sports.sport_id 
            WHERE reservation.user_id = :id 
            ORDER BY reserv_id DESC';
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
    //function chack if reservation exect
    static public function check($data)
    {
        try {
            $stmt = DB::connect()->prepare(
                'SELECT * FROM `reservation` WHERE (terrain_id = :terrain_id AND sport_id = :sport_id AND  date_ =  :date_ 
             AND hour_start = :hour_start  AND hour_fin = :hour_fin )'
            );
            $stmt->execute(array(
                'terrain_id' => $data['terrain_id'],
                'sport_id' => $data['sport_id'],
                'date_' => '2022-06-22',
                'hour_start' => '08:00',
                'hour_fin' => '10:30'
            ));
            $reservation = $stmt->fetch(PDO::FETCH_OBJ);
            return $reservation;
        } catch (PDOException $ex) {
            echo 'erreur' . $ex->getMessage();
        }
    }

    //function chack if reservation exect
    static public function add($data)
    {
        $stmt = DB::connect()->prepare('INSERT INTO `reservation` (`user_id`, `terrain_id`, `sport_id`, `date_`, `hour_start`, `hour_fin`, `status_reservation`) 
            VALUES ( :user_id, :terrain_id, :sport_id,:date_, :hour_start, :hour_fin,  :status_reservation)');
        $stmt->bindParam(':user_id', $data['user_id']);
        $stmt->bindParam(':terrain_id', $data['terrain_id']);
        $stmt->bindParam(':sport_id', $data['sport_id']);
        $stmt->bindParam(':date_', $data['date_']);
        $stmt->bindParam(':hour_start', $data['hour_start']);
        $stmt->bindParam(':hour_fin', $data['hour_fin']);
        $stmt->bindParam(':status_reservation', $data['status_reservation']);
        if ($stmt->execute()) :
            return 'ok';
        else :
            return 'error';
        endif;
        $stmt = null;
    }
}
