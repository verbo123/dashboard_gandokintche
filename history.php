<?php session_start(); ?>
<?php
$active = "recharge";
$devop= "Mes commissions";
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
                                    <strong class="card-title">Mes commissions</strong>
                                </div>
                                <div style="padding-top: 0px" class="card-body">

                                    <div style="margin-top: 8px" class="erro">

                                    </div>

                                    <?php
                                  //  include 'pages/control/virement.php';

                                    if(count(getCommissionData()) > 0)
                                    {

                                        ?>
                                        <div class="table-data__tool">
<!--                                            <div class="table-data__tool-left">-->
<!--                                                  Commissions Totales act : <span style="padding: 8px" class="badge badge-pill badge-success">--><?php //echo getMontantUser(getUserLogin())->montant_commission; ?><!-- CFA</span>-->
<!--                                                    <span data-toggle="tooltip" data-placement="right" title="Il s'agit des commissions reçue après recharge d'un compte ">-->
<!--                                                        <img style="width:15px;margin-left: 8px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAANGSURBVEhLrVdLT1NBFG7UjW58bkyMJnBbiW40caMbFiZGjUZjTFypAYkb3yZufIfElb/BHyAuTAjee7FAQQIaIFHmXh4tKIZHRSAoraRgi8dzhinc0nOHFv2SL9x2vjkfM/fMmdNAMQjV9u8Ivek+YdiiwrDEI0l8pu/Kwr3blez/YGdt16agKW4YltMStJwMEnyYQV2EtLtetm9U04tHeSSyAYNcNUwRZ0y0pDkhy6miGCpcYdhnu9twhQ1c0KJoOm9314mtKqwehumU4koH2EAMDzX0wtOeMbjcMcSOY6wYxVThedBKizEts12IJlJAWPgDcLI1xuooZkm4a7OyyQW9D8zSRnaiD8nIiwsfPrM6Iq46HKipWa/slkGJxE3Q8UC4Bybn09K0dTIJe21elyWaX1F2i6Ajs5bsJR5u7JMrpW3nxr3EhB0lL2WLCWU5tzjhajzS1AcXO77Iv9w4S1tcV7a4zZbTnCfQ8GhLFOrHZ2RCEWi7V9vmJZqiSZpSGcQvdBUph7c/DUMyvbDoqPDjd4bV+jBDpydAdZYZZPnAHQVaZOf0L2ibSi66ImxcPaf3o2E7p7BgiEpucCXLI/3wamQazrQNyM8N3xPKFuC+M5qn1zFkibv0fh+uHFiN++tdmM0sbzf9U5zOl6ZTvSbjS1ges4gmU6xGSzIudKu9fDE0qWxBPnMaHQ3TvRMotd3j3KCOseScsgWo6PS5HDSUyUWdA34o+DjR+8wihe+Z3jen8yOWzbQ8TgQ81BFOxPGxO6ZsAZonEqxGy2wBIQQtcZMVMayL/1S2AM+j46xGx5DlXlO2S5fEGCdcyeHZeWULUKneL21/dW88T8twJK8fox6JEebwIF6DXtzrHgHr2wwk0hmo6vrKzvGSTpCy8wAvabqsuQlZHnuXe/ETJubScK59kNXn0BQ22wgQqD1BgW/rQyv2VqwWTC66jzmtl3jtRn1bnyyCdaIEzWNcAOLZtkF41heH8+8LWCUSd7GfYqrwelBLSq0pF6go4vbuef1xiwpbGGTzh8lA7QobVEdTDMtEegLrVLjiQelP7QoGa8KgvhWOKpLUoPaffsJwoPKKBqepyNMNQ6Rnqr1LZbAgBAJ/AWa4rWoZQLfIAAAAAElFTkSuQmCC"> </span>-->
<!---->
<!--                                            </div>-->

                                        </div>


                                        <table id="example" class="example table table-striped table-bordered" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Date</th>
                                                <th>Code</th>
                                                <th>Nom & Prénom</th>
                                                <th>Dépôt réel</th>
                                                <th>Commission</th>
                                                <th>Montant rechargé</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php

                                            foreach (getCommissionData() as $vire)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?php echo $vire->id_tans; ?></td>
                                                    <td><?php echo date_conversion($vire->created_at); ?></td>
                                                    <td><?php echo infos_user($vire->codeClient)->op_code ?></td>
                                                    <td><?php echo infos_user($vire->codeClient)->nom.' '.infos_user($vire->codeClient)->prenom ?></td>
                                                    <td><?php echo $vire->depot_reel; ?> FCFA</td>
                                                    <td><?php echo $vire->commission; ?> FCFA</td>
                                                    <td><?php echo $vire->mt_rechargee; ?> FCFA</td>
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
                                           <h3>Aucune commissions pour le moment</h3>
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
    if(screen.width <= 500 ){
        $('#example').addClass(' table-responsive');
    }else {
        $('#example').removeClass(' table-responsive');
    }
</script>
