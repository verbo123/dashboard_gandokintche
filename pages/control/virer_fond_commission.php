<?php
require 'database.php';
require 'fonction.php';
global  $bdd;

if(isset($_POST["montant"]) && isset($_POST["passe"]))
{
    $result=array();
    extract($_POST);
    if($montant > 0 && $montant==getMontantUser(getUserLogin())->montant_commission)
    {

        $password=hash("sha256",$passe);
        $rec=$bdd->prepare("select * from users where code=? and password=? and active=true");
        $rec->execute(array(getUserLogin(),$password));
        $c=$rec->rowCount();
        if($c == 1)
        {
            $cal=getMontantUser(getUserLogin())->total+$montant;
            $sql=$bdd->prepare("update solde set total=? where code_user_solde=?");
            $sql->execute(array($cal,getUserLogin()));

            $sql=$bdd->prepare("update solde set montant_commission=? where code_user_solde=?");
            $sql->execute(array(0,getUserLogin()));

            $result = "Vous avez virer ".$montant." FCFA sur votre compte principale";
        }
        else
        {
            $result["msg"]="Désolé, votre mot de passe est incorrect ! ";
        }

    }
    else {
        $result["msg"]="Désolé, vous n'avez aucune commission ! ";
    }

    echo json_encode($result);
}