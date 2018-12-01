<?php

try{
     $bdd = new PDO('mysql:host=db339832-wazemi-database.sql-pro.online.net;dbname=db339832_wazemi_database', 'db99224', 'Verbeck94#');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $bdd->exec("set names utf8");
} catch (Exception $ex) {
    die('Erreur '. $ex->getMessage());
}

