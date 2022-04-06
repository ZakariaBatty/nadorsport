<?php
class Terrains
{
    //function for add new terrain 
    static public function addTerrain($data)
    {
        $stmt = DB::connect()->prepare(
            'INSERT INTO terrain (image,terrain,localition)
               VALUES(:image,:terrain,:localition)'
        );
        $stmt->bindParam(':image', $data['image']);
        $stmt->bindParam(':terrain', $data['terrain']);
        $stmt->bindParam(':localition', $data['localition']);
        if ($stmt->execute()) :
            return 'ok';
        else :
            return 'error';
        endif;
        $stmt = null;
    }

    // function for recover all Terrain
    static public function getAll()
    {
        $stmt = DB::connect()->prepare('SELECT * FROM terrain');
        $stmt->execute();
        return $stmt->fetchAll();
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

    //function for update patient
    static public function update($data)
    {
        $stmt = DB::connect()->prepare('UPDATE patient SET
        nom = :nom ,prenom = :prenom ,datedenaissance = :datedenaissance ,Matricule = :Matricule ,Civilite = :Civilite ,paye = :paye ,maladie = :maladie, mobile = :mobile  WHERE id_patient= :id');
        $stmt->bindParam(':id', $data['id']);
        $stmt->bindParam(':nom', $data['nom']);
        $stmt->bindParam(':prenom', $data['prenom']);
        $stmt->bindParam(':datedenaissance', $data['datedenaissance']);
        $stmt->bindParam(':Matricule', $data['Matricule']);
        $stmt->bindParam(':Civilite', $data['Civilite']);
        $stmt->bindParam(':paye', $data['paye']);
        $stmt->bindParam(':maladie', $data['maladie']);
        $stmt->bindParam(':mobile', $data['mobile']);
        if ($stmt->execute()) :
            return 'ok';
        else :
            return 'error';
        endif;
        $stmt = null;
    }

    //function for delete patient
    static public function delete($data)
    {
        $id = $data['id'];
        try {
            $query = 'DELETE FROM patient WHERE id_patient=:id';
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
