<?php
$active = "transaction";
require 'pages/header.php';
?>
<?php require 'pages/menu.php' ?>

<?php
include 'pages/control/trans.php';
//var_dump(getTransaction());

$trans=$_GET["trans"];
$data=getTransa($_GET["trans"]);
$receiver=infos_user($data->code_user_receiver);
$sender=infos_user($data->code_user_sender);
?>
<style>
    .table-data__tool{
        margin-top: 0;
    }
</style>

<div class="row">
    <div class="col-md-12">
        <!-- DATA TABLE -->
            <div class="card">
                <div class="card-header">
                    <i class="mr-2 fa fa-align-justify"></i>
                    <strong class="card-title" v-if="headerText"><?php echo ma_tra("Détail")?> transation  N° <?php echo $_GET["trans"]; ?> </strong>
                </div>

                <div class="card-body">
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">

                        </div>
                        <div style="margin-right: 15px;margin-left: 10px" class="table-data__tool-right">
                            <a target="_blank" href="transaction_pdf?trans=<?php echo $_GET["trans"]; ?>" style="margin-top: 10px"  class="btn btn-info au-btn--small">
                                <?php echo ma_tra("Exporter")?>
                            </a>
                        </div>

                    </div>

                    <div style="padding-left: 18px; padding-right: 18px;padding-bottom: 18px" >
                        <strong><?php echo ma_tra("Envoyeur")?></strong>
                        <table id="example" class=" table table-striped table-bordered"">
                        <thead>
                        <tr>
                            <th><?php echo ma_tra("Nom et Prénom(s)")?></th>
                            <th>Email</th>
                            <th><?php echo ma_tra("Téléphone")?></th>
                            <th><?php echo ma_tra("Photo")?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <?php echo $sender->nom.' '.$sender->prenom ?>
                            </td>

                            <td>
                                <?php echo $sender->adresse ?>
                            </td>

                            <td>
                                <?php echo $sender->tel ?>
                            </td>

                            <td>
                                <img style="width: 60px;height: 60px; margin-left: 25%" class=" img-thumbnail img-responsive" src="<?php if($sender->photo != null){echo getUrl().$sender->photo;}else{echo 'images/icon/avatar.png';} ?>" alt="Photo">
                            </td>

                        </tr>
                        </tbody>
                        </table>
                    </div>


                    <div style="padding-left: 18px; padding-right: 18px;padding-bottom: 18px" >
                        <strong><?php echo ma_tra("Reçeveur")?></strong>
                        <table id="example2" class=" table table-striped table-bordered"">
                        <thead>
                        <tr>
                            <th><?php echo ma_tra("Nom et Prénom(s)")?></th>
                            <th>Email</th>
                            <th><?php echo ma_tra("Téléphone")?></th>
                            <th><?php echo ma_tra("Photo")?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <?php echo $receiver->nom.' '.$receiver->prenom ?>
                            </td>

                            <td>
                                <?php echo $receiver->adresse ?>
                            </td>

                            <td>
                                <?php echo $receiver->tel ?>
                            </td>

                            <td>
                                <img style="width: 60px;height: 60px; margin-left: 25%" class=" img-thumbnail img-responsive" src="<?php if($receiver->photo != null){echo getUrl().$receiver->photo;}else{echo 'images/icon/avatar.png';}  ?>" alt="Photo">
                            </td>

                        </tr>
                        </tbody>
                        </table>
                    </div>


                    <div class="text-right" style="padding-left: 18px; padding-right: 18px;padding-bottom: 18px" >
                        <p><?php echo ma_tra("Montant")?> : <strong><?php echo $data->montant; ?> CFA</strong></p>
                        <p><?php echo ma_tra("Date de l'opération")?>  : <strong><?php echo date_conversion($data->date); ?> </strong></p>
                    </div>
                </div>


            </div>
            <!-- END DATA TABLE -->
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
        $(".btn-info").css("width","100%");
    }else {
        $('#example').removeClass(' table-responsive');
        $(".btn-info").removeStyle("width","100%");
    }

    if(screen.width <= 500 ){
        $('#example2').addClass(' table-responsive');
    }else {
        $('#example2').removeClass(' table-responsive');
    }
</script>
