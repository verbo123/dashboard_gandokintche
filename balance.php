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
                                    </div>
                                    <div class="card-body">
                                        <div class="table-data__tool">
                                            <div class="table-data__tool-left">
                                                Solde personnel <span data-toggle="tooltip" data-placement="right" title="Il s'agit du solde de vos dépôts ou reception de fond issu d'un proche"><img style="width:15px;margin-left: 20px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAANGSURBVEhLrVdLT1NBFG7UjW58bkyMJnBbiW40caMbFiZGjUZjTFypAYkb3yZufIfElb/BHyAuTAjee7FAQQIaIFHmXh4tKIZHRSAoraRgi8dzhinc0nOHFv2SL9x2vjkfM/fMmdNAMQjV9u8Ivek+YdiiwrDEI0l8pu/Kwr3blez/YGdt16agKW4YltMStJwMEnyYQV2EtLtetm9U04tHeSSyAYNcNUwRZ0y0pDkhy6miGCpcYdhnu9twhQ1c0KJoOm9314mtKqwehumU4koH2EAMDzX0wtOeMbjcMcSOY6wYxVThedBKizEts12IJlJAWPgDcLI1xuooZkm4a7OyyQW9D8zSRnaiD8nIiwsfPrM6Iq46HKipWa/slkGJxE3Q8UC4Bybn09K0dTIJe21elyWaX1F2i6Ajs5bsJR5u7JMrpW3nxr3EhB0lL2WLCWU5tzjhajzS1AcXO77Iv9w4S1tcV7a4zZbTnCfQ8GhLFOrHZ2RCEWi7V9vmJZqiSZpSGcQvdBUph7c/DUMyvbDoqPDjd4bV+jBDpydAdZYZZPnAHQVaZOf0L2ibSi66ImxcPaf3o2E7p7BgiEpucCXLI/3wamQazrQNyM8N3xPKFuC+M5qn1zFkibv0fh+uHFiN++tdmM0sbzf9U5zOl6ZTvSbjS1ges4gmU6xGSzIudKu9fDE0qWxBPnMaHQ3TvRMotd3j3KCOseScsgWo6PS5HDSUyUWdA34o+DjR+8wihe+Z3jen8yOWzbQ8TgQ81BFOxPGxO6ZsAZonEqxGy2wBIQQtcZMVMayL/1S2AM+j46xGx5DlXlO2S5fEGCdcyeHZeWULUKneL21/dW88T8twJK8fox6JEebwIF6DXtzrHgHr2wwk0hmo6vrKzvGSTpCy8wAvabqsuQlZHnuXe/ETJubScK59kNXn0BQ22wgQqD1BgW/rQyv2VqwWTC66jzmtl3jtRn1bnyyCdaIEzWNcAOLZtkF41heH8+8LWCUSd7GfYqrwelBLSq0pF6go4vbuef1xiwpbGGTzh8lA7QobVEdTDMtEegLrVLjiQelP7QoGa8KgvhWOKpLUoPaffsJwoPKKBqepyNMNQ6Rnqr1LZbAgBAJ/AWa4rWoZQLfIAAAAAElFTkSuQmCC"></span>
                                            </div>
                                            <div class="table-data__tool-right">
                                                <?php echo getMontantUser(getUserLogin())->total ?> FCFA
                                            </div>
                                        </div>

                                        <div class="table-data__tool">
                                            <div class="table-data__tool-left" >
                                                Solde issu du commerce <span data-toggle="tooltip" data-placement="right" title="Il s'agit du solde issu des ventes provenant de votre site e-commerce"><img style="width:15px;margin-left: 20px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAANGSURBVEhLrVdLT1NBFG7UjW58bkyMJnBbiW40caMbFiZGjUZjTFypAYkb3yZufIfElb/BHyAuTAjee7FAQQIaIFHmXh4tKIZHRSAoraRgi8dzhinc0nOHFv2SL9x2vjkfM/fMmdNAMQjV9u8Ivek+YdiiwrDEI0l8pu/Kwr3blez/YGdt16agKW4YltMStJwMEnyYQV2EtLtetm9U04tHeSSyAYNcNUwRZ0y0pDkhy6miGCpcYdhnu9twhQ1c0KJoOm9314mtKqwehumU4koH2EAMDzX0wtOeMbjcMcSOY6wYxVThedBKizEts12IJlJAWPgDcLI1xuooZkm4a7OyyQW9D8zSRnaiD8nIiwsfPrM6Iq46HKipWa/slkGJxE3Q8UC4Bybn09K0dTIJe21elyWaX1F2i6Ajs5bsJR5u7JMrpW3nxr3EhB0lL2WLCWU5tzjhajzS1AcXO77Iv9w4S1tcV7a4zZbTnCfQ8GhLFOrHZ2RCEWi7V9vmJZqiSZpSGcQvdBUph7c/DUMyvbDoqPDjd4bV+jBDpydAdZYZZPnAHQVaZOf0L2ibSi66ImxcPaf3o2E7p7BgiEpucCXLI/3wamQazrQNyM8N3xPKFuC+M5qn1zFkibv0fh+uHFiN++tdmM0sbzf9U5zOl6ZTvSbjS1ges4gmU6xGSzIudKu9fDE0qWxBPnMaHQ3TvRMotd3j3KCOseScsgWo6PS5HDSUyUWdA34o+DjR+8wihe+Z3jen8yOWzbQ8TgQ81BFOxPGxO6ZsAZonEqxGy2wBIQQtcZMVMayL/1S2AM+j46xGx5DlXlO2S5fEGCdcyeHZeWULUKneL21/dW88T8twJK8fox6JEebwIF6DXtzrHgHr2wwk0hmo6vrKzvGSTpCy8wAvabqsuQlZHnuXe/ETJubScK59kNXn0BQ22wgQqD1BgW/rQyv2VqwWTC66jzmtl3jtRn1bnyyCdaIEzWNcAOLZtkF41heH8+8LWCUSd7GfYqrwelBLSq0pF6go4vbuef1xiwpbGGTzh8lA7QobVEdTDMtEegLrVLjiQelP7QoGa8KgvhWOKpLUoPaffsJwoPKKBqepyNMNQ6Rnqr1LZbAgBAJ/AWa4rWoZQLfIAAAAAElFTkSuQmCC"> </span>
                                            </div>
                                            <div class="table-data__tool-right">
                                                <?php echo getMontantUser(getUserLogin())->montant_commerce ?> FCFA
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="table-data__tool">
                                            <div class="table-data__tool-left">
                                                Solde Total
                                            </div>
                                            <div class="table-data__tool-right">
                                                <span class="status--process">  <?php echo getMontantUser(getUserLogin())->total + getMontantUser(getUserLogin())->montant_commerce ?> FCFA </span>

                                            </div>
                                        </div>


                                    </div>


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
                            <h5 class="modal-title" id="mediumModalLabel">Nouveau paiement</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-body">

                                    <form action="" method="post" novalidate="novalidate">
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Montant</label>
                                            <input id="cc-pament" name="cc-payment" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="00 FCFA">
                                        </div>
                                        <div class="form-group has-success">
                                            <label for="cc-name" class="control-label mb-1">Login du destinatire</label>
                                            <input id="cc-name" name="cc-name" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                                                   autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                            <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="cc-number" class="control-label mb-1">Votre code de sécurité</label>
                                            <input id="cc-number" name="cc-number" type="tel" class="form-control cc-number identified visa" value="" data-val="true"
                                                   data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                                                   autocomplete="cc-number">
                                            <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                        </div>
                                        <div>
                                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                <span id="payment-button-amount">Tranférer</span>
                                                <span id="payment-button-sending" style="display:none;">Sending…</span>
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


        </div>
        <!-- END PAGE CONTAINER-->

    </div>
<?php require 'pages/footer.php';?>