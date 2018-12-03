<?php
require 'database.php';
    global  $bdd;
    $result=null;
    $sql=$bdd->prepare("select * from compte_marhand where user_created=?");
    $sql->execute(array($_COOKIE["account_code"]));
    if($sql->rowCount() == 1)
    {
        $result = true;
    }else{
        $result = false;
    }

    echo json_encode($result);

