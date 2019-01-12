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
                                        <strong class="card-title" v-if="headerText"> <?php echo ma_tra("Achats en ligne") ?></strong>
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
                                            <th> <?php echo ma_tra("Référence")?></th>
                                            <th> <?php echo ma_tra("Site marchand")?></th>
                                            <th> <?php echo ma_tra("Date")?></th>
                                            <th> <?php echo ma_tra("Frais")?></th>
                                            <th> <?php echo ma_tra("Taxe")?></th>
                                            <th> <?php echo ma_tra("Montant")?></th>
                                            <th> <?php echo ma_tra("Actions")?></th>
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
                                                        <a style="margin: 0 auto;" href="shop_detail?product=<?php echo $facture->ref; ?>&token_ID=<?php echo sha1($facture->ref); ?>" class="item" data-toggle="tooltip" data-placement="top" title=" <?php echo ma_tra("Détails")?>">
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

                                                <?php echo ma_tra("Aucun achat en ligne !")?>

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


            <?php
            require 'pages/htmfooter.php';
            ?>
        </div>

    </div>

<style>

    @media (max-width: 400px) {
        div.dataTables_wrapper div.dataTables_filter input{
            display: block;
        }
    }


    div.dataTables_wrapper div.dataTables_info{
        white-space:normal;
    }
</style>


<?php
require 'pages/footer.php';
?>
<script type="text/javascript">
    if(screen.width <= 500 ){
        $('.example').addClass(' table-responsive');
        $(".au-btn--small").css("width","100%");
    }else {
        $('.example').removeClass(' table-responsive');
        $(".au-btn--small").removeStyle("width","100%");
    }
</script>

