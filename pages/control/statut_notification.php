<?php
require 'database.php';
if(isset($_GET["id"]))
{
    global  $bdd;
    $sql=$bdd->prepare("update notification set statut=? where id=?");
    $sql->execute(array("VU",$_GET["id"]));

}
