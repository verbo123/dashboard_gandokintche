<?php

function save_autorisation_user($data=array())
{
    global $bdd;
    $sql=$bdd->prepare("insert into user_autorisation(marchand_id, user_sender, groupe) values (?,?,?)");
    $sql->execute($data);
}




function getUser_Auto()
{
    global $bdd;
    $result=array();
    $sql=$bdd->prepare("select * from user_autorisation where user_sender=?");
    $sql->execute(array(getUserLogin()));
    if($sql)
    {
        while ($row=$sql->fetch(PDO::FETCH_OBJ))
        {
            $result[]=$row;
        }
    }

    return $result;
}

function save_compte_marchand($data=array())
{

        extract($_POST);
        global $bdd;
        if(verify("compte_marhand","user_created",getUserLogin()) == false)
        {
       $sql=$bdd->prepare("insert into compte_marhand(code_marchand, user_created, date_created, nom_entreprise, pays,ville, adresse, numero, site_web,email) values (?,?,now(),?,?,?,?,?,?,?)");
            $sql->execute($data);
            if ($sql)
            {
                echo '<div id="msg" class="alert alert-success"> <button type="button" class="close" data-dismiss="alert">&times;</button>'.
                    'Enregistrement effectué avec succès !'.
                    '</div>';
            }
        }else
        {
            echo '<div id="msg" class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>'.
                'Vous avez déjà un compte marchand !'.
                '</div>';

        }

}


function update_compte_marchand($entreprise,$pays,$ville,$adresse,$numero,$site,$email)
{

    extract($_POST);
    global $bdd;
    if(verify("compte_marhand","user_created",getUserLogin()) == true)
    {
        $sql=$bdd->prepare("update compte_marhand set nom_entreprise=?, pays=?,ville=?, adresse=?, numero=?, site_web=?,email=? where user_created=?");
        $sql->execute(array($entreprise,$pays,$ville,$adresse,$numero,$site,$email,getUserLogin()));
        if ($sql)
        {
            echo '<div id="msg" class="alert alert-success"> <button type="button" class="close" data-dismiss="alert">&times;</button>'.
                'Modification effectué avec succès !'.
                '</div>';
        }
    }else
    {
        echo '<div id="msg" class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>'.
            'Vous avez déjà un compte marchand !'.
            '</div>';

    }

}

function invite_membre($membre_email,$groupe)
{
    global $bdd;
    if(verify_user_membre($membre_email)==false)
    {
        if(verify("users","adresse",$membre_email)==true)
        {
            $table="compte_marhand";
            $field="user_created";
            if(verify($table,$field,getUserLogin()) == true){
                $id_marchand=get_data_in_table(getUserLogin())->code_marchand; //le compte marchand du propriétaire
                $invite=infos_user_with_email($membre_email)->code;

                $sql=$bdd->prepare("insert into user_autorisation(code_user_invite,email_invite,marchand_id, user_sender, groupe) values (?,?,?,?,?)");
                $sql->execute(array($invite,$membre_email,$id_marchand,getUserLogin(),$groupe));
                if($sql){

                    inserNotif(infos_user_with_email($membre_email)->code,"Vous êtes ajouté en tant que membre à un compte.");
                    echo '<div id="msg" class="alert alert-success"> <button type="button" class="close" data-dismiss="alert">&times;</button>';
                    echo 'Enregistrement effectuée avec succès !';
                    echo '</div>';
                }
            }else{
                echo '<div id="msg" class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert">&times;</button>';
                echo 'Désolé, vous devez d\'abord créer un compte marchand';
                echo '</div>';
            }


        }else{
            echo '<div id="msg" class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>';
            echo 'Désolé, l\'adresse email n\'a pas un compte PAIME';
            echo '</div>';
        }
    }else{
        echo '<div id="msg" class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert">&times;</button>';
        echo 'Il semble que '.$membre_email." est déjà membre";
        echo '</div>';
    }

}

function modif_membre($membre_email,$groupe)
{
    global $bdd;
   // echo $membre_email;
    if(verify_user_membre($membre_email)==true)
    {
        if(verify("users","adresse",$membre_email)==true)
        {


            $sql=$bdd->prepare("update user_autorisation set groupe=? where email_invite=? and user_sender=?");
            $sql->execute(array($groupe,$membre_email,getUserLogin()));
            if($sql){
                echo '<div id="msg" class="alert alert-success"> <button type="button" class="close" data-dismiss="alert">&times;</button>';
                echo 'Modification effectuée avec succès !';
                echo '</div>';
            }

        }else{
            echo '<div id="msg" class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>';
            echo 'Désolé, l\'adresse email n\'a pas un compte PAIME';
            echo '</div>';
        }
    }else{
        echo '<div id="msg" class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert">&times;</button>';
        echo 'Il semble que '.$membre_email." n'était pas membre";
        echo '</div>';
    }

}