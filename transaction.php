<?php
$active = "transaction";
require 'pages/header.php';
?>
<?php require 'pages/menu.php' ?>

<?php
include 'pages/control/trans.php';
//var_dump(getTransaction());
?>

<div class="row">
    <div class="col-md-12">
        <!-- DATA TABLE -->

        <?php
        if (count(getTransaction()) > 0)
        {
        ?>
        <div class="card">
            <div class="card-header">
                <i class="mr-2 fa fa-align-justify"></i>
                <strong class="card-title" v-if="headerText">Transations</strong>
            </div>
<!--            <h3 class="title-5 m-b-35">Transations</h3>-->
<!--            <div class="table-data__tool">-->
<!--                <div class="table-data__tool-left">-->
<!---->
<!--                </div>-->
<!--                <div style="margin-right: 10px" class="table-data__tool-right">-->
<!--                    <a href="" style="margin-top: 10px"  class="btn btn-info au-btn--small">-->
<!--                        Exporter-->
<!--                    </a>-->
<!--                </div>-->
<!---->
<!--             </div>-->

            <div style="padding-left: 18px; padding-right: 18px;padding-bottom: 18px;margin-top: 10px" >
                <table id="example" class=" example table table-striped table-bordered"">
                <thead>
                <tr>
                    <th>N° Transaction</th>
                    <th>date</th>
                    <th>description</th>
                    <th>montant</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <!--                <tr class="spacer"></tr>-->

                <?php
                foreach (getTransaction() as $tran)
                {

                    ?>
                    <tr>
                        <td>
                            <span class="block-email"><?php echo $tran->no_trans; ?></span>
                        </td>
                        <td><?php echo date_conversion($tran->date); ?></td>
                        <td>
                            <?php

                            if(substr($tran->no_trans,0,2) == "TR")
                            {
                                echo ' <span style="color:#fbad16;" class="">Achat en ligne</span>';
                            }else{
                                if($tran->code_user_sender == getUserLogin()){
                                    echo ' <span class="status--denied">Virement de fond</span>';
                                }else{
                                    echo '<span class="status--process">Reception de fond</span>';
                                }
                            }

                            ?>

                        </td>
                        <td><?php echo $tran->montant; ?> FCFA</td>
                        <td>
                            <div class="table-data-feature">
                                <a target="_blank" href="transaction_pdf?trans=<?php echo $tran->no_trans ?>" style="margin-right:25%" class="item" data-toggle="tooltip" data-placement="top" title="Exporter">
                                    <i class="zmdi zmdi-collection-pdf"></i>
                                </a>
                                <a href="detail_transaction?trans=<?php echo $tran->no_trans ?>" style="" class="item" data-toggle="tooltip" data-placement="top" title="Détails">
                                    <i class="zmdi zmdi-more"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <!--                            <tr class="spacer"></tr>-->

                    <?php
                }
                ?>

                </tbody>
                </table>
            </div>

        </div>
        <!-- END DATA TABLE -->
            <?php

        }else{

            ?>

            <div id="sav" class="card">
                <div class="card-header">
                    <i class="mr-2 fa fa-align-justify"></i>
                    <strong class="card-title" v-if="headerText">Transactions</strong><br>
                </div>
                <div style="text-align: -webkit-center; text-align: -moz-center" class="card-body card-block">
                    <p class=" center-block ">
                    <h3 class="">Vous n'avez aucune transaction !</h3>
                    </p>
                </div>
            </div>

            <?php

        }
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
require 'pages/htmfooter.php';
require 'pages/footer.php';
?>

<script type="text/javascript">
    if(screen.width <= 500 ){
        $('#example').addClass(' table-responsive');
    }else {
        $('#example').removeClass(' table-responsive');
    }
</script>
