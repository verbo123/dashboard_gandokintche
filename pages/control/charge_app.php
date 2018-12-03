<?php
require 'database.php';
global $bdd;
if(isset($_GET["val"])){
    $result=null;
    $sql=$bdd->prepare("select * from application where code_app=?");
    $sql->execute(array($_GET["val"]));
    if($sql)
    {
            $row=$sql->fetch(PDO::FETCH_OBJ);
            $result=$row;
    }
    echo json_encode($result);
}