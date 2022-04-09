<?php
class Terrains
{
    // function for recover all Terrain
    static public function getAll()
    {
        $stmt = DB::connect()->prepare('SELECT * FROM terrain');
        $stmt->execute();
        return $stmt->fetchAll();
    }
    //function for add new terrain 
    static public function add($data)
    {
        $stmt = DB::connect()->prepare(
            'INSERT INTO terrain (image,terrain,localisation,prix)
               VALUES(:image,:terrain,:localisation,:prix)'
        );
        $stmt->bindParam(':image', $data['image']);
        $stmt->bindParam(':terrain', $data['terrain']);
        $stmt->bindParam(':localisation', $data['localisation']);
        $stmt->bindParam(':prix', $data['prix']);
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
            $query = 'SELECT * FROM terrain WHERE id_terrain = :id';
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":id" => $id));
            $ordonnance = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $ordonnance;
        } catch (PDOException $ex) {
            echo 'erreur' . $ex->getMessage();
        }
    }

    //function for update terrain
    static public function update($data)
    {
        $stmt = DB::connect()->prepare('UPDATE terrain SET
        image = :image ,terrain = :terrain ,localisation = :localisation   WHERE id_terrain= :id');
        $stmt->bindParam(':image', $data['image']);
        $stmt->bindParam(':terrain', $data['terrain']);
        $stmt->bindParam(':localisation', $data['localisation']);
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
        $id = $data['id'];
        try {
            $query = 'DELETE FROM terrain WHERE id_terrain=:id';
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":id" => $id));
            if ($stmt->execute()) :
                return 'ok';
            endif;
        } catch (PDOException $ex) {
            echo 'erreur' . $ex->getMessage();
        }
    }
}
