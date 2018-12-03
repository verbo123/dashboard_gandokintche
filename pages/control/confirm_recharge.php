<?php
require 'database.php';
require 'fonction.php';
global  $bdd;

if(isset($_POST["passe"]) && isset($_POST["montant"]) && isset($_POST['user']))
{
    $result=array();
    extract($_POST);
    $password=hash("sha256",$passe); // md5($_GET["passe"]);
//                $password=password_hash($password,PASSWORD_DEFAULT);

    $sql=$bdd->prepare("select * from users where code=? and password=? and active=true");
    $sql->execute(array(getUserLogin(),$password));
    $c=$sql->rowCount();
    if($c == 1){
        $no=strtoupper(generateToken(8));
        $des=infos_user_op_data($user)->code;
        $op='VIR'; //virement
        $typ="REC"; //recharge
        $sq=$bdd->prepare("insert into transaction(no_trans, operation, typ_virement, date, montant, code_user_sender, code_user_receiver) values (?,?,?,NOW(),?,?,?)");
        $sq->execute(array($no,$op,$typ,$montant,getUserLogin(),$des));
        if($sq)
        {
            inserNotif($des,"Vous avez reçu une recharge de ".$montant." FCFA venant de ".
                infos_user(getUserLogin())->nom." ".infos_user(getUserLogin())->prenom).".ID de la transaction ".$no;

            //augmenter chez lui
            $tot1=getMontantUser($des)->total + $montant;
            updateMontant($des,$tot1);

            //Diminuer chez moi dans mon compte de recharge
            $tot2=getMontantUserRecharge(getUserLogin())->solde - $montant;
            updateMontantRecharge(getUserLogin(),$tot2);


            $result['msg'] = 'Transfert de '.$montant.' FCFA avec succès à '. infos_user_op_data($user)->nom." ".infos_user_op_data($user)->prenom.'. ID de la transaction '.$no;

        }
    }else{
        $result =false;
    }

    echo json_encode($result);

}
