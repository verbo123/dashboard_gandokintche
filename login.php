<?php
require 'Tools/localization.php';
if(isset($_COOKIE["account_code"]))
{
    if(isset($_GET['return']) &&  $_GET['return'] == true)
        {
             header("location: continious");
        }
}
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
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Pacifico" />

    <title>Dashboard-Gandokintché</title>
</head>
<body>
<div class="container">
    <a href="http://www.gandokintche.com/index" class="lip" style="color: #00A0D1;">
        <span> <i class="fa fa-arrow-left"></i> </span> <?php echo ma_tra("Retour à la page d'accueil") ?>
    </a>

    <div class="row main">
       <!--  <div class="panel-heading">
            <div class="panel-title text-center">
                <h1 style="font-size: 50px;font-family: 'Pacifico';"><span style="color:#e0c3fc;">Gandokin</span><span style="color: #8ec5fc">Tche</span></h1>
                <hr />
            </div>
        </div> -->
        <div class="main-login main-center">
            <?php
            include 'Tools/_connect.php';
            include 'Tools/errors_files.php';
            ?>
            <form class="form-horizontal" method="post">

                <div class="form-group">
                    <label for="email" class="cols-sm-2 control-label">Email</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                            <input value="<?php if(isset($_POST["valider"]) && isset($_SESSION["email"])) echo $_SESSION["email"];  ?>" type="email" class="form-control" name="email" id="email" />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="cols-sm-2 control-label"><?php echo ma_tra("Mot de passe") ?></label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                            <input type="password" class="form-control" name="password" id="password" />
                        </div>
                    </div>
                </div>

                <div class="form-group ">
                    <div class="call-to-action">
                        <button style="width: 319px; height: 50px" name="valider" type="submit" value="submit your quote" class="btn submint_btn form-control">
                            <?php echo ma_tra("Se connecter")?>
                        </button>
                    </div>
                </div>
                <div class="login-register">
                    <a href="register"><?php echo ma_tra("Créez un compte")?></a>
                </div>

                <div class="login-register">
                    <a style="color: red;font-weight: 800" href="forgot-password"><?php echo ma_tra("Mot de passe oublié ?")?></a>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript" src="js/bootstrap.min.js"></script>

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
        max-width: 380px;
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