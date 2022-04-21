<?php

class Sports
{
    // get all  sport 
    static public function getAll()
    {
        $stmt = DB::connect()->prepare('SELECT * FROM sports');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->closeCursor();
        $stmt = null;
    }

    //function chack if reservation exect
    static public function add($data)
    {
        $stmt = DB::connect()->prepare('INSERT INTO `sports` (`name_sport`)VALUES (:name_sport)');
        $stmt->bindParam(':name_sport', $data['name_sport']);
        if ($stmt->execute()) :
            return 'ok';
        else :
            return 'error';
        endif;
        $stmt = null;
    }
}
