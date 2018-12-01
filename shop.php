<?php
$active = "achat";
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
                                        <strong class="card-title" v-if="headerText">Achats en ligne</strong>
                                    </div>
                                    <div class="card-body">
                                        <?php
                                        require 'pages/control/invoice_function.php';
                                        ?>
                                        <?php
                                            if(count(getMyfacturaction())>0)
                                            {
                                                
                                        ?>
                                        <table  class="example table table-striped table-bordered" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>Référence</th>
                                            <th>Site marchand</th>
                                            <th>Date</th>
                                            <th>Frais</th>
                                            <th>Taxe</th>
                                            <th>Montant</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                      <?php
                                        foreach (getMyfacturaction() as $facture) {
                                      ?>
                                         <tr>
                                             <td><?php echo $facture->ref ?></td>
                                              <td><?php echo infoVente($facture->ref)->urlSuccess;  ?></td>
                                             <td><?php echo date_conversion($facture->date_vente); ?></td>
                                             <td><p class="pull-right"><?php echo infoVente($facture->ref)->frais ?> FCFA</p></td>
                                             <td><p class="pull-right"><?php echo infoVente($facture->ref)->tax*100 ?>%</p></td>
                                             <td><p class="pull-right"><?php echo (infoVente($facture->ref)->frais+getMontantTotal($facture->ref))*(1+infoVente($facture->ref)->tax) ?> FCFA</p></td>
                                             <td>
                                                    <div class="table-data-feature">
                                                        <a style="margin: 0 auto;" href="shop_detail?product=<?php echo $facture->ref; ?>&token_ID=<?php echo sha1($facture->ref); ?>" class="item" data-toggle="tooltip" data-placement="top" title="Détails">
                                                            <i class="zmdi zmdi-more"></i>
                                                        </a>
                                                       
                                                    </div>
                                                </td>
                                         </tr>

                                         <?php  } ?>

                                       

                                        </tbody>
                                    </table>
                                   
                                        <?php
                
                                            }

                                            else{


                                        ?>


                                                <h3>

                                                Aucun achat en ligne !

                                                </h3>

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