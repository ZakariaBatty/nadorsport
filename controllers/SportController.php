<?php

class SportController
{
    // function for recover sport
    public function getAllSports()
    {
        $sport = Sports::getAll();
        return $sport;
    }
}
