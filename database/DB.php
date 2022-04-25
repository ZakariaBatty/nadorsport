<?php

class DB
{
    static public function connect()
    {

        $db = new PDO('mysql:host=localhost;dbname=nadorsport', 'nadorsport', '7Yjq6z5#');

        // $db = new PDO('mysql:host=localhost;dbname=nadorsport', 'root', '');
        $db->exec('set names utf8');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        return $db;
    }
}
