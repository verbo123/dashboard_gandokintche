<?php
require 'database.php';
global  $bdd;

if(isset($_GET["email"]) && isset($_GET["passe"]))
{
  $result=null;
    $password=hash("sha256",$_GET["passe"]); // md5($_GET["passe"]);
//                $password=password_hash($password,PASSWORD_DEFAULT);

        $sql=$bdd->prepare("select * from users where adresse=? and password=? and active=true");
        $sql->execute(array($_GET["email"],$password));
        $c=$sql->rowCount();
        if($c == 1){
            $result = true;
        }else{
            $result =false;
        }

    echo json_encode($result);

}
