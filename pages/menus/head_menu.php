<header class="header-desktop">
    <?php

    include 'pages/control/database.php';
    include 'pages/control/fonction.php';
    ?>

    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap">
                <form class="form-header" action="" method="POST">
                                       <div style="line-height: 5" class="au-form-icon--sm">
                        <input id="recho" style="border-radius: 25px" class="valu au-input--w435 au-input--style2" type="text" placeholder="<?php echo ma_tra("Recherche..."); ?>">
                        <a  style="top: 20px;" class="sea au-btn--submit2" href="">
                            <i class="zmdi zmdi-search"></i>
                        </a>
                    </div>
                </form>
                <div class="header-button">
                    <div class="noti-wrap">
                        <div class="noti__item js-item-menu">
                            <img src="images/icon/livre.png">
                            <div class="mess-dropdown js-dropdown">
                                <div class="mess__title">
                                    <a href="#"><?php echo ma_tra("Accedez à la documentation")?></a>
                                </div>
                                <div class="mess__item">
                                    <a href="#"><?php echo ma_tra("Support")?></a>
                                </div>

                            </div>
                        </div>

                        <div class="noti__item js-item-menu">
                            <i class="zmdi zmdi-notifications"></i>
                            <span class="quantity"><?php echo get_nbre_notif(); ?></span>
                            <div class="notifi-dropdown js-dropdown">
                                <div id="notifi__title" class="notifi__title">
                                    <p>
                                        <?php if(get_nbre_notif()==0){echo "Vous n'avez aucune notification"; }else{echo "Vous avez ".get_nbre_notif()." nouvelle(s) notification(s)";} ?>
                                    </p>
                                </div>
                                <div id="deta">
                                    <?php
                                    if (get_nbre_notif() > 0) {
                                        $i = 0;
                                        foreach (get_all_notif() as $notif) {
                                            if ($i < 3) {
                                                ?>
                                                <a href="javascript:change_notify(<?php echo $notif->id; ?>)"
                                                   class="notifi__item">
                                                    <div class="content">
                                                        <p><?php echo $notif->message ?></p>
                                                        <span class="date"><?php echo date_conversion($notif->date) ?></span>
                                                    </div>
                                                </a>
                                                <?php
                                                $i++;

                                            }
                                            if ($i == 3) {
                                                break;
                                            }
                                        }

                                        if (get_nbre_notif() >= 4) {
                                            ?>
                                            <div class="notifi__footer">
                                                <a href="all_notify"><?php echo ma_tra("Toutes les notifications")?></a>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                            <div class="image">
                                <img src="<?php if(infos_user(getUserLogin())->photo != ""){echo getUrl().infos_user(getUserLogin())->photo;}else{ echo "images/icon/default_image.png"; }  ?>" alt="John Doe" />
                            </div>
                            <div class="content">
                                <a class="js-acc-btn" href="#">
                                    <?php echo infos_user($_COOKIE["account_code"])->prenom.' '.substr(infos_user($_COOKIE["account_code"])->nom,0,1).'.';?>
                                </a>
                            </div>
                            <div class="account-dropdown js-dropdown">

                                <div class="info clearfix">
                                    <div class="">
                                        <h5 class="name">
                                            <a href="#">
                                                <?php echo infos_user($_COOKIE["account_code"])->prenom.' '.infos_user($_COOKIE["account_code"])->nom.' ';?>
                                            </a>
                                        </h5>
                                        <span class="email"><?php echo ma_tra("Administrateur")?></span>
                                    </div>
                                </div>

                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="profil">
                                            <i class="zmdi zmdi-account"></i><?php echo ma_tra("Profil")?></a>
                                    </div>
                                </div>

                                <div class="account-dropdown__footer">
                                    <a href="logout">
                                        <i class="zmdi zmdi-power"></i>Logout</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

