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
        $recharge=$montant-getCommission($montant);
        $sq=$bdd->prepare("insert into transaction(no_trans, operation, typ_virement, date, montant, code_user_sender, code_user_receiver) values (?,?,?,NOW(),?,?,?)");
        $sq->execute(array($no,$op,$typ,$recharge,getUserLogin(),$des));
        if($sq)
        {
            inserNotif($des,"Vous avez reçu une recharge de ".($montant-getCommission($montant))." FCFA venant de ".
                infos_user(getUserLogin())->nom." ".infos_user(getUserLogin())->prenom).".ID de la transaction ".$no;

            //la commission
            $com=getCommission($montant) - (getCommission($montant)*0.1);
            $benif=getCommission($montant)*0.1; //notre bénéfice 10%
            $rec=$bdd->prepare("insert into trace_recharge(id_tans,codeDist, codeClient, depot_reel, commission, mt_rechargee) values (?,?,?,?,?,?)");
            $rec->execute(array($no,getUserLogin(),$des,$montant,$com,$montant-getCommission($montant)));

            //Nos Bénéfices après recharge
            $benef=$bdd->prepare("insert into benefices(id_trans,benef) values (?,?)");
            $benef->execute(array($no,getCommission($montant)*0.1));

            //augmenter chez lui
            $tot1=getMontantUser($des)->total + ($montant-getCommission($montant));
            updateMontant($des,$tot1);

            //Diminuer chez moi dans mon compte de recharge
            $tot2=getMontantUserRecharge(getUserLogin())->solde - $montant;
            updateMontantRecharge(getUserLogin(),$tot2);

            updateCommission(getUserLogin(),getMontantUser(getUserLogin())->montant_commission+$com);

            //mettre a jour le benefice total
            $fix=$bdd->prepare("update solde_benefice set montant = montant + ? where id=1");
            $fix->execute(array(getCommission($montant)*0.1));

            if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "en_US")
            {
                $result['msg'] = 'Transfer from '.$montant.' FCFA successfully to '. infos_user_op_data($user)->nom." ".infos_user_op_data($user)->prenom.'.Transaction ID '.$no;
            }else{
                $result['msg'] = 'Transfert de '.$montant.' FCFA avec succès à '. infos_user_op_data($user)->nom." ".infos_user_op_data($user)->prenom.'. ID de la transaction '.$no;

            }

        }
    }else{
        $result =false;
    }

    echo json_encode($result);

}
