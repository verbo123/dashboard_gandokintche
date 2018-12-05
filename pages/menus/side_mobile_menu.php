
<?php
include './././pages/control/database.php';
function _verify($table,$field, $code)
{
    global $bdd;
    $req=$bdd->prepare("select * from ".$table." where ".$field."= ?");
    $req->execute(array($code));
    if($req->rowCount() > 0){
        return true;
    }else{
        return false;
    }
}


function _getUserLogin()
{
    return $_COOKIE["account_code"];
}

function _infos_user($code)
{
    global $bdd;
    $result=array();
    $req=$bdd->prepare("select * from users where  code=?");
    $req->execute(array($code));
    if($req)
    {
        $row=$req->fetch(PDO::FETCH_OBJ);
        $result=$row;
    }

    return $result;
}

$table="user_autorisation";
$field="user_sender";
$pe=_verify($table,$field,_getUserLogin());


?>

<style type="text/css">
   
        @media(max-width: 375px)
        {
             .log img
             {

                max-width: 50%

             }

        }

         @media(min-width: 400px)
        {
             .log img
             {

                max-width: 30%

             }

        }
   
</style>

<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a  class="logo log" href="http://www.gandokintche.com">
                    <img src="images/icon/logof.png">
                </a>
                <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                <li class="<?php if($active == "Accueil"){ echo "active";} ?>">
                    <a class="js-arrow" href="index">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li  class="<?php if($active == "transaction"){ echo "active";} ?>">
                    <a href="transaction">
                        <img class="ico" src="images/icon/ico_trans.png"/>Transactions</a>
                </li>
                <li class="<?php if($active == "Balance"){ echo "active";} ?>">
                    <a href="balance">
                        <img class="ico" src="images/icon/ico_balanc.png"/>Solde de comptes</a>
                </li>
                <li  class="<?php if($active == "Virement"){ echo "active";} ?>">
                    <a href="payment">
                        <img class="ico" src="images/icon/ico_virement.png"/>Virements</a>
                </li>

                  <li  class="<?php if($active == "achat"){ echo "active";} ?>">
                    <a href="shop">
                        <img class="ico" src="images/icon/panier.png"/>Achat en ligne</a>
                </li>

                <?php
                if(_verify('recharge_autorisation','utilisateur',_getUserLogin()) == true)
                {

                    ?>
                    <li class="has-sub">
                        <a class="js-arrow <?php if($active == "recharge"){ echo "open";} ?>"  href="#">
                            <img class="ico" src="images/icon/ico_recha.png"/>Distributeur</a>
                        <ul style="<?php if($active == "recharge"){ echo "display:block";} ?>" class="list-unstyled navbar__sub-list js-sub-list">

                            <li  class="<?php if($devop == "Recharger un compte"){ echo "active";} ?>">
                                <a href="recharge">Recharge de compte</a>
                            </li>

                            <li  class="<?php if($devop == "Mes commissions"){ echo "active";} ?>">
                                <a href="history">Mes Historiques</a>
                            </li>

                        </ul>

                    </li>

                    <?php

                }
                ?>

                

                <li class="has-sub">

                    <a class="js-arrow <?php if($active == "Compte marchand"){ echo "open";} ?>"  href="#">
                        <img class="ico" src="images/icon/ico_march.png"/>Marchand</a>
                    <ul style="<?php if($active == "Compte marchand"){ echo "display:block";} ?>" class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li class="<?php if($devop == "marchand"){ echo "active";} ?>">
                            <a href="auth_marchand">Compte marchand</a>
                        </li>

                        <li class="<?php if($devop == "facture"){ echo "active";} ?>" style="" >
                            <a  href="invoice">Facturation</a>
                        </li>

<!--                        <li class="--><?php //if($devop == "preleve"){ echo "active";} ?><!--">-->
<!--                            <a  class="" href="prelevement">Prélèvement de fond</a>-->
<!--                        </li>-->

                        <li class="<?php if($devop == "role"){ echo "active";} ?>">
                            <a  class="" href="role">Rôles</a>
                        </li>

                    </ul>

                </li>


                <li class="has-sub">
                    <a class="js-arrow <?php if($active == "Développeurs"){ echo "open";} ?>"  href="#">
                        <img class="ico" src="images/icon/ico_devop.png"/>Développeurs</a>
                    <ul style="<?php if($active == "Développeurs"){ echo "display:block";} ?>" class="navbar-mobile-sub__list list-unstyled js-sub-list">

                        <li  class="<?php if($devop == "apikey"){ echo "active";} ?>">
                            <a href="apikeys">Api Keys</a>
                        </li>

<!--                        <li class="--><?php //if($devop == "liaison"){ echo "active";} ?><!--">-->
<!--                            <a href="appconnect">Application connectée</a>-->
<!--                        </li>-->
                    </ul>
                </li>

                <li class="<?php if($active == "setting"){ echo "active";} ?>">
                    <a href="settings">
                        <img class="ico" src="images/icon/ico_para.png"/>Paramètres</a>
                </li>

                <li  class="<?php if($active == "Autorisation"){ echo "active";} ?>" style="">
                    <a  href="permission">  <i class="far fa-user"></i>Autorisations</a>
                </li>


               
            </ul>
        </div>
    </nav>
</header>