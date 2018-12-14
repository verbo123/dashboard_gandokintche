<?php session_start(); ?>
<?php
$active = "Virement";
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
                                    <strong class="card-title" v-if="headerText"><?php echo ma_tra("Virement d'argent")?></strong>
                                </div>
                                <div class="card-body">
                                    <?php
                                    include 'pages/control/virement.php';
                                    if(isset($_POST["valider"]))
                                    {
                                        if(!empty($_POST["montant"]) && !empty($_POST["login"]) && !empty($_POST["password"]))
                                        {
                                            extract($_POST);
                                            echo virementPonctuel($montant,$login,$password);
                                        }
                                    }

                                    if(isset($_POST["transfert"])){
                                        if(!empty($_POST["montant"]) && !empty($_POST["qrcode"]) && !empty($_POST["password"]))
                                        {
                                            extract($_POST);
                                            echo virementPonctuel($montant,$qrcode,$password);
                                        }
                                    }
                                    ?>
                                    <?php
                                    if(count(getVirement()) > 0)
                                    {
                                        ?>
                                        <div class="table-data__tool">
                                            <div class="table-data__tool-left">

                                            </div>
                                            <div class="table-data__tool-right">
                                                <?php
                                                if(permission_service()->virement == "true")
                                                {
                                                    ?>
                                                    <button  data-toggle="modal" data-target="#mediumModal" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                                        <?php echo ma_tra("Transfert manuel")?>
                                                    </button>

                                                    <button  data-toggle="modal" data-target="#qr" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                                        <?php echo ma_tra("Utiliser un QRcode")?>
                                                    </button>

                                                    <?php
                                                }else{
                                                    ?>
                                                    <button  data-toggle="modal" data-target="#vireme"  class="btn btn-danger au-btn--small">
                                                        <?php echo ma_tra("Transfert manuel")?>
                                                    </button>

                                                    <button  data-toggle="modal" data-target="#vireme"  class="btn btn-danger au-btn--small">
                                                        <?php echo ma_tra("Utiliser un QRcode")?>
                                                    </button>

                                                    <?php
                                                }
                                                ?>


                                            </div>
                                        </div>


                                        <table id="example" class="example table table-striped table-bordered" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th><?php echo ma_tra("Nom & Prénoms")?></th>
                                                <th><?php echo ma_tra("Identifiant")?></th>
                                                <th>Date</th>
                                                <th><?php echo ma_tra("Montant envoyé")?></th>
<!--                                                <th>Actions</th>-->
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php

                                            foreach (getVirement() as $vire)
                                            {

                                                ?>
                                                <tr>
                                                    <td><?php echo infos_user($vire->code_user_receiver)->nom." ".infos_user($vire->code_user_receiver)->prenom ?></td>
                                                    <td><?php echo infos_user($vire->code_user_receiver)->op_code ?></td>
                                                    <td><?php echo date_conversion($vire->date); ?></td>
                                                    <td><?php echo $vire->montant; ?> FCFA</td>
<!--                                                    <td>-->
<!--                                                        <div class="table-data-feature">-->
<!--                                                        -->
<!--                                                            <button style="margin-right:35%" class="item" data-toggle="tooltip" data-placement="top" title="Détails">-->
<!--                                                                <i class="zmdi zmdi-more"></i>-->
<!--                                                            </button>-->
<!--                                                        </div>-->
<!--                                                    </td>-->
                                                </tr>
                                                <?php
                                            }


                                            ?>

                                            </tbody>
                                        </table>
                                        <?php
                                    }
                                    else{

                                        ?>
                                        <div style="text-align: -webkit-center;text-align: -moz-center">
                                            <?php
                                            if(permission_service()->virement == "true")
                                            {
                                            ?>
                                            <button  data-toggle="modal" data-target="#mediumModal" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                                <?php echo ma_tra("Faite votre premier virement d'argent")?>
                                            </button>
                                            <?php
                                            }else{
                                            ?>
                                                <button  data-toggle="modal" data-target="#vireme" class="btn btn-danger au-btn--small">
                                                    <?php echo ma_tra("Faite votre premier virement d'argent")?>
                                                </button>
                                            <?php
                                            }
                                            ?>

                                        </div>

                                        <?php
                                    }
                                    ?>


                                </div>
                            </div>






                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="vireme" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mediumModalLabel"><?php echo ma_tra("Service de virement d'argent")?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">

                                <p><?php echo ma_tra("Désolé, Le service de virement n'est pas activé sur votre compte. Veuillez l'activer dans")?> <a href="settings">  <?php echo ma_tra("Paramétrage de compte")?></a></p>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <!-- modal medium -->
        <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mediumModalLabel"><?php echo ma_tra("Nouveau paiement")?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">

                                <form method="post" novalidate="novalidate" autocomplete="off">

                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1"><?php echo ma_tra("Montant")?></label>
                                        <input id="cc-pament" name="montant" type="number" class="form-control" aria-required="true" aria-invalid="false" placeholder="00 FCFA">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1"><?php echo ma_tra("Login du destinataire")?></label>
                                                <input id="cc-name" name="login[]" type="text" class="form-control cc-name valid" data-val="true"
                                                       autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="cc-name" class="control-label mb-1"> &nbsp;&nbsp;&nbsp;&nbsp; </label>
                                                <button id="ajout" type="button" class="btn btn-primary"> <i class="zmdi zmdi-plus"></i><?php echo ma_tra("Ajouter")?></button>
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                        </div>

                                    </div>

                                    <div id="champ"></div>

                                    <div class="form-group">
                                        <label for="cc-number" class="control-label mb-1"><?php echo ma_tra("Entrer votre mot de passe")?></label>
                                        <input id="cc-number" name="password" type="password" class="form-control cc-number identified visa" value="" data-val="true"
                                               data-val-required="Please enter the card number"
                                               autocomplete="cc-number">
                                        <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                    </div>
                                    <div>
                                        <button id="payment-button" type="submit" name="valider" class="btn btn-lg btn-info btn-block">
                                            <i class="fa fa-lock fa-lg"></i>&nbsp;
                                            <span id="payment-button-amount"><?php echo ma_tra("Tranférer")?></span>
                                            <span id="payment-button-sending" style="display:none;"><?php echo ma_tra("Tranfère…")?></span>
                                        </button>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- end modal medium -->


        <!-- modal medium -->
        <div class="modal fade" id="qr" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
            <div style="max-width: 600px" class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mediumModalLabel"><?php echo ma_tra("Nouveau paiement")?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">

                                <form method="post" novalidate="novalidate" autocomplete="off">

                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1"><?php echo ma_tra("Montant")?></label>
                                        <input  name="montant" type="number" class="form-control" aria-required="true" aria-invalid="false" placeholder="00 FCFA">
                                    </div>
                                    <div class="row">
                                        <div  style="display: flex;" class="col-md-8">
                                            <input name="qrcode[]"  type=text style="height: 38px;cursor: pointer" placeholder="<?php echo ma_tra("Charger le QRcode")?>" class="form-control qrcode-text">
                                            <div style="cursor: pointer" class="upload-btn-wrapper">
                                                <button style="cursor: pointer" type="button" class="btn btn-warning">QRcode</button>
                                                <input style="cursor: pointer" title=" " type="file"  capture="environment" onchange="openQRCamera(this);" tabindex=-1 />
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="ca form-group">
                                                <button id="ajout2" type="button" class="btn btn-primary"> <i class="zmdi zmdi-plus"></i><?php echo ma_tra("Ajouter")?></button>
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="champ2">

                                    </div>

                                    <div class="form-group">
                                        <label for="cc-number" class="control-label mb-1"><?php echo ma_tra("Entrer votre mot de passe")?></label>
                                        <input  name="password" type="password" class="form-control cc-number identified visa" value="" data-val="true"
                                               data-val-required="Please enter the card number"
                                               autocomplete="cc-number">
                                        <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                    </div>
                                    <div>
                                        <button  type="submit" name="transfert" class="btn btn-lg btn-info btn-block">
                                            <i class="fa fa-lock fa-lg"></i>&nbsp;
                                            <span id="payment-button-amount"><?php echo ma_tra("Tranférer")?></span>
                                            <span id="payment-button-sending" style="display:none;"><?php echo ma_tra("Tranfère…")?></span>
                                        </button>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- end modal medium -->

        <?php
        require 'pages/htmfooter.php';
        ?>
    </div>
    <!-- END PAGE CONTAINER-->


<style>
    /*.upload-btn-wrapper {*/
        /*position: relative;*/
        /*overflow: hidden;*/
        /*display: inline-block;*/
    /*}*/

    /*.btn {*/
        /*border: 2px solid gray;*/
        /*color: gray;*/
        /*background-color: white;*/
        /*padding: 8px 20px;*/
        /*border-radius: 8px;*/
        /*font-size: 20px;*/
        /*font-weight: bold;*/
    /*}*/

    .upload-btn-wrapper input[type=file] {
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
    }
    .qrcode-text {padding-right:1.7em; margin-right:0}
    .qrcode-text-btn {display:inline-block; background:url(//dab1nmslvvntp.cloudfront.net/wp-content/uploads/2017/07/1499401426qr_icon.svg) 50% 50% no-repeat; height:1em; width:1.7em; margin-left:-1.7em; cursor:pointer}
    .qrcode-text-btn > input[type=file] {position:absolute; overflow:hidden; width:1px; height:1px; opacity:0}
    @media (max-width: 400px) {
        div.dataTables_wrapper div.dataTables_filter input{
            display: block;
        }
    }


    div.dataTables_wrapper div.dataTables_info{
        white-space:normal;
    }
</style>



</div>
<?php
require 'pages/footer.php';
?>
<script src="js/qrcode_reader.js"></script>
<script type="text/javascript">

var detect=navigator.userAgent.toLowerCase();
function checkIt(string)
{
    place = detect.indexOf(string) + 1;
    thestring = string;
    return place;
}

if(checkIt("edge") || checkIt("msie")){
    console.log("explorer");
    $(".ca").css("float","right");
}

    function openQRCamera(node) {
        var reader = new FileReader();
        reader.onload = function() {
            node.value = "";
            qrcode.callback = function(res) {
                if(res instanceof Error) {
                    alert("<?php echo ma_tra("Aucun QRcode trouvé.")?>");
                } else {
                    node.parentNode.previousElementSibling.value = res;
                    console.log(res);
                }
            };
            qrcode.decode(reader.result);
        };

        reader.readAsDataURL(node.files[0]);
    }

    $("#payment-button-amount").click(function () {
        $("#payment-button-amount").css("display","none");
        $("#payment-button-sending").css("display","block");
    });

    function remove(ide)
    {
        $('#sup'+ide).remove();
    }

    var dataContenaire = $("#champ");
    var i = 0;
    var html = '';
    $("#ajout").click(function () {
        i++;
        console.log(i);
        html = '<div class="row" id="sup' + i + '"  ><div  class="col-md-8"><div class="form-group has-success"> <label for="cc-name" class="control-label mb-1"><?php echo ma_tra("Login du destinataire")?></label><input  name="login[]" type="text" class="form-control cc-name valid" data-val="true" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error"><span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span></div></div><div class="col-md-3"><div id="' + i + '"  class="form-group"><label for="cc-name" class="control-label mb-1"> &nbsp;&nbsp;&nbsp;&nbsp; </label><button onclick="remove('+ i +')"  type="button" class="btn btn-danger"> <i class="zmdi zmdi-minus"></i> <?php echo ma_tra("Enlever")?></button><span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span></div></div></div>';
        dataContenaire.append(html);
    });


    function remove2(ide)
    {
        $('#sup2'+ide).remove();
    }

    var dataContenaire2 = $("#champ2");
    var i2 = 0;
    var html2 = '';
    $("#ajout2").click(function () {
        i2++;
        if(checkIt("edge") || checkIt("msie")){
             html2 = '<div class="row" id="sup2' + i2 + '"  >' +
            '' +
            '<div  style="display: flex;"  class="col-md-8">' +
            '<input name="qrcode[]"  type=text style="height: 38px;cursor: pointer" placeholder="<?php echo ma_tra("Charger le QRcode")?>" class="form-control qrcode-text">' +
            '<div style="cursor: pointer" class="upload-btn-wrapper">' +
            '<button style="cursor: pointer" type="button" class="btn btn-warning">' +
            'QRcode' +
            '</button>' +
            '<input style="cursor: pointer" title=" " type="file"  capture="environment" onchange="openQRCamera(this);" tabindex=-1 />' +
            '</div>' +
            '</div>' +
            '<div class="col-md-4">' +
            '<div style="float: right"  id="' + i2 + '"  class="form-group">' +
            '<button onclick="remove2(' + i2 + ')"  type="button" class="btn btn-danger"> ' +
            '<i class="zmdi zmdi-minus"></i> ' +
            'Enlever' +
            '</button>' +
            '<span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true">' +
            '</span>' +
            '</div>' +
            '</div>' +
            '</div>';
        }else{
             html2 = '<div class="row" id="sup2' + i2 + '"  >' +
            '' +
            '<div  style="display: flex;"  class="col-md-8">' +
            '<input name="qrcode[]"  type=text style="height: 38px;cursor: pointer" placeholder="<?php echo ma_tra('Charger le QRcode')?>" class="form-control qrcode-text">' +
            '<div style="cursor: pointer" class="upload-btn-wrapper">' +
            '<button style="cursor: pointer" type="button" class="btn btn-warning">' +
            'QRcode' +
            '</button>' +
            '<input style="cursor: pointer" title=" " type="file"  capture="environment" onchange="openQRCamera(this);" tabindex=-1 />' +
            '</div>' +
            '</div>' +
            '<div class="col-md-4">' +
            '<div id="' + i2 + '"  class="form-group">' +
            '<button onclick="remove2(' + i2 + ')"  type="button" class="btn btn-danger"> ' +
            '<i class="zmdi zmdi-minus"></i> ' +
            'Enlever' +
            '</button>' +
            '<span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true">' +
            '</span>' +
            '</div>' +
            '</div>' +
            '</div>';
        }
       
        dataContenaire2.append(html2);
    });

</script>

<script type="text/javascript">
    if(screen.width <= 500 ){
        $('#example').addClass(' table-responsive');
    }else {
        $('#example').removeClass(' table-responsive');
    }
</script>
