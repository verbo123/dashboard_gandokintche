<?php
/**
 * Created by PhpStorm.
 * User: Verbeck DEGBESSE
 * Date: 19/09/2018
 * Time: 15:07
 */


require 'database.php';
global  $bdd;
if(isset($_GET["val"])){
    $result=null;
    $sql=$bdd->prepare("update m_autorisation set virement=? where user_c =?");
    $sql->execute(array($_GET["val"],$_COOKIE["account_code"]));
    if($sql)
    {
        $result = true;
    }else{
        $result = false;
    }

    echo json_encode($result);
}
