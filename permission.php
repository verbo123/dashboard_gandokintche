<?php
$active = "Autorisation";
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
                                    <strong class="card-title" v-if="headerText"><?php echo ma_tra("Mes autorisations")?></strong>

<!--                                    <a href="#" class="pull-right">--><?php //echo ma_tra("Accedez à la doumentation")?><!-- <span><i class="fa fa-arrow-right"></i> </span></a>-->
                                </div>

                                <div class="table-data__tool" style="margin-bottom: 0px;">
                                    <div class="table-data__tool-left">
                                        <div class="filters m-b-45">
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        </div>
                                    </div>

                                    <div class="table-data__tool-right">
                                        <button data-toggle="modal" data-target="#staticModal" style="margin: 10px" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>
                                            <?php echo ma_tra("Créer un utilisateur")?>
                                        </button>

                                    </div>
                                </div>


                                <div class="card-body">
                                    <?php
                                    require 'pages/control/register_marchand.php';

                                    if(isset($_POST["valider"]))
                                    {
                                        if(!empty($_POST["mail"]) &&
                                            !empty($_POST["groupe"]))
                                        {
                                            extract($_POST);
//                                                    $id_marchand=get_data_in_table("compte_marhand","user_created",getUserLogin());
//                                                    $id_marchand=get_data_in_table(getUserLogin())->code_marchand;
//                                                     var_dump(verify_user_membre($mail));
                                            invite_membre($mail,$groupe);
                                        }
                                    }

                                    if(isset($_POST["modifier"]))
                                    {

                                        if(!empty($_POST["mail2"]) &&
                                            !empty($_POST["groupe2"]))
                                        {
                                            extract($_POST);

                                            modif_membre($mail2,$groupe2);
                                        }
                                    }
                                    ?>
                                    <table class="table table-responsive-lg">
                                        <thead>
                                        <tr>
                                            <td><?php echo ma_tra("Nom & Prénoms")?></td>
                                            <td><?php echo ma_tra("Role")?></td>
                                            <td><?php echo ma_tra("Description")?></td>
                                            <td></td>
                                        </tr>
                                        </thead>
                                        <tbody>


                                            <tr>
                                                <td>
                                                    <div class="table-data__info">
                                                        <h6><?php echo infos_user(getUserLogin())->nom." ".infos_user(getUserLogin())->prenom ?></h6>
                                                        <span>
                                                                <a href="#"><?php echo infos_user(getUserLogin())->adresse ?></a>
                                                            </span>
                                                    </div>
                                                </td>

                                                <td>
                                                    <span class="role admin"><?php echo ma_tra("Administrateur")?></span>
                                                </td>

                                                <td>
                                                    <?php echo ma_tra("Accès complet du système, les autorisations et la facturation")?>
                                                </td>


                                                <td>
                                                </td>
                                            </tr>
                                        <?php
                                        if(count(getUser_Auto())> 0)
                                        {

                                        foreach (getUser_Auto() as $user)
                                        {
                                            if($user->code_user_invite != null)
                                            {
                                                ?>

                                        
                                                <tr>

                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6><?php echo infos_user($user->code_user_invite)->nom." ".infos_user($user->code_user_invite)->prenom ?></h6>
                                                            <span>
                                                                <a href="#"><?php echo infos_user($user->code_user_invite)->adresse; ?></a>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <?php if($user->groupe == 2)
                                                        {
                                                            echo '<span class="role member">';
                                                            echo getGroupe($user->groupe)->libelle;
                                                            echo '</span>';
                                                        }else
                                                        {
                                                            echo '<span class="role user">';
                                                            echo getGroupe($user->groupe)->libelle;
                                                            echo '</span>';
                                                        }
                                                        ?>

                                                    </td>
                                                    <td>
                                                        <?php if($user->groupe == 2)
                                                        {
                                                            echo getGroupe($user->groupe)->description;

                                                        }else
                                                        {
                                                            echo getGroupe($user->groupe)->description;

                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <div class="table-data-feature">
                                                            <button onclick="popu('<?php echo infos_user($user->code_user_invite)->adresse; ?>','<?php echo getGroupe($user->groupe)->libelle; ?>')"  class="item modif"  data-placement="top" title="<?php echo ma_tra("Modifier")?>">
                                                                <i class="zmdi zmdi-edit"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <?php
                                            }

                                        }
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


        <div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
             data-backdrop="static">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticModalLabel"><?php echo ma_tra("Invité un membre")?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form data-parsley-validate method="post" novalidate="novalidate" autocomplete="off">

                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1"><?php echo ma_tra("Email de la personne")?></label>
                                <input data-parsley-trigger="keypress"  required="required" id="cc-pament" value="" name="mail" type="email" class="form-control" aria-required="true" aria-invalid="false">
                            </div>


                            <div class="form-group">
                                <label for="selectSm" class=" form-control-label"><?php echo ma_tra("Groupe")?></label>
                                <select required="required" name="groupe" class=" form-control">
                                    <option value=""> </option>
                                    <?php
                                    foreach (getAllGroupe() as $gp)
                                    {

                                        ?>
                                        <option value="<?php echo $gp->id; ?>"><?php echo $gp->libelle;  ?></option>

                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo ma_tra("Annuler")?></button>
                                <button type="submit" name="valider" class="btn btn-primary"><?php echo ma_tra("Enregistrer")?></button>
                            </div>

                        </form>
                    </div>

                </div>

            </div>

        </div>

        <div class="modal fade" id="modifModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticModalLabel"><?php echo ma_tra("Modification")?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form data-parsley-validate method="post" novalidate="novalidate" autocomplete="off">

                            <div id="for1" class="form-group">
                                <label for="cc-payment" class="control-label mb-1"><?php echo ma_tra("Email de la personne")?></label>
                                <input id="mail" data-parsley-trigger="keypress"  required="required"  name="mail2" type="email" class="form-control" >
                            </div>


                            <div id="for2" class="form-group">
                                <label for="selectSm" class=" form-control-label"><?php echo ma_tra("Groupe")?></label>
                                <select id="groupe" required="required" name="groupe2" class="form-control">
                                    <option value="">  </option>
                                    <?php
                                    foreach (getAllGroupe() as $gp)
                                    {
                                        ?>
                                        <option  value="<?php echo $gp->id; ?>"><?php echo $gp->libelle;  ?></option>

                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo ma_tra("Annuler")?></button>
                                <button type="submit" name="modifier" class="btn btn-primary"><?php echo ma_tra("Modifier")?></button>
                            </div>

                        </form>
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




</script>
