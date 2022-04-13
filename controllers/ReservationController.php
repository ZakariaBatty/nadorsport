<?php
class ReservationController
{
    //function for recover all reservation  
    public function getAllReservation()
    {
        $Reservation = Reservation::getAll();
        return $Reservation;
    }

    //function for recover all reservation  
    public function getAllReservationLimit()
    {
        $Reservation = Reservation::getlimit();
        return $Reservation;
    }
    // function for  select one terrain
    public function getOneTerrain($id)
    {
        $terrain = Terrains::getTerrain($id);
        return $terrain;
    }

    // function for delete terrain
    public function deleteTerrain()
    {
        if (isset($_POST['id_terrain'])) :
            $data['id_terrain'] = $_POST['id_terrain'];
            $result = Terrains::delete($data);
            if ($result === 'ok') {
                Session::set('error', 'Terrain suprimé');
                Redirect::to('ajouter-terrain');
            } else {
                Session::set('info', 'Veuillez réessayer*');
                Redirect::to('ajouter-terrain');
            }
        endif;
    }
}
