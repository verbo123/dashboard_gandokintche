<?php
/**
 * Created by PhpStorm.
 * User: Verbeck DEGBESSE
 * Date: 19/09/2018
 * Time: 20:06
 */
require 'database.php';
global  $bdd;
if(isset($_GET["val"])){
    $result=null;
    $sql=$bdd->prepare("update application set active=? where code_user_app =?");
    $sql->execute(array($_GET["val"],$_COOKIE["account_code"]));
    if($sql)
    {
        $result = true;
    }else{
        $result = false;
    }

    echo json_encode($result);
}
