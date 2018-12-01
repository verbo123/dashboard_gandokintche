<?php session_start(); ?>
<?php
$active = "recharge";
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
                                    <strong class="card-title" v-if="headerText">Recharge de compte</strong>
                                </div>
                                <div style="padding-top: 0px" class="card-body">

                                    <div style="margin-top: 8px" class="erro">

                                    </div>

                                    <?php
                                    include 'pages/control/virement.php';

                                    if(count(getVirementRecharge()) > 0)
                                    {
                                        ?>
                                        <div class="table-data__tool">
                                            <div class="table-data__tool-left">
                                                   Votre solde de recharge : <span style="padding: 8px" class="badge badge-pill badge-warning"><?php echo getMontantUserRecharge(getUserLogin())->solde; ?> Crédits</span>
                                                    <span data-toggle="tooltip" data-placement="right" title="Il s'agit du solde de compte de recharge.Vous pouvez nous contactez pour en acheter">
                                                        <img style="width:15px;margin-left: 8px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAANGSURBVEhLrVdLT1NBFG7UjW58bkyMJnBbiW40caMbFiZGjUZjTFypAYkb3yZufIfElb/BHyAuTAjee7FAQQIaIFHmXh4tKIZHRSAoraRgi8dzhinc0nOHFv2SL9x2vjkfM/fMmdNAMQjV9u8Ivek+YdiiwrDEI0l8pu/Kwr3blez/YGdt16agKW4YltMStJwMEnyYQV2EtLtetm9U04tHeSSyAYNcNUwRZ0y0pDkhy6miGCpcYdhnu9twhQ1c0KJoOm9314mtKqwehumU4koH2EAMDzX0wtOeMbjcMcSOY6wYxVThedBKizEts12IJlJAWPgDcLI1xuooZkm4a7OyyQW9D8zSRnaiD8nIiwsfPrM6Iq46HKipWa/slkGJxE3Q8UC4Bybn09K0dTIJe21elyWaX1F2i6Ajs5bsJR5u7JMrpW3nxr3EhB0lL2WLCWU5tzjhajzS1AcXO77Iv9w4S1tcV7a4zZbTnCfQ8GhLFOrHZ2RCEWi7V9vmJZqiSZpSGcQvdBUph7c/DUMyvbDoqPDjd4bV+jBDpydAdZYZZPnAHQVaZOf0L2ibSi66ImxcPaf3o2E7p7BgiEpucCXLI/3wamQazrQNyM8N3xPKFuC+M5qn1zFkibv0fh+uHFiN++tdmM0sbzf9U5zOl6ZTvSbjS1ges4gmU6xGSzIudKu9fDE0qWxBPnMaHQ3TvRMotd3j3KCOseScsgWo6PS5HDSUyUWdA34o+DjR+8wihe+Z3jen8yOWzbQ8TgQ81BFOxPGxO6ZsAZonEqxGy2wBIQQtcZMVMayL/1S2AM+j46xGx5DlXlO2S5fEGCdcyeHZeWULUKneL21/dW88T8twJK8fox6JEebwIF6DXtzrHgHr2wwk0hmo6vrKzvGSTpCy8wAvabqsuQlZHnuXe/ETJubScK59kNXn0BQ22wgQqD1BgW/rQyv2VqwWTC66jzmtl3jtRn1bnyyCdaIEzWNcAOLZtkF41heH8+8LWCUSd7GfYqrwelBLSq0pF6go4vbuef1xiwpbGGTzh8lA7QobVEdTDMtEegLrVLjiQelP7QoGa8KgvhWOKpLUoPaffsJwoPKKBqepyNMNQ6Rnqr1LZbAgBAJ/AWa4rWoZQLfIAAAAAElFTkSuQmCC"> </span>

                                            </div>
                                            <div class="table-data__tool-right">
                                                <button  data-toggle="modal" data-target="#mediumModal" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                                   Nouvelle recharge
                                                </button>

                                                <button  data-toggle="modal" data-target="#qr" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                                    Utiliser un QRCode
                                                </button>
                                            </div>
                                        </div>


                                        <table id="example" class="example table table-striped table-bordered" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th>ID Transaction</th>
                                                <th>Identifiant</th>
                                                <th>Nom & Prénom</th>
                                                <th>Date</th>
                                                <th>Montant envoyé</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php

                                            foreach (getVirementRecharge() as $vire)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?php echo $vire->no_trans; ?></td>
                                                    <td><?php echo infos_user($vire->code_user_receiver)->op_code ?></td>
                                                    <td><?php echo infos_user($vire->code_user_receiver)->nom.' '.infos_user($vire->code_user_receiver)->prenom ?></td>
                                                    <td><?php echo date_conversion($vire->date); ?></td>
                                                    <td><?php echo $vire->montant; ?> FCFA</td>
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
                                            <div class="table-data__tool">
                                                <div class="table-data__tool-left">
                                                    Votre solde de recharge : <span style="padding: 8px" class="badge badge-pill badge-warning"><?php echo getMontantUserRecharge(getUserLogin())->solde; ?> Crédits</span>
                                                    <span data-toggle="tooltip" data-placement="right" title="Il s'agit du solde de compte de recharge.Vous pouvez nous contactez pour en acheter">
                                                        <img style="width:15px;margin-left: 8px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAANGSURBVEhLrVdLT1NBFG7UjW58bkyMJnBbiW40caMbFiZGjUZjTFypAYkb3yZufIfElb/BHyAuTAjee7FAQQIaIFHmXh4tKIZHRSAoraRgi8dzhinc0nOHFv2SL9x2vjkfM/fMmdNAMQjV9u8Ivek+YdiiwrDEI0l8pu/Kwr3blez/YGdt16agKW4YltMStJwMEnyYQV2EtLtetm9U04tHeSSyAYNcNUwRZ0y0pDkhy6miGCpcYdhnu9twhQ1c0KJoOm9314mtKqwehumU4koH2EAMDzX0wtOeMbjcMcSOY6wYxVThedBKizEts12IJlJAWPgDcLI1xuooZkm4a7OyyQW9D8zSRnaiD8nIiwsfPrM6Iq46HKipWa/slkGJxE3Q8UC4Bybn09K0dTIJe21elyWaX1F2i6Ajs5bsJR5u7JMrpW3nxr3EhB0lL2WLCWU5tzjhajzS1AcXO77Iv9w4S1tcV7a4zZbTnCfQ8GhLFOrHZ2RCEWi7V9vmJZqiSZpSGcQvdBUph7c/DUMyvbDoqPDjd4bV+jBDpydAdZYZZPnAHQVaZOf0L2ibSi66ImxcPaf3o2E7p7BgiEpucCXLI/3wamQazrQNyM8N3xPKFuC+M5qn1zFkibv0fh+uHFiN++tdmM0sbzf9U5zOl6ZTvSbjS1ges4gmU6xGSzIudKu9fDE0qWxBPnMaHQ3TvRMotd3j3KCOseScsgWo6PS5HDSUyUWdA34o+DjR+8wihe+Z3jen8yOWzbQ8TgQ81BFOxPGxO6ZsAZonEqxGy2wBIQQtcZMVMayL/1S2AM+j46xGx5DlXlO2S5fEGCdcyeHZeWULUKneL21/dW88T8twJK8fox6JEebwIF6DXtzrHgHr2wwk0hmo6vrKzvGSTpCy8wAvabqsuQlZHnuXe/ETJubScK59kNXn0BQ22wgQqD1BgW/rQyv2VqwWTC66jzmtl3jtRn1bnyyCdaIEzWNcAOLZtkF41heH8+8LWCUSd7GfYqrwelBLSq0pF6go4vbuef1xiwpbGGTzh8lA7QobVEdTDMtEegLrVLjiQelP7QoGa8KgvhWOKpLUoPaffsJwoPKKBqepyNMNQ6Rnqr1LZbAgBAJ/AWa4rWoZQLfIAAAAAElFTkSuQmCC"> </span>

                                                </div>
                                                <div class="table-data__tool-right">
                                                    <button  data-toggle="modal" data-target="#mediumModal" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                                        Nouvelle recharge
                                                    </button>
                                                    <button  data-toggle="modal" data-target="#qr" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                                        Utiliser un QRCode
                                                    </button>
                                                </div>
                                            </div>

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

        <div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
             data-backdrop="static">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticModalLabel">Confirmation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div style="text-align: center" id="content">

                        </div>
                        <div class="form-group">
                            <label for="cc-number" class="control-label mb-1">Entrer votre mot de passe pour confirmer</label>
                            <input id="password" name="password" type="password" class="form-control cc-number identified visa" value="" data-val="true"
                                   data-val-required="Please enter the card number"
                                   autocomplete="cc-number">
                            <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">annuler</button>
                        <button id="envoyer" type="button" class="btn btn-primary">Confirmer</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="confirm_qr" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
             data-backdrop="static">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticModalLabel">Confirmation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div style="text-align: center" id="content_qr">

                        </div>
                        <div class="form-group">
                            <label for="cc-number" class="control-label mb-1">Entrer votre mot de passe pour confirmer</label>
                            <input id="password_qr" name="password" type="password" class="form-control cc-number identified visa" value="" data-val="true"
                                   data-val-required="Please enter the card number"
                                   autocomplete="cc-number">
                            <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">annuler</button>
                        <button id="envoyer_qr" type="button" class="btn btn-primary">Confirmer</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- modal medium -->
        <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mediumModalLabel">Nouvelle recharge</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">

                                <div>

                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Montant</label>
                                        <input id="montant" name="montant" type="number" class="form-control" aria-required="true" aria-invalid="false" placeholder="00 FCFA">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Login du destinataire</label>
                                                <input id="login" name="login" type="text" class="form-control cc-name valid" data-val="true"
                                                       autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <button id="submit" type="submit"  class="btn btn-lg btn-info btn-block">&nbsp;
                                            <span>Recharger</span>
                                        </button>
                                    </div>
                                </div>


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
                        <h5 class="modal-title" id="mediumModalLabel">Nouveau paiement</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">

                                <div>

                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Montant</label>
                                        <input id="mont"  name="montant" type="number" class="form-control" aria-required="true" aria-invalid="false" placeholder="00 FCFA">
                                    </div>

                                    <div class="row">
                                        <div  style="display: flex;" class="col-md-12">
                                            <input id="qrcode" name="qrcode"  type=text style="height: 38px;cursor: pointer" placeholder="Charger le QRcode" class="form-control qrcode-text">
                                            <div style="cursor: pointer" class="upload-btn-wrapper">
                                                <button style="cursor: pointer" type="button" class="btn btn-warning">QRcode</button>
                                                <input  style="cursor: pointer;width:100%" title=" " type="file"  capture="environment" onchange="openQRCamera(this);" tabindex=-1 />
                                            </div>
                                        </div>
                                    </div>

                                    <div style="margin-top: 15px">
                                        <button id="tr_qr"  type="submit" name="transfert" class="btn btn-lg btn-info btn-block">
                                            <span>Tranférer</span>
                                        </button>
                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- end modal medium -->


        <div class="modal fade" id="loader" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" data-backdrop="static" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div style="background-color: transparent; border: none;margin-top: 50%" class="modal-content">
                    <div style="background-color: transparent;" class="modal-body">
                        <div style="background-color: transparent;border: none" class="card">
                            <div style="margin: 0 auto;" class="card-body">

                                <img src="images/Loader.gif"/>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="modal fade" id="succes" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" data-backdrop="static" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div  class="modal-content">
                    <div style="background-color: #f7f7f7" class="modal-body">
                        <div style="background-color: #f7f7f7"  class="card">
                            <div id="msgsuccess" style="margin: 0 auto;" class="card-body">



                            </div>
                            <div style="background-color: #f7f7f7" class="modal-footer">
                                <button id="actualise" type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
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

    function remplirsucess(data){
        html ='<img src="images/tre.gif"/><p style="text-align: center">'+data.msg+'</p>';
        return $('#msgsuccess').html(html);
    }


    $('#envoyer').click(function () {
        if($('#password').val() != '' && $('#montant').val() != '' && $('#login').val() != ''){
            $.ajax({
                url:'pages/control/confirm_recharge.php',
                type:'POST',
                async:true,
                data:"montant="+encodeURIComponent( $('#montant').val() )+"&user="+encodeURIComponent($('#login').val())+"&passe="+encodeURIComponent($('#password').val()),
                beforeSend: function() {
                    $('#confirm').modal('hide');
                    $("#loader").modal('show');
                },
                success: function(data) {
                    data = JSON.parse(data);
                    console.log(data);
                    setTimeout(function () {
                        if(data != false){
                            $("#loader").modal('hide');
                            remplirsucess(data);
                            $('#succes').modal('show');
                        }else{
                            $("#loader").modal('hide');
                            ms='<div id="msg" class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>Désolé, votre code de sécurité est incorrect !</div>';
                            $('.erro').html(ms);
                        }
                    },5000);

                }
            });
        }
    });
    contenair=$('#content');
    function remplir(data){
        html = 'Vous voulez effectuer une recharge à '+data.nom+' '+data.prenom;
        return contenair.html(html);
    }
    $('#submit').click(function () {

        $.ajax({
            url:'pages/control/recharge_info.php',
            type:'POST',
            async:true,
            data:"montant="+encodeURIComponent( $('#montant').val() )+"&user="+encodeURIComponent($('#login').val()),
            beforeSend: function() {
                $('#mediumModal').modal('hide');
                $("#loader").modal('show');
            },
            success: function(data) {
                data = JSON.parse(data);
                setTimeout(function () {
                    if(!data.hasOwnProperty('msg')){
                        $("#loader").modal('hide');
                        remplir(data);
                        $('#confirm').modal('show');
                    }else{
                        if (data.hasOwnProperty('msg'))
                        {
                            $("#loader").modal('hide');
                            ms='<div id="msg" class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+data.msg+'</div>';
                            $('.erro').html(ms);
                        }
                    }
                },5000);

            }
        });
    });


    contenair_qr=$('#content_qr');
    function remplir_qr(data){
        html = 'Vous voulez effectuer une recharge à '+data.nom+' '+data.prenom;
        return contenair_qr.html(html);
    }
    $('#envoyer_qr').click(function () {
        if($('#password_qr').val() != '' && $('#mont').val() != '' && $('#qrcode').val() != ''){
            $.ajax({
                url:'pages/control/confirm_recharge.php',
                type:'POST',
                async:true,
                data:"montant="+encodeURIComponent( $('#mont').val() )+"&user="+encodeURIComponent($('#qrcode').val())+"&passe="+encodeURIComponent($('#password_qr').val()),
                beforeSend: function() {
                    $('#confirm_qr').modal('hide');
                    $("#loader").modal('show');
                },
                success: function(data) {
                    data = JSON.parse(data);
                    setTimeout(function () {
                        if(data != false){
                            $("#loader").modal('hide');
                            remplirsucess(data);
                            $('#succes').modal('show');
                        }else{
                            $("#loader").modal('hide');
                            ms='<div id="msg" class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>Désolé, votre code de sécurité est incorrect !</div>';
                            $('.erro').html(ms);
                        }
                    },5000);

                }
            });
        }
    });
    $('#tr_qr').click(function () {

        $.ajax({
            url:'pages/control/recharge_info.php',
            type:'POST',
            async:true,
            data:"montant="+encodeURIComponent( $('#mont').val() )+"&user="+encodeURIComponent($('#qrcode').val()),
            beforeSend: function() {
                $('#qr').modal('hide');
                $("#loader").modal('show');
            },
            success: function(data) {
                data = JSON.parse(data);
                setTimeout(function () {
                    if(!data.hasOwnProperty('msg')){
                        $("#loader").modal('hide');
                        remplir_qr(data);
                        $('#confirm_qr').modal('show');
                    }else{
                        if (data.hasOwnProperty('msg'))
                        {
                            $("#loader").modal('hide');
                            ms='<div id="msg" class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+data.msg+'</div>';
                            $('.erro').html(ms);
                        }
                    }
                },5000);

            }
        });
    });


    $('#actualise').click(function () {
        window.location.href='recharge';
    });



    var detect=navigator.userAgent.toLowerCase();
    function checkIt(string)
    {
        place = detect.indexOf(string) + 1;
        thestring = string;
        return place;
    }

    if(checkIt("edge") || checkIt("msie")){
        console.log("edge");
        $(".ca").css("float","right");
    }


    function openQRCamera(node) {
        var reader = new FileReader();
        reader.onload = function() {
            node.value = "";
            qrcode.callback = function(res) {
                if(res instanceof Error) {
                    alert("Aucun QRcode trouvé.");
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
        html = '<div class="row" id="sup' + i + '"  ><div  class="col-md-8"><div class="form-group has-success"> <label for="cc-name" class="control-label mb-1">Login du destinataire</label><input  name="login[]" type="text" class="form-control cc-name valid" data-val="true" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error"><span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span></div></div><div class="col-md-3"><div id="' + i + '"  class="form-group"><label for="cc-name" class="control-label mb-1"> &nbsp;&nbsp;&nbsp;&nbsp; </label><button onclick="remove('+ i +')"  type="button" class="btn btn-danger"> <i class="zmdi zmdi-minus"></i> Enlever</button><span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span></div></div></div>';
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
                '<input name="qrcode[]"  type=text style="height: 38px;cursor: pointer" placeholder="Charger le QRcode" class="form-control qrcode-text">' +
                '<div style="cursor: pointer" class="upload-btn-wrapper">' +
                '<button style="cursor: pointer" type="button" class="btn btn-warning">' +
                'QRcode' +
                '</button>' +
                '<input style="cursor: pointer" title=" " type="file"  capture="environment" onchange="openQRCamera(this);" tabindex=-1 />' +
                '</div>' +
                '</div>' +
                '<div class="col-md-4">' +
                '<div style="float: right"  id="' + i2 + '"  class=" form-group">' +
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
                '<input name="qrcode[]"  type=text style="height: 38px;cursor: pointer" placeholder="Charger le QRcode" class="form-control qrcode-text">' +
                '<div style="cursor: pointer" class="upload-btn-wrapper">' +
                '<button style="cursor: pointer" type="button" class="btn btn-warning">' +
                'QRcode' +
                '</button>' +
                '<input style="cursor: pointer" title=" " type="file"  capture="environment" onchange="openQRCamera(this);" tabindex=-1 />' +
                '</div>' +
                '</div>' +
                '<div class="col-md-4">' +
                '<div  id="' + i2 + '"  class="form-group">' +
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
