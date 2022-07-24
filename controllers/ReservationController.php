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

    // get all reservation by id terrain
    public function calendar($id)
    {
        $calendar = Reservation::calendarByIdTerrain($id);
        $data = array();
        foreach ($calendar as $row) {
            $data[] = array(
                'id' => $row['reserv_id'],
                'start' => $row['start_datatime'],
                'end' => $row['end_datatime']
            );
        }
        return json_encode($data);
    }

    // get all reservation for calendar page home 
    public function calendar_home()
    {
        $calendar = Reservation::getAll();
        $data = array();
        foreach ($calendar as $row) {
            $title = $row['name_sport'] . ' ' . $row['terrain'];

            $data[] = array(
                'id' => $row['reserv_id'],
                'start' => $row['start_datatime'],
                'end' => $row['end_datatime'],
                'title' => $title
            );
        }
        return json_encode($data);
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
            $start_datatime = $_POST['start_datatime'] . ' ' . $_POST['hour_start'];
            $end_datatime = $_POST['start_datatime'] . ' ' . $_POST['hour_end'];
            // if (!$_POST['end_datatime'] = '') {
            //     $end_datatime = $_POST['end_datatime'] . ' ' . $_POST['hour_end'];
            // } else {
            //     $end_datatime = $_POST['start_datatime'] . ' ' . $_POST['hour_end'];
            // }
            $data = array(
                'terrain_id' => $_POST['terrain_id'],
                'sport_id' => $_POST['sport_id'],
                'start_datatime' => $start_datatime,
                'end_datatime' => $end_datatime
            );
            print_r($data);
            $result = Reservation::check($data);
            if (
                $result->terrain_id === $_POST['terrain_id'] && $result->sport_id === $_POST['sport_id']
                && $result->start_datatime === $_POST['start_datatime']
            ) {
                Session::set('error', 'terrain de foot réservé');
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
                'start_datatime' => $_POST['start_datatime'],
                'end_datatime' => $_POST['end_datatime'],
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
