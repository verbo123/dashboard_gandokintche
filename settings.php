<?php
$active = "setting";
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
                                        <strong class="card-title" v-if="headerText">Autorisations</strong>

                                        <a href="#" class="pull-right">Accedez à la doumentation <span><i class="fa fa-arrow-right"></i> </span></a>
                                    </div>
                                    <div class="card-body">

                                        <div class="table-responsive table-striped">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <td>Services</td>
                                                    <td> </td>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>Virement d'argent</h6>
                                                            <span>
                                                                <a href="#">Ce service permet à l'utilisateur de faire des virements
                                                                vers un autre compte </a>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>

                                                            <label class="switch switch-text switch-primary switch-pill">
                                                            <input id="para" <?php if(permission_service()->virement == "true"){echo  " checked='true' "; }else{} ?> type="checkbox" class="switch-input">
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
            </div>



        </div>
        <!-- END PAGE CONTAINER-->

    </div>
<style type="text/css">
    .table-data .table td
    {
        padding-bottom: 0;
    }
</style>
<?php require 'pages/footer.php';?>

<script type="text/javascript">
    $("#para").change(function () {
        if( $("#para").is(':checked') ==true){
            $.ajax({
                url:'pages/control/change_para.php?val=true',
                success : function (data) {
                    data=JSON.parse(data);
                    if(data === true)
                    {
                        window.location.href="settings";
                    }
                }
            });
        }

        if($("#para").is(':checked') ==false){
            $.ajax({
                url:'pages/control/change_para.php?val=false',
                success : function (data) {
                    data=JSON.parse(data);
                    if(data === true)
                    {
                        window.location.href="settings";
                    }
                }
            });
        }
    });


</script>
