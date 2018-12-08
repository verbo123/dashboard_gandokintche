

<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="http://www.gandokintche.com">
            <img src="images/icon/logof.png">
<!--            <h1 style="font-size: 50px;font-family: 'Pacifico';"><span style="color:#e0c3fc;">Pai</span><span style="color: #8ec5fc">Me</span></h1>-->
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">


                <li class="<?php if($active == "Accueil"){ echo "active";} ?>">
                    <a class="js-arrow" href="index">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
<!--                    <ul class="list-unstyled navbar__sub-list js-sub-list" style="display: block">-->
<!--                        <li>-->
<!--                            <a style="color: red"  href="#"><span><i class="fa fa-check"></i> </span> Activé votre compte</a>-->
<!--                        </li>-->
<!--                    </ul>-->
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
                                if(_verifyR('recharge_autorisation','utilisateur',_getUserLogin()) == true)
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
                    <ul style="<?php if($active == "Compte marchand"){ echo "display:block";} ?>" class="list-unstyled navbar__sub-list js-sub-list">
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
                    <ul style="<?php if($active == "Développeurs"){ echo "display:block";} ?>" class="list-unstyled navbar__sub-list js-sub-list">

                        <li  class="<?php if($devop == "apikey"){ echo "active";} ?>">
                            <a href="apikeys">Api Keys</a>
                        </li>
<!---->
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
        </nav>
    </div>
</aside>

<style>
    .ico{
        height: 22px;
        width: 22px;
        margin-right: 12px;
    }
</style>