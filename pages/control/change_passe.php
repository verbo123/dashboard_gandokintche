<?php
require 'database.php';

global  $bdd;

if(isset($_POST["modif"])){
    if(isset($_POST))
    {

        $pax1=$_POST["pax1"];
        $pax2=$_POST["pax2"];
        $ancien=$_POST["ancien"];

        //echo hash("sha256",$ancien);

        if( (infos_user(getUserLogin())->password) == (hash("sha256",$ancien)) )
        {

        if(mb_strlen($pax1) == mb_strlen($pax2))
        {

        $sql=$bdd->prepare("update users set password=? where code=?");
        $sql->execute(array(hash("sha256",$pax1), getUserLogin()));

        if($sql)
        {
            ?>
            <div class="alert au-alert-success alert-dismissible fade show au-alert au-alert--70per" role="alert">
                <i class="zmdi zmdi-check-circle"></i>
                <span class="content">Mot de passe modifié avec succès !</span>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">
                                    <i class="zmdi zmdi-close-circle"></i>
                                </span>
                </button>
            </div>

            <?php
        }else
        {
            ?>

            <div class="alert au-alert-danger alert-dismissible fade show au-alert au-alert--70per" role="alert">
                <i style="color: #ad240f;" class="zmdi zmdi-check-circle"></i>
                <span class="content">Une erreur s'est produite, lors de la modification</span>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">
                                    <i class="zmdi zmdi-close-circle"></i>
                                </span>
                </button>
            </div>

            <?php

        }
        }else{
            ?>
            <div class="alert au-alert-danger alert-dismissible fade show au-alert au-alert--70per" role="alert">
                <i style="color: #ad240f;" class="zmdi zmdi-check-circle"></i>
                <span class="content">Les deux mots de passe ne sont pas concordent</span>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">
                                    <i class="zmdi zmdi-close-circle"></i>
                                </span>
                </button>
            </div>


<?php

        }
        }else{
            ?>
            <div class="alert au-alert-warning alert-dismissible fade show au-alert au-alert--70per" role="alert">
                <i style="color: #ada80e;" class="zmdi zmdi-check-circle"></i>
                <span class="content">Désolé, vous ne pouvez pas modifier le mot de passe</span>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">
                                    <i class="zmdi zmdi-close-circle"></i>
                                </span>
                </button>
            </div>

     <?php
        }
    }
}
?>

