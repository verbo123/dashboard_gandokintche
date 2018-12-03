<?php
/**
 * Created by PhpStorm.
 * User: Verbeck DEGBESSE
 * Date: 22/09/2018
 * Time: 08:36
 */
require 'database.php';
global  $bdd;
if(isset($_GET["val"])){
    $result=null;
    $sql=$bdd->prepare("update compte_marhand set app_connect=? where user_created =?");
    $sql->execute(array($_GET["val"],$_COOKIE["account_code"]));
    if($sql)
    {
        $result = true;
    }else{
        $result = false;
    }

    echo json_encode($result);
}
