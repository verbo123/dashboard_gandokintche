<?php
$active = "Compte marchand";
$devop="facture";
include 'pages/header.php';?>
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
                                    <strong class="card-title" v-if="headerText"><?php echo ma_tra("Facturation")?></strong>
                                </div>

                                <div class="table-data__tool" style="margin-bottom: 0px;">
                                    <div class="table-data__tool-left">
                                        <div class="filters m-b-45">



                                        </div>
                                    </div>

                                    <div style="margin-right: 20px;margin-top: 10px;" class="rs-select2--dark rs-select2--sm rs-select2--dark2">

                                    </div>

                                </div>


                                <div class="card-body">

                                    <?php
                                        require 'pages/control/invoice_function.php';
                                        //var_dump(count(getFacturation()));
                                    ?>
                                    <?php
                                    if(count(getFacturation())>0)
                                    {
                                    ?>
                                        <table class="example table table-responsive-lg table-striped table-bordered" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th><?php echo ma_tra("Référence")?></th>
                                                <th><?php echo ma_tra("Client")?></th>
                                                <th>Date</th>
                                                <th><?php echo ma_tra("Montant")?></th>
                                                <th><?php echo ma_tra("Actions")?></th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php
                                               foreach (getFacturation() as $facture)
                                                    {
                                            ?>
                                            <tr>
                                                <td><?php echo $facture->ref; ?></td>
                                                <td><?php echo infos_user($facture->client_id)->nom." ".infos_user($facture->client_id)->prenom; ?></td>
                                                <td><?php echo date_conversion($facture->date_vente); ?></td>
                                                <td><?php echo (getMontantTotal($facture->ref)+infoVente($facture->ref)->frais)*(1+infoVente($facture->ref)->tax); ?>  FCFA</td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <a href="invoice_detail?product=<?php echo $facture->ref; ?>&token_ID=<?php echo sha1($facture->ref); ?>" class="item" data-toggle="tooltip" data-placement="top" title="<?php echo ma_tra("Détails")?>">
                                                            <i class="zmdi zmdi-more"></i>
                                                        </a>
                                                        <a target="_blank" href="invoice_pdf?pdf=<?php echo $facture->ref; ?>&token_ID=<?php echo sha1($facture->ref); ?>"  class="item" data-toggle="tooltip" data-placement="top" title="<?php echo ma_tra("Facture")?>">
                                                            <i class="zmdi zmdi-collection-pdf"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                                    }
                                                }else{
                                                    ?>

                                                <div style="text-align: -webkit-center;text-align: -moz-center;margin-top: -52px;">

                                                    <h3  class="">
                                                        <?php echo ma_tra("Vous n'avez aucune ligne de commande")?>
                                                    </h3>

                                                </div>

                                            <?php
                                            }
                                            ?>
                                            </tbody>
                                        </table>


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


    function popu(mail,libelle)
    {
        //  var newurl=window.location.protocol+"//"+window.location.host+window.location.pathname+"?email="+mail;
        // window.history.pushState({path:newurl},'',newurl);

        $("#mail").val(mail);
        // $("option:selected").val(libelle);
        $("#modifModal").modal("show");
    }


    $.ajax({
        url:'pages/control/AuthMarchand.php',
        success : function (data) {
            data=JSON.parse(data);
            if(data === false)
            {
                window.location.href="auth_marchand";
            }
        }
    });

</script>
