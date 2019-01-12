<?php
$active = "Balance";
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

            <style type="text/css">
                .table-data__tool{
                    margin-top: 0;
                }
                @keyframes bounce {
                    0%, 20%, 60%, 100% {
                        -webkit-transform: translateY(0);
                        transform: translateY(0);
                    }

                    40% {
                        -webkit-transform: translateY(-20px);
                        transform: translateY(-20px);
                    }

                    80% {
                        -webkit-transform: translateY(-10px);
                        transform: translateY(-10px);
                    }
                }

                #id1:hover, #id2:hover, #id4:hover {
                    animation: bounce 1s;
                }

                #id3{
                    animation: bounce 3s;
                }



            </style>


            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <i class="mr-2 fa fa-align-justify"></i>
                                        <strong class="card-title" v-if="headerText">Balance</strong>

                                        <a href="myrecharge" style="float: right;padding: 10px;color: #0d1c3f;" class="badge badge-pill badge-warning">
                                            <?php echo ma_tra("Historiques des recharges")?>
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <div style="margin-top: 8px" class="erro">

                                        </div>
<!--                                        <div class="table-data__tool">-->
<!--                                            <div class="table-data__tool-left">-->
<!--                                                Solde personnel <span data-toggle="tooltip" data-placement="right" title="Il s'agit du solde de vos dépôts ou reception de fond issu d'un proche"><img style="width:15px;margin-left: 20px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAANGSURBVEhLrVdLT1NBFG7UjW58bkyMJnBbiW40caMbFiZGjUZjTFypAYkb3yZufIfElb/BHyAuTAjee7FAQQIaIFHmXh4tKIZHRSAoraRgi8dzhinc0nOHFv2SL9x2vjkfM/fMmdNAMQjV9u8Ivek+YdiiwrDEI0l8pu/Kwr3blez/YGdt16agKW4YltMStJwMEnyYQV2EtLtetm9U04tHeSSyAYNcNUwRZ0y0pDkhy6miGCpcYdhnu9twhQ1c0KJoOm9314mtKqwehumU4koH2EAMDzX0wtOeMbjcMcSOY6wYxVThedBKizEts12IJlJAWPgDcLI1xuooZkm4a7OyyQW9D8zSRnaiD8nIiwsfPrM6Iq46HKipWa/slkGJxE3Q8UC4Bybn09K0dTIJe21elyWaX1F2i6Ajs5bsJR5u7JMrpW3nxr3EhB0lL2WLCWU5tzjhajzS1AcXO77Iv9w4S1tcV7a4zZbTnCfQ8GhLFOrHZ2RCEWi7V9vmJZqiSZpSGcQvdBUph7c/DUMyvbDoqPDjd4bV+jBDpydAdZYZZPnAHQVaZOf0L2ibSi66ImxcPaf3o2E7p7BgiEpucCXLI/3wamQazrQNyM8N3xPKFuC+M5qn1zFkibv0fh+uHFiN++tdmM0sbzf9U5zOl6ZTvSbjS1ges4gmU6xGSzIudKu9fDE0qWxBPnMaHQ3TvRMotd3j3KCOseScsgWo6PS5HDSUyUWdA34o+DjR+8wihe+Z3jen8yOWzbQ8TgQ81BFOxPGxO6ZsAZonEqxGy2wBIQQtcZMVMayL/1S2AM+j46xGx5DlXlO2S5fEGCdcyeHZeWULUKneL21/dW88T8twJK8fox6JEebwIF6DXtzrHgHr2wwk0hmo6vrKzvGSTpCy8wAvabqsuQlZHnuXe/ETJubScK59kNXn0BQ22wgQqD1BgW/rQyv2VqwWTC66jzmtl3jtRn1bnyyCdaIEzWNcAOLZtkF41heH8+8LWCUSd7GfYqrwelBLSq0pF6go4vbuef1xiwpbGGTzh8lA7QobVEdTDMtEegLrVLjiQelP7QoGa8KgvhWOKpLUoPaffsJwoPKKBqepyNMNQ6Rnqr1LZbAgBAJ/AWa4rWoZQLfIAAAAAElFTkSuQmCC"></span>-->
<!--                                            </div>-->
<!--                                            <div class="table-data__tool-right">-->
<!--                                               <span> --><?php //echo getMontantUser(getUserLogin())->total ?><!-- FCFA</span>-->
<!--                                                <span style="float: right">&nbsp;&nbsp;&nbsp;&nbsp;</span>-->
<!--                                            </div>-->
<!--                                        </div>-->

                                        <div class="table-data__tool">
                                            <div class="table-data__tool-left" >
                                                <?php echo ma_tra("Solde issu du commerce")?> <span data-toggle="tooltip" data-placement="right" title=" <?php echo ma_tra("Il s'agit du solde issu des ventes provenant de votre site e-commerce")?>"><img style="width:15px;margin-left: 20px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAANGSURBVEhLrVdLT1NBFG7UjW58bkyMJnBbiW40caMbFiZGjUZjTFypAYkb3yZufIfElb/BHyAuTAjee7FAQQIaIFHmXh4tKIZHRSAoraRgi8dzhinc0nOHFv2SL9x2vjkfM/fMmdNAMQjV9u8Ivek+YdiiwrDEI0l8pu/Kwr3blez/YGdt16agKW4YltMStJwMEnyYQV2EtLtetm9U04tHeSSyAYNcNUwRZ0y0pDkhy6miGCpcYdhnu9twhQ1c0KJoOm9314mtKqwehumU4koH2EAMDzX0wtOeMbjcMcSOY6wYxVThedBKizEts12IJlJAWPgDcLI1xuooZkm4a7OyyQW9D8zSRnaiD8nIiwsfPrM6Iq46HKipWa/slkGJxE3Q8UC4Bybn09K0dTIJe21elyWaX1F2i6Ajs5bsJR5u7JMrpW3nxr3EhB0lL2WLCWU5tzjhajzS1AcXO77Iv9w4S1tcV7a4zZbTnCfQ8GhLFOrHZ2RCEWi7V9vmJZqiSZpSGcQvdBUph7c/DUMyvbDoqPDjd4bV+jBDpydAdZYZZPnAHQVaZOf0L2ibSi66ImxcPaf3o2E7p7BgiEpucCXLI/3wamQazrQNyM8N3xPKFuC+M5qn1zFkibv0fh+uHFiN++tdmM0sbzf9U5zOl6ZTvSbjS1ges4gmU6xGSzIudKu9fDE0qWxBPnMaHQ3TvRMotd3j3KCOseScsgWo6PS5HDSUyUWdA34o+DjR+8wihe+Z3jen8yOWzbQ8TgQ81BFOxPGxO6ZsAZonEqxGy2wBIQQtcZMVMayL/1S2AM+j46xGx5DlXlO2S5fEGCdcyeHZeWULUKneL21/dW88T8twJK8fox6JEebwIF6DXtzrHgHr2wwk0hmo6vrKzvGSTpCy8wAvabqsuQlZHnuXe/ETJubScK59kNXn0BQ22wgQqD1BgW/rQyv2VqwWTC66jzmtl3jtRn1bnyyCdaIEzWNcAOLZtkF41heH8+8LWCUSd7GfYqrwelBLSq0pF6go4vbuef1xiwpbGGTzh8lA7QobVEdTDMtEegLrVLjiQelP7QoGa8KgvhWOKpLUoPaffsJwoPKKBqepyNMNQ6Rnqr1LZbAgBAJ/AWa4rWoZQLfIAAAAAElFTkSuQmCC"> </span>
                                            </div>
                                            <div class="table-data__tool-right">
                                                <span id="miss2"><?php echo getMontantUser(getUserLogin())->montant_commerce ?> FCFA</span>
                                                <button id="id1" data-toggle="tooltip" data-placement="right" title=" <?php echo ma_tra("Virer votre fond issu de l'e-commerce vers votre solde total")?>" class="badge badge-pill badge-danger" style="float: right;margin-left: 25px"><?php echo ma_tra("Virer les fonds")?></button>
                                            </div>
                                        </div>

                                        <div class="table-data__tool">
                                            <div class="table-data__tool-left" >
                                                <?php echo ma_tra("Commission actuelle")?> <span data-toggle="tooltip" data-placement="right" title=" <?php echo ma_tra("Il s'agit du solde issu des recharges vendues")?>"><img style="width:15px;margin-left: 20px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAANGSURBVEhLrVdLT1NBFG7UjW58bkyMJnBbiW40caMbFiZGjUZjTFypAYkb3yZufIfElb/BHyAuTAjee7FAQQIaIFHmXh4tKIZHRSAoraRgi8dzhinc0nOHFv2SL9x2vjkfM/fMmdNAMQjV9u8Ivek+YdiiwrDEI0l8pu/Kwr3blez/YGdt16agKW4YltMStJwMEnyYQV2EtLtetm9U04tHeSSyAYNcNUwRZ0y0pDkhy6miGCpcYdhnu9twhQ1c0KJoOm9314mtKqwehumU4koH2EAMDzX0wtOeMbjcMcSOY6wYxVThedBKizEts12IJlJAWPgDcLI1xuooZkm4a7OyyQW9D8zSRnaiD8nIiwsfPrM6Iq46HKipWa/slkGJxE3Q8UC4Bybn09K0dTIJe21elyWaX1F2i6Ajs5bsJR5u7JMrpW3nxr3EhB0lL2WLCWU5tzjhajzS1AcXO77Iv9w4S1tcV7a4zZbTnCfQ8GhLFOrHZ2RCEWi7V9vmJZqiSZpSGcQvdBUph7c/DUMyvbDoqPDjd4bV+jBDpydAdZYZZPnAHQVaZOf0L2ibSi66ImxcPaf3o2E7p7BgiEpucCXLI/3wamQazrQNyM8N3xPKFuC+M5qn1zFkibv0fh+uHFiN++tdmM0sbzf9U5zOl6ZTvSbjS1ges4gmU6xGSzIudKu9fDE0qWxBPnMaHQ3TvRMotd3j3KCOseScsgWo6PS5HDSUyUWdA34o+DjR+8wihe+Z3jen8yOWzbQ8TgQ81BFOxPGxO6ZsAZonEqxGy2wBIQQtcZMVMayL/1S2AM+j46xGx5DlXlO2S5fEGCdcyeHZeWULUKneL21/dW88T8twJK8fox6JEebwIF6DXtzrHgHr2wwk0hmo6vrKzvGSTpCy8wAvabqsuQlZHnuXe/ETJubScK59kNXn0BQ22wgQqD1BgW/rQyv2VqwWTC66jzmtl3jtRn1bnyyCdaIEzWNcAOLZtkF41heH8+8LWCUSd7GfYqrwelBLSq0pF6go4vbuef1xiwpbGGTzh8lA7QobVEdTDMtEegLrVLjiQelP7QoGa8KgvhWOKpLUoPaffsJwoPKKBqepyNMNQ6Rnqr1LZbAgBAJ/AWa4rWoZQLfIAAAAAElFTkSuQmCC"> </span>
                                        </div>
                                            <div  class="table-data__tool-right">
                                                <span id="miss"><?php echo getMontantUser(getUserLogin())->montant_commission ?> FCFA</span>
                                                <button id="id2" data-toggle="tooltip" data-placement="right" title=" <?php echo ma_tra("Virer votre fond issu de vos commissions sur recharge vers votre solde total")?>" class="badge badge-pill badge-danger" style="float: right;margin-left: 25px"><?php echo ma_tra("Virer les fonds")?></button>
                                            </div>
                                        </div>

                                        <hr>
                                        <div style="text-align: center" class="">
                                            <div style="font-size:20px;" class="">
                                                <?php echo ma_tra("Solde Total")?>
                                            </div>
                                            <div style="font-size: 30px;" class="">
                                                <span id="id3" style="padding-left: 20px;padding-right: 20px;" class="badge badge-pill badge-success">
                                                    <span><?php echo getMontantUser(getUserLogin())->total ?> FCFA</span>
                                                </span>
                                            </div>
                                        </div>

                                    </div>
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

            <div class="modal fade" id="succes2" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" data-backdrop="static" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div  class="modal-content">
                        <div style="background-color: #f7f7f7" class="modal-body">
                            <div style="background-color: #f7f7f7"  class="card">
                                <div id="msgsuccess2" style="margin: 0 auto;" class="card-body">



                                </div>
                                <div style="background-color: #f7f7f7" class="modal-footer">
                                    <button id="actualise2" type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                                </div>
                            </div>
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


            <div class="modal fade" id="confirm_qr2" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
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
                            <div style="text-align: center" id="content_qr2">

                            </div>
                            <div class="form-group">
                                <label for="cc-number" class="control-label mb-1">Entrer votre mot de passe pour confirmer</label>
                                <input id="password_qr2" name="password" type="password" class="form-control cc-number identified visa" value="" data-val="true"
                                       data-val-required=""
                                       autocomplete="cc-number">
                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">annuler</button>
                            <button id="envoyer_qr2" type="button" class="btn btn-primary">Confirmer</button>
                        </div>
                    </div>
                </div>
            </div>


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


            <div class="modal fade" id="loader2" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" data-backdrop="static" aria-hidden="true">
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


        </div>
        <!-- END PAGE CONTAINER-->

    </div>
<?php require 'pages/footer.php';?>

<script type="text/javascript">

    function remplirsucess(data){
        html ='<img src="images/tre.gif"/><p style="text-align: center">'+data+'</p>';
        return $('#msgsuccess').html(html);
    }

    function remplirsucess2(data){
        html ='<img src="images/tre.gif"/><p style="text-align: center">'+data+'</p>';
        return $('#msgsuccess2').html(html);
    }



    moda=$("#confirm_qr");
    var montant="<?php echo getMontantUser(getUserLogin())->montant_commission ?>";

    var montant2="<?php echo getMontantUser(getUserLogin())->montant_commerce ?>";

    $("#id2").click(function () {
        $("#content_qr").html("Virement de "+montant+" FCFA dans votre compte principal");
        $("#confirm_qr").modal("show");
    });


    $("#id1").click(function () {
        $("#content_qr2").html("Virement de "+montant2+" FCFA dans votre compte principal");
        $("#confirm_qr2").modal("show");
    });

    $("#envoyer_qr").click(function () {
        $("#confirm_qr").modal("hide");
        $.ajax({
            url:"pages/control/virer_fond_commission.php",
            type:'POST',
            async:true,
            data:"montant="+encodeURIComponent(montant)+"&passe="+encodeURIComponent($("#password_qr").val()),
            beforeSend: function() {
                $("#confirm_qr").modal('hide');
                $("#loader").modal('show');
            },

            success: function (data)
            {
                data = JSON.parse(data);
                setTimeout(function () {
                    if(data.hasOwnProperty("msg"))
                    {
                        $("#loader").modal('hide');
                        ms='<div id="msg" class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+data.msg+'</div>';
                        $('.erro').html(ms);
                    }
                    else
                    {
                        $("#loader").modal('hide');
                        remplirsucess(data);
                        $("#miss").html("0 FCFA");
                        $('#succes').modal('show');
                    }
                },5000);

            }




        });

    });

    $("#envoyer_qr2").click(function () {
        $("#confirm_qr2").modal("hide");
        $.ajax({
            url:"pages/control/virer_fond_commerce.php",
            type:'POST',
            async:true,
            data:"montant="+encodeURIComponent(montant2)+"&passe="+encodeURIComponent($("#password_qr2").val()),
            beforeSend: function() {
                $("#confirm_qr2").modal('hide');
                $("#loader2").modal('show');
            },

            success: function (data)
            {
                data = JSON.parse(data);
                setTimeout(function () {
                    if(data.hasOwnProperty("msg"))
                    {
                        $("#loader2").modal('hide');
                        ms='<div id="msg" class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+data.msg+'</div>';
                        $('.erro').html(ms);
                    }
                    else
                    {
                        $("#loader2").modal('hide');
                        remplirsucess2(data);
                        $("#miss2").html("0 FCFA");
                        $('#succes2').modal('show');
                    }
                },5000);

            }




        });

    });

    $('#actualise').click(function () {
        window.location.href='balance';
    });


    $('#actualise2').click(function () {
        window.location.href='balance';
    });
</script>
