<?php session_start(); ?>
<?php
$active = "Compte marchand";
$devop= "preleve";
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
                                    <strong class="card-title" v-if="headerText">Prélèvement d'argent</strong>
                                </div>
                                <div class="card-body">
                                    <?php
                                    include 'pages/control/virement.php';

                                    if(isset($_POST["valider"]))
                                    {
                                        if(!empty($_POST["montant"]) && !empty($_POST["login"]) && !empty($_POST["password"]))
                                        {
                                            extract($_POST);
                                            echo virementPonctuel($montant,$login,$password);
                                        }
                                    }
                                    ?>
                                    <?php
                                    if(count(getVirement()) > 0)
                                    {
                                        ?>
                                        <div class="table-data__tool">
                                            <div class="table-data__tool-left">

                                                <div class="rs-select2--light rs-select2--md">
                                                    <select class="js-select2" name="time">
                                                        <option selected="selected">Aujourd'hui</option>
                                                        <option value="">Hier</option>
                                                        <option value="">Autre date</option>
                                                    </select>
                                                    <div class="dropDownSelect2"></div>
                                                </div>

                                            </div>
                                            <div class="table-data__tool-right">
                                                <button data-toggle="modal" data-target="#mediumModal" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                                    Prélèvement
                                                </button>


                                            </div>
                                        </div>

                                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th>Nom & Prénoms</th>
                                                <th>Identifiant</th>
                                                <th>Date</th>
                                                <th>Montant prélevé</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php

                                            foreach (getVirement() as $vire)
                                            {

                                                ?>
                                                <tr>
                                                    <td><?php echo infos_user($vire->code_user_receiver)->nom." ".infos_user($vire->code_user_receiver)->prenom ?></td>
                                                    <td><?php echo infos_user($vire->code_user_receiver)->op_code ?></td>
                                                    <td><?php echo date_conversion($vire->date); ?></td>
                                                    <td><?php echo $vire->montant; ?> FCFA</td>
                                                    <td>
                                                        <div class="table-data-feature">
                                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Supprimer">
                                                                <i class="zmdi zmdi-delete"></i>
                                                            </button>
                                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Détails">
                                                                <i class="zmdi zmdi-more"></i>
                                                            </button>
                                                        </div>
                                                    </td>
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
                                        <div style="text-align: -webkit-center; text-align: -moz-center;">

                                            <button data-toggle="modal" data-target="#mediumModal" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                                Prélèvement de fond
                                            </button>

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

                                <form method="post" novalidate="novalidate" autocomplete="off">

                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Montant</label>
                                        <input id="cc-pament" name="montant" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="00 FCFA">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Login du destinataire</label>
                                                <input id="cc-name" name="login[]" type="text" class="form-control cc-name valid" data-val="true"
                                                       autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="cc-name" class="control-label mb-1"> &nbsp;&nbsp;&nbsp;&nbsp; </label>
                                                <button id="ajout" type="button" class="btn btn-primary"> <i class="zmdi zmdi-plus"></i> Ajouter</button>
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                        </div>

                                    </div>

                                    <div id="champ"></div>

                                    <div class="form-group">
                                        <label for="cc-number" class="control-label mb-1">Entrer votre mot de passe</label>
                                        <input id="cc-number" name="password" type="password" class="form-control cc-number identified visa" value="" data-val="true"
                                               data-val-required="Please enter the card number"
                                               autocomplete="cc-number">
                                        <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                    </div>
                                    <div>
                                        <button id="payment-button" type="submit" name="valider" class="btn btn-lg btn-info btn-block">
                                            <i class="fa fa-lock fa-lg"></i>&nbsp;
                                            <span id="payment-button-amount">Tranférer</span>
                                            <span id="payment-button-sending" style="display:none;">Tranfère…</span>
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

        <?php
        require 'pages/htmfooter.php';
        ?>
    </div>
    <!-- END PAGE CONTAINER-->

</div>
<?php
require 'pages/footer.php';
?>

<script type="text/javascript">

    $("#payment-button-amount").click(function () {
        $("#payment-button-amount").css("display","none");
        $("#payment-button-sending").css("display","block");
    });

    function remove(ide)
    {
        $('#sup'+ide).remove();
    }

    var dataContenaire = $("#champ");
    var i = 0;
    var html = '';
    $("#ajout").click(function () {
        i++;
        console.log(i);
        html = '<div class="row" id="sup' + i + '"  ><div  class="col-md-8"><div class="form-group has-success"> <label for="cc-name" class="control-label mb-1">Login du destinataire</label><input  name="login[]" type="text" class="form-control cc-name valid" data-val="true" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error"><span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span></div></div><div class="col-md-3"><div id="' + i + '"  class="form-group"><label for="cc-name" class="control-label mb-1"> &nbsp;&nbsp;&nbsp;&nbsp; </label><button onclick="remove('+ i +')"  type="button" class="btn btn-danger"> <i class="zmdi zmdi-minus"></i> Enlever</button><span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span></div></div></div>';
        dataContenaire.append(html);
    });


</script>
