<?php

class SportController
{
    // function for recover sport
    public function getAllSports()
    {
        $sport = Sports::getAll();
        return $sport;
    }

    // add sport 
    public function addSport()
    {
        if (isset($_POST['checkout'])) :
            $data = array(
                'name_sport' => $_POST['name_sport'],
            );
            $result = Sports::add($data);
            if ($result === 'ok') {
                Session::set('success', 'Sport effectuée avec succès');
                Redirect::to('dashbord');
            } else {
                echo $result;
            }

        endif;
    }
}
