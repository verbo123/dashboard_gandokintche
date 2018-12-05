<?php
/**
 * Created by PhpStorm.
 * User: Verbeck DEGBESSE
 * Date: 04/09/2018
 * Time: 13:13
 */


function getVirement()
{
    global  $bdd;
    $login=getUserLogin();
    $result=array();


    
        $sql=$bdd->prepare("select * from transaction where  operation='VIR' and code_user_sender=? ");
        $sql->execute(array($login));
        if($sql)
        {
            while ($row=$sql->fetch(PDO::FETCH_OBJ))
            {
                $result[]=$row;
            }
        }
    

    return $result;
}

function getVirementRecharge()
{
    global  $bdd;
    $login=getUserLogin();
    $result=array();
    $sql=$bdd->prepare("select * from transaction where  typ_virement=? and code_user_sender=? ");
    $sql->execute(array('REC',$login));
    if($sql)
    {
        while ($row=$sql->fetch(PDO::FETCH_OBJ))
        {
            $result[]=$row;
        }
    }
    return $result;
}


function virementPonctuel($montant,$login_destinataire=array(),$passe)
{
        global  $bdd;
        $mylogin=getUserLogin();
        $message=array();


        $nbre_login=count($login_destinataire);

        //var_dump($montant*$nbre_login);

        $req=$bdd->prepare("select * from users where code=? and password=?");
        $req->execute(array($mylogin,hash("sha256",$passe)));
        if($req->rowCount() == 1)
        {
            if(permission_service()->virement == "true")
            {
                $toto=getMontantUser(getUserLogin())->total;

                if($toto >0 && $toto >= $montant*$nbre_login)
                {
                    foreach ($login_destinataire as $login)
                    {
                        $no=strtoupper("ID_".generateToken(8));
                        $op='VIR'; //virement
                        $typ="CLA"; //classique
                        if(verify("users","op_code",$login) == true){
                            $des=infos_user_op_data($login)->code;
                            $sq=$bdd->prepare("insert into transaction(no_trans, operation, typ_virement, date, montant, code_user_sender, code_user_receiver) values (?,?,?,NOW(),?,?,?)");
                            $sq->execute(array($no,$op,$typ,$montant,getUserLogin(),$des));
                            if($sq)
                            {
                                inserNotif($des,"Vous avez reçu sur votre compte, un montant de ".$montant." FCFA venant de ".
                                    infos_user(getUserLogin())->nom." ".infos_user(getUserLogin())->prenom);

                                //augmenter chez lui
                                $tot1=getMontantUser($des)->total + $montant;
                                updateMontant($des,$tot1);

                                //Diminuer chez moi
                                $tot2=$toto - $montant;
                                updateMontant(getUserLogin(),$tot2);

                                echo '<div id="msg" class="alert alert-success"> <button type="button" class="close" data-dismiss="alert">&times;</button>' .
                                    'Virement effectué avec succès pour '. infos_user_op_data($login)->nom." ".infos_user_op_data($login)->prenom.
                                    '</div>';
                            }

                        }else{
                            echo '<div id="msg" class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert">&times;</button>' .
                                'Désolé, Le code de virement '.$login.' n\'existe pas !'.
                                '</div>';
                        }

                    }

                }else{
                    echo '<div id="msg" class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert">&times;</button>' .
                     'Désolé, Votre solde est insuffisant. Recharger, puis réessayer. Merci !'.
                     '</div>';
                }
            }else{
                echo '<div id="msg" class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert">&times;</button>' .
                    'Désolé, Vous n\'avez l\'autorisation de faire un virement. Activé cette fonctionnalité dans vos paramètres.'.
                    '</div>';
            }
        }else{
           echo '<div id="msg" class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>' .
             'Désolé, code de sécurité incorrect ! '.
             '</div>';
        }



}

