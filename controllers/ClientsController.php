<?php

class ClientsController
{
    public function index($page)
    {
        include('views/clients/' . $page . '.php');
    }
}
