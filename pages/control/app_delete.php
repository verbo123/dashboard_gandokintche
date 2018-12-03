<?php
require 'database.php';
global  $bdd;
if(isset($_GET["del"]))
{
    $result=null;

    $sq=$bdd->prepare("update compte_marhand set app_connect=? where user_created =?");
    $sq->execute(array(null,$_COOKIE["account_code"]));

    $sql=$bdd->prepare("delete from application where code_app=?");
    $sql->execute(array($_GET["del"]));
    if($sql)
    {
        $result = true;
    }
    else
    {
        $result = false;
    }

    echo json_encode($result);
}
