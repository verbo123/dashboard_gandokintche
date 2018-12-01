<?php
include 'database.php';
include 'fonction.php';

if(isset($_POST["valider"])){
    if(!empty($_POST["pax1"]) && !empty($_POST["pax2"]))
    {
        extract($_POST);
        if(mb_strlen($pax1) < 8){
            echo '<div id="msg" class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>';
            echo 'Le mot de passe doit contenir au moins 8 caractères ';
            echo '</div>';
        }else
            {
            if($pax1 == $pax2)
            {
                if(!empty($_GET["account"]))
                {
                    global $bdd;
                    if(filter_var($_GET["account"],FILTER_VALIDATE_EMAIL)){
                        $req=$bdd->prepare("select * from users where adresse=?");
                        $req->execute(array($_GET["account"]));
                        if($req->rowCount() > 0){
                            $row=$req->fetch(PDO::FETCH_OBJ);
                            $heure=date("H:i");
                            $h1=strtotime($heure);
                            $h2=strtotime($row->duree_code);
                            $duree=  ($h1-$h2)/60;
                            if($duree <= 30){
                                $password=hash("sha256",$pax1);
                                $sql=$bdd->prepare("update users set password=? where code_reinitialisation=? and code=?");
                                $sql->execute(array($password,$_GET["code"],$_GET["account"]));
                                if($sql){
                                    echo '<div id="msg" class="alert alert-success"> <button type="button" class="close" data-dismiss="alert">&times;</button>';
                                    echo 'Mot de passe modifié avec succès !';
                                    echo '</div>';
                                }else{
                                    echo '<div id="msg" class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert">&times;</button>';
                                    echo 'Une erreur s\'est produite, lors de la modification';
                                    echo '</div>';
                                }
                            }else{
                                echo '<div id="msg" class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>';
                                echo 'Désolé, le temps de réinitialisation du mot de passe est expiré';
                                echo '</div>';
                            }
                        }else{
                            echo '<div id="msg" class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>';
                            echo 'Désolé, vous n\'avez pas un compte';
                            echo '</div>';
                        }
                    }

                }
            }else{
                echo '<div id="msg" class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>';
                echo 'Les deux mots de passe ne sont pas les mêmes';
                echo '</div>';
            }
        }
    }


}