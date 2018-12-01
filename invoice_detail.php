
<?php
$active = "Compte marchand";
$devop="facture";
include 'pages/header.php';
?>
<div class="page-wrapper">
    <!-- HEADER MOBILE-->


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
                                    <strong class="card-title" v-if="headerText">Facturation</strong>
                                </div>
                                <?php
                                require 'pages/control/invoice_function.php';
                                ?>
                                <div class="table-data__tool" style="margin-bottom: 0px;">
                                    <div class="table-data__tool-left">
                                        <div class="filters m-b-45">
                                             <div style="margin-left: 20px;margin-top: 10px;">
                                                 <strong>Client : <?php echo infos_user(get_facturation_id($_GET["product"])->client_id)->nom." ".infos_user(get_facturation_id($_GET["product"])->client_id)->prenom; ?> </strong><br>
                                                 <small>Email : <?php echo infos_user(get_facturation_id($_GET["product"])->client_id)->adresse; ?></small>
                                             </div>
                                        </div>
                                    </div>

                                    <div style="margin-right: 20px;margin-top: 10px;" class="table-data__tool-right">
                                        <a target="_blank" style="color: white" href="invoice_pdf?pdf=<?php echo $_GET["product"]; ?>&token_ID=<?php echo sha1($_GET["product"]); ?>" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-collection-pdf"></i>Générer la facture
                                        </a>
                                    </div>

                                </div>


                                <div class="card-body">

                                    <table  class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>Libellé</th>
                                            <th>Quantité</th>
                                            <th>Prix Unitaire</th>
                                            <th>Montant</th>
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
                                        <strong class="">Autres Frais : <?php  echo infoVente($_GET["product"])->frais ?> FCFA</strong><br>
                                        <strong class="">Taxe : <?php  echo infoVente($_GET["product"])->tax*100 ?> %</strong><br>
                                        <strong class="text-success">Montant total : <?php  echo (infoVente($_GET["product"])->frais+getMontantTotal($_GET["product"]))*(1+infoVente($_GET["product"])->tax) ?> FCFA</strong>
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

    <style type="text/css">
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



</script>
