<?php

class CpanelController
{
    public function index($page)
    {
        include('views/admin/' . $page . '.php');
    }
}
