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

    // function for  select one terrain by terrain
    public function reservationChockout()
    {
        $terrain = Reservation::getReservbyTerrein($_SESSION['reservation']['terrain_id']);
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
            if (
                $result->terrain_id === $_POST['terrain_id'] && $result->sport_id === $_POST['sport_id']
                && $result->date_ === $_POST['date_'] && $result->hour_start === $_POST['hour_start'] && $result->hour_fin === $_POST['hour_fin']
            ) {
                Session::set('success', 'terrain de foot réservé');
                Redirect::to('all-terrien');
            } else {
                $_SESSION['reservation'] = $data;
                Redirect::to('checkout');
            }
        endif;
    }

    // add reservation 
    public function addReservation()
    {
        if (isset($_POST['checkout'])) :
            $data = array(
                'user_id' => $_POST['user_id'],
                'terrain_id' => $_POST['terrain_id'],
                'sport_id' => $_POST['sport_id'],
                'date_' => $_POST['date_'],
                'hour_start' => $_POST['hour_start'],
                'hour_fin' => $_POST['hour_fin'],
                'status_reservation' => $_POST['status_reservation'],
            );
            $result = Reservation::add($data);
            if ($result === 'ok') {
                unset($_SESSION['reservation']);
                Session::set('success', 'réservation effectuée avec succès');
                Redirect::to('dashbord');
            } else {
                echo $result;
            }

        endif;
    }

    // function for chnage statut
    public function changeStatus()
    {
        if (isset($_POST['chnageStatus'])) :
            $data = array(
                'id' => $_POST['id'],
                'status' => $_POST['status'],
            );
            $result = Reservation::Conferme($data);
            if ($result === 'ok') {
                Session::set('success', 'status a bien été change');
                Redirect::to('reservation');
            } else {
                echo $result;
                Session::set('error', 'Veuillez réessayer*');
                Redirect::to('reservation');
            }
        endif;
    }

    // function for delete terrain
    public function deleteReservation()
    {
        if (isset($_POST['delete'])) :
            $data['reserv_id'] = $_POST['reserv_id'];
            $result = Reservation::delete($data);
            if ($result === 'ok') {
                Session::set('error', 'Reservation suprimé');
                Redirect::to('reservation');
            } else {
                Session::set('info', 'Veuillez réessayer*');
                Redirect::to('reservation');
            }
        endif;
    }
}
