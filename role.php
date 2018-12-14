<?php
$active = "Compte marchand";
$devop="role";
include 'pages/header.php';?>
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->


        <?php include 'pages/menus/side_mobile_menu.php';?>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <?php include 'pages/menus/side_menu.php';?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <?php include 'pages/menus/head_menu.php';?>
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
                                        <strong class="card-title" v-if="headerText"><?php echo ma_tra("Rôles")?></strong><br>
                                        <small>
                                           <?php echo ma_tra("Les rôles définissent les autorisations accordées aux membres de l'équipe dans votre compte GANDOKINTCHE.")?>
                                        </small>
                                    </div>

                                    <div class="card-body">
                                        <table class="table table-striped">
                                            <?php
                                            foreach (getAllGroupe() as $groupe)
                                            {
                                                ?>

                                                <tr>
                                                    <td><?php echo $groupe->libelle; ?></td>
                                                    <td><?php echo $groupe->description; ?></td>
                                                </tr>

                                                <?php

                                            }
                                            ?>
                                        </table>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
        <!-- END PAGE CONTAINER-->

        <style type="text/css">
            .table-data-feature
            {
                -webkit-justify-content: inherit;
                justify-content: inherit;
            }
        </style>
    </div>


<?php require 'pages/footer.php';?>


<style type="text/css">
    .parsley-required{
        color: red;
    }

    .parsley-type{
        color: red;
    }
</style>
<script type="text/javascript">


function popu(mail,libelle)
{
    //  var newurl=window.location.protocol+"//"+window.location.host+window.location.pathname+"?email="+mail;
    // window.history.pushState({path:newurl},'',newurl);

    $("#mail").val(mail);
    // $("option:selected").val(libelle);
    $("#modifModal").modal("show");
}




</script>
