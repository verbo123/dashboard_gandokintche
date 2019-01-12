<?php session_start(); ?>
<?php
$active = "Développeurs";
$devop="apikey";
require 'pages/header.php';?>
<div class="page-wrapper">
    <!-- HEADER MOBILE-->
    <?php require 'pages/menus/side_mobile_menu.php';?>
    <!-- END HEADER MOBILE-->

    <!-- MENU SIDEBAR-->
    <?php require 'pages/menus/side_menu.php';?>
    <!-- END MENU SIDEBAR-->

    <!-- PAGE CONTAINER-->
    <div class="page-container">
        <!-- HEADER DESKTOP-->
        <?php require 'pages/menus/head_menu.php';?>
        <!-- END HEADER DESKTOP-->

        <!-- MAIN CONTENT-->

        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="title-5 m-b-35">Applications</A></h3>
                                    <?php
                                    include 'pages/control/key_function.php';
                                    if(isset($_POST['valider']))
                                    {
                                        if(!empty($_POST["app_name"]))
                                        {
                                            extract($_POST);
                                            creatKey_app($app_name);
                                        }
                                    }

                                    if(count(getAll_app()) > 0)
                                    {
                                        ?>
                                        <!-- DATA TABLE -->
                                        <div class="table-data__tool">
                                            <div class="table-data__tool-left">

                                                <div style="width: 240px" class="rs-select2--light rs-select2--md">
                                                    <select id="app" class="js-select2" name="property">
                                                        <option selected="selected"><?php echo ma_tra("Toutes les applications")?></option>
                                                        <?php
                                                            foreach (getAll_app() as $ap)
                                                            {
                                                        ?>
                                                        <option value="<?php echo $ap->code_app; ?>" >
                                                            <a href="application_key?project=<?php echo $ap->code_app ?>&active=<?php echo $ap->active ?>&ID_token=<?php echo $ap->app_token ?>">
                                                                <?php echo $ap->nom_app; ?>
                                                            </a>
                                                        </option>
                                                        <?php
                                                            }
                                                        ?>
                                                    </select>
                                                    <div class="dropDownSelect2"></div>
                                                </div>



                                            </div>
                                            <div class="table-data__tool-right">
                                                <button data-toggle="modal" data-target="#staticModal" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                                    <i class="zmdi zmdi-plus"></i>
                                                    <?php echo ma_tra("Créer une application")?>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="table-responsive table-responsive-data2">
                                            <table class="table table-data2">
                                                <thead>
                                                <tr>
                                                    <td><?php echo ma_tra("Projet")?></td>
                                                    <td><?php echo ma_tra("Date de création")?></td>
                                                    <td><?php echo ma_tra("Jeton")?></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                foreach (getAll_app() as $app)
                                                {
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <div class="table-data__info">
                                                            <span>
                                                                <a href="#"><?php echo $app->nom_app?></a>
                                                            </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <span style="font-size: 12px"><?php echo date_conversion($app->date_creation)?></span>
                                                        </td>


                                                        <td>
                                                            <div class="table-data__info">
                                                                <span style="font-size: 12px"><?php limite_caractere($app->app_token)  ?></span>
                                                            </div>

                                                        </td>
                                                        <td>
                                                            <label class="switch switch-text switch-primary switch-pill">
                                                                <input id="para" type="checkbox" class="switch-input" <?php if($app->active == "true"){echo  " checked='true' "; } ?> >
                                                                <span data-on="On" data-off="Off" class="switch-label"></span>
                                                                <span class="switch-handle"></span>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <div class="table-data-feature">
                                                                <a href="javascript:delet('<?php echo $app->code_app; ?>')" id="del" class="item" data-toggle="tooltip" data-placement="top" title="<?php echo ma_tra("Supprimer")?>">
                                                                    <i class="zmdi zmdi-delete"></i>
                                                                </a>
                                                                <a href="application_key?project=<?php echo $app->code_app ?>&active=<?php echo $app->active ?>&ID_token=<?php echo $app->app_token ?>"   class="item" data-toggle="tooltip" data-placement="top" title="<?php echo ma_tra("Détails")?>">
                                                                    <i class="zmdi zmdi-eye"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }

                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- END DATA TABLE -->

                                        <?php
                                    }else{

                                        ?>

                                        <div class="card">
                                            <div  style="text-align: -webkit-center; text-align: -moz-center; text-align: center"  class="card-body">
                                                <h5 style="text-align: center"><?php echo ma_tra("Aucune application pour le moment")?> !</h5>
                                            <button style="margin-top: 30px" type="button" class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#staticModal">
                                                <i class="zmdi zmdi-plus"></i>
                                                <?php echo ma_tra("Créer une application")?>
                                            </button>
                                            </div>
                                        </div>

                                <?php

                                    }
                                    ?>



                    </div>

                </div>
                    <?php
                    require 'pages/htmfooter.php';
                    ?>
            </div>
        </div>

        <div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
             data-backdrop="static">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticModalLabel"><?php echo ma_tra("Création d'une application")?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" novalidate="novalidate" autocomplete="off">

                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1"><?php echo ma_tra("Nom de l'application")?></label>
                                <input id="cc-pament" name="app_name" type="text" class="form-control" aria-required="true" aria-invalid="false">
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo ma_tra("Annuler")?></button>
                                <button type="submit" name="valider" class="btn btn-primary"><?php echo ma_tra("Enregistrer")?></button>
                            </div>

                        </form>
                    </div>

                </div>

            </div>

            </div>
        </div>

                <!--                                        --><?php
            //                                            /**
            //                                             * Récupérer la véritable adresse IP d'un visiteur
            //                                             */
            //                                            function get_ip() {
            //                                                // IP si internet partagé
            //                                                if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            //                                                    return $_SERVER['HTTP_CLIENT_IP'];
            //                                                }
            //                                                // IP derrière un proxy
            //                                                elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            //                                                    return $_SERVER['HTTP_X_FORWARDED_FOR'];
            //                                                }
            //                                                // Sinon : IP normale
            //                                                else {
            //                                                    return (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '');
            //                                                }
            //                                            }
            //                                            ?>
                <!---->
                <!--                                        --><?php
            //                                        // Afficher l'adresse IP
            //                                        echo 'Adresse IP du visiteur : '.get_ip();
            //                                        ?>




            <?php
            require 'pages/footer.php';
            ?>

            <div class="modal fade" id="scrollmodal" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="scrollmodalLabel">Application - wazemi </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form class="" method="post">

                                <label class="switch switch-text switch-primary switch-pill pull-right">
                                    <input type="checkbox" class="switch-input" >
                                    <span data-on="On" data-off="Off" class="switch-label"></span>
                                    <span class="switch-handle"></span>
                                </label>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Nom de l'application</label>
                                    <input id="cc-pament" name="app_name" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                </div>
                            </form>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary">Confirm</button>
                        </div>
                    </div>
                </div>
            </div>

        <script type="text/javascript">
            
            var app=$("#app");
            app.change(function () {
                $.ajax({
                    url:'pages/control/charge_app.php?val='+app.val(),
                    success : function (data) {
                        data=JSON.parse(data);

                        console.log(data);

                    }
                });
            });

            $("#para").change(function () {
                if( $("#para").is(':checked') ==true){
                    $.ajax({
                        url:'pages/control/change_app.php?val=true',
                        success : function (data) {
                            data=JSON.parse(data);
                            if(data === true)
                            {
                                window.location.href="apikeys";
                            }
                        }
                    });
                }

                if($("#para").is(':checked') ==false){
                    $.ajax({
                        url:'pages/control/change_app.php?val=false',
                        success : function (data) {
                            data=JSON.parse(data);
                            if(data === true)
                            {
                                window.location.href="apikeys";
                            }
                        }
                    });
                }
            });

            function delet(id)
            {
                $.ajax({
                    url:'pages/control/app_delete.php?del='+id,
                    success : function (data) {
                        data=JSON.parse(data);
                        if(data === true)
                        {
                            window.location.href="apikeys";
                        }

                    }
                });
            }


        </script>

        <script type="text/javascript">
            if(screen.width <= 500 ){
                $('.example').addClass(' table-responsive');
                $(".au-btn--small").css("width","100%");
                $(".rs-select2--md").css("width","100%");
            }else {
                $('.example').removeClass(' table-responsive');
                $(".au-btn--small").removeStyle("width","100%");
                $(".rs-select2--md").removeStyle("width","100%");
            }
        </script>