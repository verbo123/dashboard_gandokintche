<?php
require 'Tools/localization.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Website Font style -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="icon" href="images/icon/fvicon.png" type="image/x-icon" />
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

    <title>Dashboard-Gandokintché</title>
</head>
<body>
<div class="container">
  <a href="http://www.gandokintche.com/index" class="lip" style="color: #00A0D1;">
        <span> <i class="fa fa-arrow-left"></i> </span> <?php echo ma_tra("Retour à la page d'accueil") ?>
    </a>
    
    <div class="row main" style="margin-top: 0">
       <!--  <div class="panel-heading">
            <div class="panel-title text-center">
                <h1 style="font-size: 50px;font-family: 'Pacifico';"><span style="color:#e0c3fc;">Pai</span><span style="color: #8ec5fc">Me</span></h1>
                <hr />
            </div>
        </div> -->
        <div class="main-login main-center">
            <?php
                    include 'Tools/_register.php';
                    include 'Tools/errors_files.php';
            ?>
            <form data-parsley-validate class="form-horizontal" method="post">

<!--                <div class="form-group">-->
<!--                    <label  class="cols-sm-2 control-label">Type de compte</label>-->
<!--                    <div class="cols-sm-10">-->
<!---->
<!--                           <select class="form-control">-->
<!--                               <option>Sélectionnez le type de compte</option><br>-->
<!--                               <option name="ENT">Entreprise/Particulier</option>-->
<!--                               <option name="DEV">Développeur</option>-->
<!--                           </select>-->
<!---->
<!--                    </div>-->
<!--                </div>-->

                <div class="form-group">
                    <label for="name" class="cols-sm-2 control-label"> <?php echo ma_tra("Nom")?></label>
                    <div class="cols-sm-10">
                        <div class="input-group" style="<?php if(isset($_POST["valider"]) && isset($_SESSION["nom"])) echo 'border:1px solid red';  ?>" >
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            <input required="required" value="<?php if(isset($_POST["valider"]) && isset($_SESSION["nom"])) echo $_SESSION["nom"];  ?>" type="text" class="form-control" name="nom" id="nabme"  />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="cols-sm-2 control-label"> <?php echo ma_tra("Prénoms")?></label>
                    <div class="cols-sm-10">
                        <div style="<?php if(isset($_POST["valider"]) && isset($_SESSION["prenom"])) echo 'border:1px solid red';  ?>" class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            <input required="required" value="<?php if(isset($_POST["valider"]) && isset($_SESSION["prenom"])) echo $_SESSION["prenom"];  ?>" type="text" class="form-control" name="prenom" id="pname"  />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="cols-sm-2 control-label">Email</label>
                    <div class="cols-sm-10">
                        <div style="<?php if(isset($_POST["valider"]) && isset($_SESSION["adresse"])) echo 'border:1px solid red';  ?>"  class="input-group">
                            <span  class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                            <input data-parsley-trigger="keypress" required="required"  value="<?php if(isset($_POST["valider"]) && isset($_SESSION["adresse"])) echo $_SESSION["adresse"];  ?>" type="email" class="form-control" name="adresse" id="email" />
                        </div>
                        <?php
                                if(isset($_POST["valider"]) && isset($_SESSION["adresse"]))
                                {
                                    if(!filter_var($_POST["adresse"],FILTER_VALIDATE_EMAIL))
                                    {
                                        echo '<p style="color: red">';
                                        echo "Votre email est invalide !";
                                        echo '</p>';
                                    }

                                }
                        ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="cols-sm-2 control-label"> <?php echo ma_tra("Mot de passe")?></label>
                    <div class="cols-sm-10">
                        <div style="<?php if(isset($_POST["valider"]) && isset($_SESSION["passe"])) echo 'border:1px solid red';  ?>" class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                            <input data-parsley-minlength="8"  required="required" type="password" class="form-control" name="password" id="password" />
                        </div>
                        <?php
                        if(isset($_POST["valider"]) && isset($_SESSION["passe"]))
                        {
                            if(!empty($_POST["password"]))
                            {
                                echo '<p style="color: red">';
                                echo $_SESSION["passe"];
                                echo '</p>';
                            }else{
                                echo '<p style="color: red">';
                                echo 'Champ vide !';
                                echo '</p>';
                            }

                        }
                        ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="confirm" class="cols-sm-2 control-label"> <?php echo ma_tra("Confirmation du mot de passe")?></label>
                    <div class="cols-sm-10">
                        <div class="input-group" style="<?php if(isset($_POST["valider"]) && isset($_SESSION["confirm"])) echo 'border:1px solid red';  ?>">
                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                            <input data-parsley-equalto="#password" type="password" class="form-control" name="confirm" id="confirm" />
                        </div>

                        <?php
                        if(isset($_POST["valider"]) && isset($_SESSION["confirm"]))
                        {

                                echo '<p style="color: red">';
                                echo $_SESSION["confirm"];
                                echo '</p>';


                        }
                        ?>
                    </div>
                </div>

                <div class="form-group ">
                    <div class="call-to-action">
                        <button style="width: 349px; height: 50px" name="valider" type="submit" class="btn submint_btn form-control">
                             <?php echo ma_tra("Enregistrer")?>
                        </button>
                    </div>
                </div>
                <div class="login-register">
                    <a href="login"> <?php echo ma_tra("Connecter")?></a>
                </div>

            </form>
        </div>
    </div>


</div>

<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

<style type="text/css">
    body, html{
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('images/devop.jpg') no-repeat;
        font-family: 'Oxygen', sans-serif;
        background-size: cover;
    }

    .main{
        margin-top: 30px;
    }

    h1.title {
        font-size: 50px;
        font-family: 'Passion One', cursive;
        font-weight: 400;
    }

    hr{
        width: 10%;
        color: #fff;
    }

    .form-group{
        margin-bottom: 15px;
    }

    label{
        margin-bottom: 15px;
    }

    input,
    input::-webkit-input-placeholder {
        font-size: 11px;
        padding-top: 3px;
    }

    .main-login{
        background-color: #fff;
        /* shadows and rounded borders */
        -moz-border-radius: 2px;
        -webkit-border-radius: 2px;
        border-radius: 2px;
        -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);

    }

    .main-center{
        margin: 0 auto;
        max-width: 400px;
        padding: 40px 40px;

    }

    .login-button{
        margin-top: 5px;
    }

    .login-register{
        font-size: 11px;
        text-align: center;
    }
</style>
</body>
<div style="background: transparent; color: white" class="footer_copy_right">
    <div class="container">
        <div class="pull-left">
            <p class="copyright">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
               GandokinTché &copy; Copyright <script>document.write(new Date().getFullYear());</script>
                <span>
                        <img style="max-width: 20px;margin-left: 10px;" src="https://api.hostip.info/images/flags/<?php echo strtolower($dataip->geobytesinternet); ?>.gif">
                    <?php echo $dataip->geobytescountry; ?>
                    </span>
            </p>
        </div>
        <div class="pull-right">
            <ul>
                <!--                <li><a href="#">Terme & Condition</a></li>-->
                <li><a href="http://www.gandokintche.com/tarif"><?php echo ma_tra("Tarifs")?></a></li>
                <li><a  href="http://www.gandokintche.com/developpeur"><?php echo ma_tra("Développeurs")?></a></li>
                <li><a href="http://www.gandokintche.com/#contact"><?php echo ma_tra("Nous contactez")?></a></li>
            </ul>
        </div>
    </div>
</div>
</html>