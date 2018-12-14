<?php
require 'database.php';
require 'fonction.php';
global  $bdd;
if(isset($_POST['montant']) && isset($_POST['user']))
{
    extract($_POST);
    $result=array();
    if(verifyR('recharge_autorisation','utilisateur',getUserLogin()) == true)
    {
        if(verify('users','op_code',$user) == true)
        {
            $req=$bdd->prepare('select * from recharge_autorisation where utilisateur=?');
            $req->execute(array(getUserLogin()));
            $row=$req->fetch(PDO::FETCH_OBJ);
            if($montant >=500)
            {
                if($row->solde >= $montant)
                {
                    $data=infos_user_op_data($user);
                    $result=array(
                        "nom" => $data->nom,
                        "prenom" => $data->prenom
                    );

                }else{
                    if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "en_US")
                    {
                        $result['msg']='Your balance is insufficient to make this transfer. Please contact us to recharge your recharge account';
                    }else{
                        $result['msg']='Votre solde est insuffisant pour effectuer ce transfert. Veuillez nous contactez pour recharger votre compte de recharge';
                    }
                }
            }else{
                if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "en_US")
                {
                    $result['msg']='Enter an amount greater than or equal to 500 FCFA';
                }else{
                    $result['msg']='Entrer un montant supérieur ou égal à 500 FCFA';
                }

            }

        }else{
            if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "en_US")
            {
                $result['msg']="The recipient's login is incorrect";
            }else{
                $result['msg']='Le login du destinataire est incorrect';
            }

        }
    }else{
        if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "en_US")
        {
            $result['msg']="You have no authorization to use this service";
        }else{
            $result['msg']='Vous n\'avez aucune autorisation pour utiliser ce service';
        }

    }

    echo json_encode($result);
}