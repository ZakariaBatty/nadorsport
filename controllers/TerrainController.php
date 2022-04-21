<?php
class TerrainController
{
    //function for recover all terrain  byid sport
    public function getAllTerrain()
    {
        $terrain = Terrains::getAll();
        return $terrain;
    }
    //function for recover all terrain  limit by id sport
    public function getAllTerrainLimit()
    {
        $terrain = Terrains::getAlllimit();
        return $terrain;
    }
    // function for  select one terrain
    public function getOneTerrain($id)
    {
        $terrain = Terrains::getTerrain($id);
        return $terrain;
    }
    // function for  select terrain bay sport
    public function getAllTerrainBySport($id)
    {
        $terrain = Terrains::getTerrainBySport($id);
        return $terrain;
    }

    // function for add terrain to database
    public function addTerrain()
    {
        if (isset($_POST['submit'])) :
            $dir = "assets/img/portfolio/";
            $target = $dir . basename($_FILES['image']['name']);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target, PATHINFO_EXTENSION));

            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if ($check !== false) {

                $uploadOk = 1;
            } else {

                $uploadOk = 0;
            }
            // Allow certain file formats
            if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            ) {
                // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                return "error";
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target)) {
                }
            }
            $data = array(
                'image' => $_FILES['image']['name'],
                'terrain' => $_POST['terrain'],
                'localisation' => $_POST['localisation'],
                'prix' => $_POST['prix'],
                'sport_id' => $_POST['sport_id']
            );
            $result = Terrains::add($data);
            if ($result === 'ok') {
                Session::set('success', 'Terrain Ajouté');
                Redirect::to('ajouter-terrain');
            } else {
                Session::set('info', 'Veuillez réessayer*');
                Redirect::to('ajouter-terrain');
            }
        endif;
    }

    // function for update Terrain
    public function updateTerrain()
    {
        if (isset($_POST['Modifier'])) :
            // Check if image file is a actual image or fake image
            $image = $_FILES['image']['name'];
            $dir = "assets/img/portfolio/";
            $target = $dir . basename($_FILES['image']['name']);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target, PATHINFO_EXTENSION));
            $check = getimagesize($_FILES["image"]["tmp_name"]);

            if ($image == "") {
                $image = $_POST['image-terrain'];
            } else {
                if ($check !== false) {

                    $uploadOk = 1;
                }
                // Allow certain file formats
                if (
                    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                ) {
                    // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    return "error";
                    // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target)) {
                    }
                }
            }
            // data
            $data = array(
                'terrain_id' => $_POST['terrain_id'],
                'image' =>  $image,
                'terrain' => $_POST['terrain'],
                'localisation' => $_POST['localisation'],
                'prix' => $_POST['prix'],
                'sport_id' => $_POST['sport_id']
            );
            $result = Terrains::update($data);
            ($result);
            if ($result === 'ok') {
                Session::set('success', 'Terrain Modifié');
                Redirect::to('ajouter-terrain');
            } else {
                Session::set('info', 'Veuillez réessayer*');
                Redirect::to('ajouter-terrain');
            }
        endif;
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
