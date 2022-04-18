<?php
class Terrains
{
    // function for recover all Terrain,sport_id
    static public function getAll()
    {
        try {
            $stmt = DB::connect()->prepare('SELECT * FROM terrains INNER JOIN sports ON terrains.sport_id = sports.sport_id');
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $ex) {
            echo 'erreur' . $ex->getMessage();
        }
    }

    static public function getAlllimit()
    {
        try {
            $stmt = DB::connect()->prepare('SELECT * FROM terrains INNER JOIN sports ON terrains.sport_id = sports.sport_id  ORDER BY terrain_id DESC LIMIT 3');
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $ex) {
            echo 'erreur' . $ex->getMessage();
        }
    }
    //function for add new terrain 
    static public function add($data)
    {
        $stmt = DB::connect()->prepare(
            'INSERT INTO terrains (image,terrain,localisation,prix,sport_id)
               VALUES(:image,:terrain,:localisation,:prix,:sport_id)'
        );
        $stmt->bindParam(':image', $data['image']);
        $stmt->bindParam(':terrain', $data['terrain']);
        $stmt->bindParam(':localisation', $data['localisation']);
        $stmt->bindParam(':prix', $data['prix']);
        $stmt->bindParam(':sport_id', $data['sport_id']);
        if ($stmt->execute()) :
            return 'ok';
        else :
            return 'error';
        endif;
        $stmt = null;
    }

    //function for select one terrain 
    static public function getTerrain($id)
    {
        try {
            $query = 'SELECT * FROM terrains INNER JOIN sports ON terrains.sport_id = sports.sport_id WHERE terrain_id = :id';
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":id" => $id));
            $terrain = $stmt->fetch(PDO::FETCH_OBJ);
            return $terrain;
        } catch (PDOException $ex) {
            echo 'erreur' . $ex->getMessage();
        }
    }

    //function for select one idsport 
    static public function getTerrainBySport($sport_id)
    {
        try {
            $query = 'SELECT * FROM terrains INNER JOIN sports ON terrains.sport_id = sports.sport_id WHERE sport_id = :id';
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":id" => $sport_id));
            $ordonnance = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $ordonnance;
        } catch (PDOException $ex) {
            echo 'erreur' . $ex->getMessage();
        }
    }

    //function for update terrain
    static public function update($data)
    {
        print_r($data);
        $stmt = DB::connect()->prepare('UPDATE terrains SET
        image = :image ,terrain = :terrain ,localisation = :localisation ,prix = :prix ,sport_id = :sport_id   WHERE terrain_id= :terrain_id');
        $stmt->bindParam(':terrain_id', $data['terrain_id']);
        $stmt->bindParam(':image', $data['image']);
        $stmt->bindParam(':terrain', $data['terrain']);
        $stmt->bindParam(':localisation', $data['localisation']);
        $stmt->bindParam(':prix', $data['prix']);
        $stmt->bindParam(':sport_id', $data['sport_id']);
        if ($stmt->execute()) :
            return 'ok';
        else :
            return 'error';
        endif;
        $stmt = null;
    }

    //function for delete terrain
    static public function delete($data)
    {
        $id = $data['id_terrain'];
        // die($id);
        try {
            $query = 'DELETE FROM terrains WHERE terrain_id=:id_terrain';
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":id_terrain" => $id));
            if ($stmt->execute()) :
                return 'ok';
            endif;
        } catch (PDOException $ex) {
            echo 'erreur' . $ex->getMessage();
        }
    }
}
