<?php
class TerrainController
{
    //function for recover all terrain  
    public function getAllTerrain()
    {
        $terrain = Terrains::getAll();
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
                'prix' => $_POST['prix']
            );
            $result = Terrains::add($data);
            if ($result === 'ok') {
                // Session::set('success', 'Terrain Ajouté');
                // Redirect::to('ajouter-terrain');
            } else {
                Session::set('info', 'Veuillez réessayer*');
                Redirect::to('ajouter-terrain');
            }
        endif;
    }
    // function for  select one terrain
    public function getOneTerrain($id)
    {
        $patient = Terrains::getTerrain($id);
        return $patient;
    }
    // function for update Terrain
    public function updateTerrain()
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
                'id' => $_POST['id'],
                'image' => $_FILES['image']['name'],
                'terrain' => $_POST['terrain'],
                'localisation' => $_POST['localisation'],
            );
            $result = Terrains::update($data);
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
        if (isset($_POST['delete'])) :
            $data['id'] = $_POST['delete'];
            $result = Terrains::delete($data);
            if ($result === 'ok') {
                Session::set('error', 'Terrain suprimé');
                Redirect::to('patient');
            } else {
                Session::set('info', 'Veuillez réessayer*');
                Redirect::to('ajouter-terrain');
            }
        endif;
    }
}
