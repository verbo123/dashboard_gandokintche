
<?php
$active = "Compte marchand";
$devop="facture";
include 'pages/header.php';
?>
<div class="page-wrapper">
    <!-- HEADER MOBILE-->
    <style>
        .table-data__tool{
            margin-top: 0;
        }
    </style>

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
                                    <strong class="card-title"><?php echo ma_tra("Facturation")?></strong>
                                </div>
                                <?php
                                require 'pages/control/invoice_function.php';
                                ?>
                                <div class="table-data__tool" style="margin-bottom: 0px;">
                                    <div class="table-data__tool-left">
                                        <div style="margin-bottom: 0" class="filters m-b-45">
                                             <div style="margin-left: 20px;margin-top: 10px;">
                                                 <strong><?php echo ma_tra("Client")?> : <?php echo infos_user(get_facturation_id($_GET["product"])->client_id)->nom." ".infos_user(get_facturation_id($_GET["product"])->client_id)->prenom; ?> </strong><br>
                                                 <small>Email : <?php echo infos_user(get_facturation_id($_GET["product"])->client_id)->adresse; ?></small>
                                             </div>
                                        </div>
                                    </div>

                                    <div style="margin-right: 20px;margin-top: 10px;margin-left: 20px" class="table-data__tool-right">
                                        <a target="_blank" style="color: white" href="invoice_pdf?pdf=<?php echo $_GET["product"]; ?>&token_ID=<?php echo sha1($_GET["product"]); ?>" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-collection-pdf"></i><?php echo ma_tra("Générer la facture")?>
                                        </a>
                                    </div>

                                </div>


                                <div class="card-body">

                                    <table  class="example table table-striped table-bordered" style="width:100%">
                                        <thead>
                                         <tr>
                                            <th>   <?php echo ma_tra("Libellé")?></th>
                                            <th>   <?php echo ma_tra("Quantité")?></th>
                                            <th>   <?php echo ma_tra("Prix Unitaire")?></th>
                                            <th>   <?php echo ma_tra("Montant")?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            foreach (getProduits($_GET["product"]) as $produit)
                                            {
                                        ?>
                                         <tr>
                                             <td><?php echo $produit->libelle ?></td>
                                             <td><?php echo $produit->quantity ?></td>
                                             <td><?php echo $produit->prix ?> FCFA</td>
                                             <td><p class="pull-right"><?php echo $produit->prix*$produit->quantity ?> FCFA</p></td>
                                         </tr>

                                        <?php

                                            }
                                        ?>

                                        </tbody>
                                    </table>
                                    <div class=" pull-right">
                                        <strong class=""><?php echo ma_tra("Autres Frais")?> : <?php  echo infoVente($_GET["product"])->frais ?> FCFA</strong><br>
                                        <strong class=""><?php echo ma_tra("Taxe")?> : <?php  echo infoVente($_GET["product"])->tax*100 ?> %</strong><br>
                                        <strong class="text-success"><?php echo ma_tra("Montant total")?> : <?php  echo (infoVente($_GET["product"])->frais+getMontantTotal($_GET["product"]))*(1+infoVente($_GET["product"])->tax) ?> FCFA</strong>
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

    <style type="text/css">
        @media (max-width: 400px) {
            div.dataTables_wrapper div.dataTables_filter input{
                display: block;
            }
        }


        div.dataTables_wrapper div.dataTables_info{
            white-space:normal;
        }
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
    if(screen.width <= 500 ){
        $('.example').addClass(' table-responsive');
        $(".au-btn--small").css("width","100%");
    }else {
        $('.example').removeClass(' table-responsive');
        $(".au-btn--small").removeStyle("width","100%");
    }
</script>
