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
    // function for  select one terrain by user_id
    public function getOneReservation()
    {
        $terrain = Reservation::getReserv($_SESSION['user_id']);
        return $terrain;
    }

    // check if reservation exect 
    public function checkReservation()
    {
        if (isset($_POST['check'])) :
            $data = array(
                'terrain_id' => $_POST['terrain_id'],
                'sport_id' => $_POST['sport_id'],
                'date_' => $_POST['date_'],
                'hour_start' => $_POST['hour_start'],
                'hour_fin' => $_POST['hour_fin']
            );
            $result = Reservation::check($data);
            die($result);

        // if ($result->reserv_id) {
        //     Session::set('error', 'terrain deje reserves');
        //     Redirect::to('all-terrien');
        // } else if (!$result->reserv_id) {
        //     $data['user_id'] = 29;
        //     $data['status_reservation'] = 'confirmé';
        //     $_SESSION['reservation'] = $data;
        //     Redirect::to('checkout');
        // } else {
        //     Session::set('info', 'Veuillez réessayer*');
        //     Redirect::to('all-terrien');
        // }
        endif;
    }

    // add reservation 
    public function addReservation()
    {
        if (isset($_POST['submit'])) :
            // $data['user_id'] = 29;
            // $data['status_reservation'] = 'confirmé';
            // $data = array(
            //     'user_id' => $_POST['user_id'],
            //     'terrain_id' => $_POST['terrain_id'],
            //     'sport_id' => $_POST['sport_id'],
            //     'date_' => $_POST['date_'],
            //     'hour_start' => $_POST['hour_start'],
            //     'hour_fin' => $_POST['hour_fin'],
            //     'status_reservation' => 'confirmé',
            // );
            $data = $_SESSION['reservation'];
            $result = Reservation::add($data);
            if ($result === 'ok') {
                unset($_SESSION['reservation']);
                Session::set('success', 'réservation effectuée avec succès');
                Redirect::to('checkout');
            } else {
                echo $result;
            }

        endif;
    }

    // function for delete terrain
    // public function deleteTerrain()
    // {
    //     if (isset($_POST['id_terrain'])) :
    //         $data['id_terrain'] = $_POST['id_terrain'];
    //         $result = Terrains::delete($data);
    //         if ($result === 'ok') {
    //             Session::set('error', 'Terrain suprimé');
    //             Redirect::to('ajouter-terrain');
    //         } else {
    //             Session::set('info', 'Veuillez réessayer*');
    //             Redirect::to('ajouter-terrain');
    //         }
    //     endif;
    // }
}
