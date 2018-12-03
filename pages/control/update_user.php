<?php
require 'database.php';
global  $bdd;

if(isset($_POST["save"])){
    if(isset($_POST))
 {

$nom=$_POST["nom"];
$prenom=$_POST["prenom"];
$tel=$_POST["tel"];
$pays=$_POST["pays"];
     $sexe=$_POST["sexe"];

$sql=$bdd->prepare("update users set nom=?, prenom=?, pays_residence=?, tel=?,sexe=? where code=?");
$sql->execute(array($nom,$prenom,$pays,$tel,$sexe,getUserLogin()));

if($sql)
{
    ?>
    <div class="alert au-alert-success alert-dismissible fade show au-alert au-alert--70per" role="alert">
        <i class="zmdi zmdi-check-circle"></i>
        <span class="content">Modification effectuée avec succès !</span>
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
        <i class="zmdi zmdi-check-circle"></i>
        <span class="content">Une erreur s'est produite, lors de la modification</span>
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

