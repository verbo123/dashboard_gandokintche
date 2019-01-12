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
                                        <strong class="card-title" v-if="headerText"><?php echo ma_tra("Autorisations")?></strong>

<!--                                        <a href="#" class="pull-right">--><?php //echo ma_tra("Accedez à la doumentation")?><!-- <span><i class="fa fa-arrow-right"></i> </span></a>-->
                                    </div>
                                    <div class="card-body">

                                        <div class="table-responsive table-striped">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <td><?php echo ma_tra("Services")?></td>
                                                    <td> </td>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6><?php echo ma_tra("Virement d'argent")?></h6>
                                                            <span>
                                                                <a href="#">
                                                                    <?php echo ma_tra("Ce service permet à l'utilisateur de faire des virements vers un autre compte")?>
                                                                </a>
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

                                                <thead>
                                                <tr>
                                                    <td><?php echo ma_tra("Langue")?></td>
                                                    <td>
                                                        <div style="width: 240px;border: 1px solid #0d1c3f;" class="rs-select2--light rs-select2--md">
                                                            <select id="lang" class="js-select2" name="property">
                                                                <option <?php  if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "fr_FR"){echo "selected"; }else{ echo ""; } ?> value="fr_FR"><?php echo ma_tra("Français")?></option>
                                                                <option <?php  if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "en_US"){echo "selected"; }else{ echo ""; } ?> value="en_US"><?php echo ma_tra("Anglais")?></option>
                                                            </select>
                                                            <div class="dropDownSelect2"></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </thead>
                                            </table>
                                        </div>

                                    </div>

                                </div>

                            </div>
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
<style type="text/css">
    .table-data .table td
    {
        padding-bottom: 0;
    }
</style>
<?php require 'pages/footer.php';?>

<script type="text/javascript">

    $("#lang").change(function () {
        Cookies.set("lang",$("#lang").val());
        window.location.reload(true);
    });

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

<script type="text/javascript">
    if(screen.width <= 500 ){
        $(".rs-select2--md").css("width","150px");
    }else {
        $(".rs-select2--md").removeStyle("width","150px");
    }
</script>