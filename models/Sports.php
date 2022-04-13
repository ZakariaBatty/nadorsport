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
}
