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
                            <div class="card">



                                <div class="card-header">
                                    <i class="mr-2 fa fa-align-justify"></i>
                                    <strong class="card-title" v-if="headerText"><?php echo ma_tra("Votre projet")?></strong>
                                         </div>
                                <div class="card-body">


                                    <?php
                                        require 'pages/control/key_function.php';

                                        if(isset($_POST["valider"]))
                                        {
                                            if(!empty($_POST["app_name"]))
                                                {
                                                    extract($_POST);
                                                    update_app($app_name,find_app_key()->code_app);
                                                }
                                        }

                                    ?>
                                    <table class="table table-responsive">
                                        <tbody>
                                        <tr>
                                            <td><?php echo ma_tra("Nom du projet")?></td>
                                            <td><?php echo find_app_key()->nom_app; ?> <span data-toggle="modal" data-target="#staticModal" style="font-size: 20px; margin-left: 15px; cursor: pointer"><i class="zmdi zmdi-edit"></i></span></td>
                                        </tr>

                                        <tr>
                                            <td><?php echo ma_tra("ID du projet")?></td>
                                            <td><?php echo find_app_key()->code_app; ?></td>
                                        </tr>

                                        <tr>
                                            <td><?php echo ma_tra("Clé API serveur (mode test)")?></td>
                                            <td><?php echo find_app_key()->test_key; ?></td>
                                        </tr>

                                        <tr>
                                            <td><?php echo ma_tra("Clé API serveur (mode live)")?></td>
                                            <td><?php echo find_app_key()->pro_key; ?></td>
                                        </tr>

                                        <tr>
                                            <td>API token</td>
                                            <td><?php echo find_app_key()->app_token; ?></td>
                                        </tr>

                                        <tr>
                                            <td colspan="1"><?php echo ma_tra("Connecter l'application à votre compte marchand")?></td>
                                            <td>
                                                <label class="switch switch-text switch-success">
                                                    <input <?php if(app_verif(getUserLogin(),$_GET["project"]) == true){ echo 'checked="true"'; } ?>  id="para" type="checkbox" class="switch-input" >
                                                    <span data-on="On" data-off="Off" class="switch-label"></span>
                                                    <span class="switch-handle"></span>
                                                </label>

                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>


                                </div>
                            </div>






                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
             data-backdrop="static">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticModalLabel"><?php echo ma_tra("Modification")?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" novalidate="novalidate" autocomplete="off">

                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1"><?php echo ma_tra("Nom de l'application")?></label>
                                <input id="cc-pament" value="<?php echo find_app_key()->nom_app;  ?>" name="app_name" type="text" class="form-control" aria-required="true" aria-invalid="false">
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

        <?php
        require 'pages/htmfooter.php';
        ?>
    </div>
    <!-- END PAGE CONTAINER-->

</div>
<?php
require 'pages/footer.php';
?>

<script type="text/javascript">

    $("#para").change(function () {
        if( $("#para").is(':checked') ==true){
            $.ajax({
                url:'pages/control/app_connect.php?val=<?php echo $_GET["project"] ?>',
                success : function (data) {
                    data=JSON.parse(data);
                    if(data === true)
                    {
                        window.location.href="application_key?project=<?php echo $_GET["project"] ?>&active=<?php echo $_GET["active"] ?>&ID_token=<?php echo $_GET["ID_token"] ?>";
                    }
                }
            });
        }
    });



    $("#payment-button-amount").click(function () {
        $("#payment-button-amount").css("display","none");
        $("#payment-button-sending").css("display","block");
    });




</script>
