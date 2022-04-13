<?php
if (isset($_POST['id_terrain'])) :
    $exitEmploye = new TerrainController();
    $exitEmploye->deleteTerrain();
endif;
