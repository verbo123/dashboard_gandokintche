<?php

include 'Tools/database.php';

 function register($sql,$table,$field,$code,$data=array())
{
    $result=array();
    $errors=array();
    global $bdd;
    if(!empty($data))
    {
        if(verify($table, $field, $code) == false){
            $req=$bdd->prepare($sql);
            $req->execute($data);
            if($req)
            {
                echo '<div id="msg" class="alert alert-success"> <button type="button" class="close" datadismiss="alert">&times;</button>';

                    echo 'Enregistrement effectué avec succès !';

                echo '</div>';

            }else
                {
                $errors[0]="Une erreur s'est produite lors de l'enregistrement !";
            }
        }else
            {
            $errors[1]="Cet email existe déjà !";
        }
    }else{
        $errors[2]="Champ(s) vide(s) !";
    }

}

 function insert_user($nom,$prenom,$email,$password,$token=""){
    $code=strtoupper(uniqid());
    $password=md5($password);
    $data= array($code,$nom,$prenom,$email,$password,$token);
    register(
        "INSERT INTO users(code, nom, prenom, adresse, password, token) values(?,?,?,?,?,?)",
        "users",
        "adresse",
        $email,
        $data
    );

}


function save()
{

    if( isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["adresse"]) && isset($_POST["password"]))
    {
        $errors=array();
        extract($_POST);
        if(filter_var($adresse,FILTER_VALIDATE_EMAIL))
        {
            if(isset($_POST["token"]))
            {
               insert_user($nom,$prenom,$adresse,$password,$_POST["token"]);
            }else{
               insert_user($nom,$prenom,$adresse,$password);
            }
        }else{
            $errors[3]="Adresse email invalide !";
        }
    }else
    {
        $errors[4]="Champ(s) vide(s) !";
    }


}