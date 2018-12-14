<?php

function creatKey_app($app)
{
    global $bdd;
    $tk_token=generateToken(32);
    $active=true;
    $prod=generateToken(32);
    $test=generateToken(32);


    if(verify("compte_marhand","user_created",getUserLogin())==true){
        if(verify("application","code_app",strtolower($app)) == false){
            $req=$bdd->prepare("insert into application(code_app, nom_app, code_user_app, date_creation, app_token, active, pro_key, test_key) values (?,?,?,now(),?,?,?,?)");
            $req->execute(array(strtolower($app),$app,getUserLogin(),$tk_token,$active,$prod,$test));
            if($req)
            {
                if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "en_US")
                {
                    echo '<div id="msg" class="alert alert-success"> <button type="button" class="close" data-dismiss="alert">&times;</button>' .
                        'Application creates successfully !'.
                        '</div>';
                }else{
                    echo '<div id="msg" class="alert alert-success"> <button type="button" class="close" data-dismiss="alert">&times;</button>' .
                        'Application crée avec succès !'.
                        '</div>';
                }

            }else{
                if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "en_US")
                {
                    echo '<div id="msg" class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert">&times;</button>' .
                        'An error occured, please try again later.'.
                        '</div>';
                }else{
                    echo '<div id="msg" class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert">&times;</button>' .
                        'Une erreur s\'est produite, veuillez réessayer plus tard.'.
                        '</div>';
                }

            }
        }else{
            if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "en_US")
            {
                echo '<div id="msg" class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>' .
                    'Sorry, this app already exists !.'.
                    '</div>';
            }else{
                echo '<div id="msg" class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>' .
                    'Désolé, cette application existe déjà !.'.
                    '</div>';
            }

        }
    }else{
        if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "en_US")
        {
            echo '<div id="msg" class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>' .
                'Sorry, you do not have a merchant account !.<a href="auth_marchand">Click here</a> to register a merchant account'.
                '</div>';
        }else{
            echo '<div id="msg" class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>' .
                'Désolé, vous n\'avez pas un compte marchand !.<a href="auth_marchand">Cliquez ici</a> pour enregistrer un compte marchand'.
                '</div>';
        }

    }


}

function getAll_app()
{
    global $bdd;
    $result=array();
    $sql=$bdd->prepare("select * from application where code_user_app=?");
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


function find_app_key()
{
    global $bdd;
    $result=array();
    $sql=$bdd->prepare("select * from application where code_app=? and app_token=?");
    $sql->execute(array($_GET["project"],$_GET["ID_token"]));
    if ($sql->rowCount() == 1)
    {
        while ($row=$sql->fetch(PDO::FETCH_OBJ))
        {
            $result=$row;
        }
    }
    return $result;
}

function update_app($app, $code_api)
{
    global $bdd;
    $sql=$bdd->prepare("update application set nom_app=? where code_app=?");
    $sql->execute(array($app,$code_api));

}