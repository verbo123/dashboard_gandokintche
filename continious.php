
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Website Font style -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

    <title>Dashboard-Gandokintché</title>
</head>
<body>
<div class="container">
    <div class="row main">
        <div style="padding-top: 50px" class="panel-heading">
            <div class="panel-title text-center">
                <h1 style="font-size: 50px;font-family: 'Pacifico';"><span style="color:#e0c3fc;">Pai</span><span style="color: #8ec5fc">Me</span></h1>
                <hr />
            </div>
        </div>
        <div class="main-login main-center">
            <?php
            include 'pages/control/database.php';
            include 'pages/control/fonction.php';
            ?>
            <form class="form-horizontal" action="index" method="post">



                <div class="form-group ">
                    <div class="call-to-action">
                        <button style="width: 319px; height: 70px;" type="submit"  name="valider" class="btn submint_btn form-control">
                            Continuez en tant que <br>
                            <span> <?php echo infos_user(getUserLogin())->prenom.' '.substr(infos_user($_COOKIE["account_code"])->nom,0,1).'.'; ?>
                             <i class="fa fa-arrow-right"></i> </span>
                        </button>
                    </div>
                </div>
                <div class="login-register">

                </div>

                <div class="login-register">
                    <a style="color: red;font-weight: 800" href="logout">Déconnecter</a>
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
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
               <a href="http://www.gandokintche.com" >
                    <span style="font-family: 'Pacifico';"><span style="color:#e0c3fc;">Gandokin</span><span style="color: #8ec5fc">Tche</span></span>
                </a>  Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
        </div>
        <div class="pull-right">
            <ul>
                <li><a href="#">Terme & Condition</a></li>
                <li><a href="tarif">Tarifs</a></li>
                <li><a href="developpeur">Développeurs</a></li>
                <li><a href="#">Nous contactez</a></li>
            </ul>
        </div>
    </div>
</div>
</html>

