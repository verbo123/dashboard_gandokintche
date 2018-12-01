<?php
if (!empty($_GET))
{
    // Récupére l'identifiant du document.
    $sFilename = $_GET["name"];

    // Envoye l'entête d'attachement.
    $header  = "Content-Disposition: attachment; ";
    $header .= "filename=$sFilename\n" ;
    header($header);

    // Envoye l'entête du type MIME (ici, "inconnu").
    header("Content-Type: x/y\n");

    // Envoye le document.
    readfile($sFilename);

}


?>
<?php
$active = "Profil";
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

        <style>
            .kv-avatar .krajee-default.file-preview-frame,.kv-avatar .krajee-default.file-preview-frame:hover {
                margin: 0;
                padding: 0;
                border: none;
                box-shadow: none;
                text-align: center;
            }
            .kv-avatar {
                display: inline-block;
            }
            .kv-avatar .file-input {
                display: table-cell;
                width: 213px;
            }
            .kv-reqd {
                color: red;
                font-family: monospace;
                font-weight: normal;
            }
        </style>
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">

                     <div class="row">
        <div class="col-md-12">
            <!-- DATA TABLE -->
                <div class="card">
                    <div class="card-header">
                        <i class="mr-2 fa fa-align-justify"></i>
                        <strong class="card-title" v-if="headerText">Profil</strong>
                    </div>
                   <!--
                         <h3 class="title-5 m-b-35">Transations</h3>-->
                    <div style="margin-top: 20px" class="container">
                        <?php  include 'pages/control/update_photo.php'; ?>
                    </div>

                   <div class="card-body">

                       <div class="row">
                           <?php
                                include 'pages/control/update_user.php';
                                include 'pages/control/change_passe.php';

                           require 'phpqrcode/qrlib.php';
                           $target_d="upload/images/code";
                           if(!file_exists($target_d)){
                               mkdir($target_d,0777,true);
                           }
                           QRcode::png(infos_user(getUserLogin())->op_code,$target_d.'/'.infos_user(getUserLogin())->adresse.'.png','H',10,10);
                           ?>
                       </div>

                       <div class="row">
                           <div class="col-sm-3 text-center">
                               <form data-parsley-validate class="form form-vertical" method="post" enctype="multipart/form-data">
                               <div class="kv-avatar">
                                   <div class="file-loading">
                                       <input id="avatar-1" name="avatar-1" type="file" required>
                                   </div>

                                   <button name="profil" style="margin-top: 10px" type="submit">
                                       <span class="role user">Modifier la photo</span>
                                   </button>
                               </div>

                               </form>
                           </div>

<!--                           <div class="col-md-3">-->
<!---->
<!--                                               <div style="margin-top: 50%"  class="image img-cir img-207">-->
<!--                                                   <img  src="images/icon/avatar-big-01.jpg"  /><br>-->
<!--                                               </div>-->
<!---->
<!--                           </div>-->

                           <div class="col-md-9">
                               <table style="margin-left: 30px" class="table table-responsive">
                                   <tr>
                                       <td>Nom</td>
                                       <td><?php echo infos_user(getUserLogin())->nom ?></td>
                                   </tr>

                                   <tr>
                                       <td>Prénom(s)</td>
                                       <td><?php echo infos_user(getUserLogin())->prenom ?></td>
                                   </tr>

                                   <tr>
                                       <td>Pays de résidence</td>
                                       <td><?php echo infos_user(getUserLogin())->pays_residence ?></td>
                                   </tr>

                                   <tr>
                                       <td>Sexe</td>
                                       <td><?php echo infos_user(getUserLogin())->sexe ?></td>
                                   </tr>


                                   <tr>
                                       <td>Email</td>
                                       <td><?php echo infos_user(getUserLogin())->adresse ?></td>

                                   </tr>

                                   <tr>
                                       <td>Téléphone</td>
                                       <td><?php echo infos_user(getUserLogin())->tel ?></td>
                                   </tr>

                                   <tr>
                                       <td class="text-danger">Login de réception d'argent</td>
                                       <td>
                                           <a href="#" data-toggle="modal" data-target="#staticModal">
                                               <span class="role user">Cliquer pour consulter</span>
                                           </a>
                                       </td>
                                   </tr>


                                   <tr>
                                       <td>
                                           <button data-toggle="modal" data-target="#scrollmodal"    class="btn btn-success">
                                               <i style="margin-right: 10px" class="zmdi zmdi-edit"></i>
                                               Modifier les informations du profil
                                           </button>
                                       </td>

                                       <td>
                                           <button data-toggle="modal" data-target="#modification"   class="btn btn-warning">
                                               <i style="margin-right: 10px" class="zmdi zmdi-lock"></i>
                                               Modifier mot de passe
                                           </button>
                                       </td>
                                   </tr>



                               </table>
                           </div>
                       </div>

                       <div  class="row">
                           <p style="margin: 0 auto; width: auto;font-size: 15px;font-weight: 900">QrCode du login de reception d'argent</p>
                       </div>
                       <div class="row">
                           <div style="margin: 0 auto; width: auto" class="file-preview">
                               <img  src="<?php echo  $target_d.'/'.infos_user(getUserLogin())->adresse.'.png' ?>">
                           </div>
                       </div>
                       <div class="row">
                       <a target="_blank" id="lien" style="margin: 0 auto; width: auto" href="profil?name=<?php echo  $target_d.'/'.infos_user(getUserLogin())->adresse.'.png' ?>" class="btn btn-primary">Télécharger le QrCode</a>
                       </div>
                   </div>



                </div>
                <!-- END DATA TABLE -->

        </div>
    </div>

            </div>
        </div>
    </div>

        <div class="modal fade" id="modification" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
             data-backdrop="static">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticModalLabel">Modification de mot de passe</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form  data-parsley-validate method="post" autocomplete="off">

                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Ancien mot de passe</label>
                                <input required="required" name="ancien" type="password" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Nouveau mot de passe</label>
                                <input  data-parsley-minlength="8" id="pax" required="required" name="pax1" type="password" class="form-control">
                            </div>


                            <div class="form-group">
                                <label for="cc-number" class="control-label mb-1">Confirmer votre mot de passe</label>
                                <input data-parsley-equalto="#pax" required="required" name="pax2" type="password" class="form-control" >
                            </div>

                            <div class="modal-footer">
                                <button type="submit"  name="modif" class="btn btn-lg btn-info btn-block">
                                    <span id="payment-button-amount">Changer le mot de passe</span>
                                </button>
                            </div>

                        </form>



                    </div>

                </div>

            </div>

        </div>

        <div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
             data-backdrop="static">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticModalLabel">Authentification</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form data-parsley-validate method="post" autocomplete="off">

                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Votre Login</label>
                                <input data-parsley-trigger="keypress"  required="required" id="email" value="" name="mail" type="email" class="form-control" aria-required="true" aria-invalid="false">
                            </div>


                            <div class="form-group">
                                <label for="cc-number" class="control-label mb-1">Entrer votre mot de passe</label>
                                <input required="required" id="passe" name="password" type="password" class="form-control" >
                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                            </div>

                        </form>

                        <div class="modal-footer">
                            <button onclick="regist()"  id="valider" class="btn btn-lg btn-info btn-block">
                                <i class="fa fa-lock fa-lg"></i>&nbsp;
                                <span id="payment-button-amount">Valider</span>
                                <span id="payment-button-sending" style="display:none;">Connexion…</span>
                            </button>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="modal fade" id="scrollmodal" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="scrollmodalLabel">Profil </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form data-parsley-validate enctype="multipart/form-data" class="" method="post">




                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Nom </label>
                                    <input value="<?php echo infos_user(getUserLogin())->nom ?>" required="required"  name="nom" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                </div>

                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Prénom(s) </label>
                                    <input value="<?php echo infos_user(getUserLogin())->prenom ?>" required="required"  name="prenom" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                </div>

                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Sexe </label>
                                  <select name="sexe" class="form-control">
                                      <option></option>
                                      <option  value="Masculin" <?php if (infos_user(getUserLogin())->sexe == "Masculin"){echo 'selected="selected"'; } ?> >Masculin</option>
                                      <option value="Féminin" <?php if (infos_user(getUserLogin())->sexe == "Féminin"){echo 'selected="selected"'; } ?>>Féminin</option>
                                  </select>
                                </div>

                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Email </label>
                                    <input value="<?php echo infos_user(getUserLogin())->adresse ?>" id="mail" disabled="disabled"  name="adresse" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                </div>

                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Pays de résidence </label>
                                    <input value="<?php echo infos_user(getUserLogin())->pays_residence ?>"  name="pays" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                </div>

                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Téléphone </label>
                                    <input value="<?php echo infos_user(getUserLogin())->tel ?>"  name="tel" type="tel" class="form-control" aria-required="true" aria-invalid="false">
                                </div>



                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button name="save" type="submit" class="btn btn-primary">Modifier</button>
                    </div>

                </form>
                </div>
            </div>
        </div>
    </div>

        <div class="modal fade" id="cod" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
             data-backdrop="static">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticModalLabel">Identifiant de virement/reception d'argent</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1">Votre identifiant  </label>
                            <input disabled="disabled" value="<?php echo infos_user(getUserLogin())->op_code ?>" required="required"  name="nom" type="text" class="form-control" aria-required="true" aria-invalid="false">
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-lg btn-info btn-block">
                            <i class="fa fa-close"></i>&nbsp;
                            <span id="payment-button-amount">Fermer</span>
                        </button>
                    </div>


                </div>

            </div>

        </div>

        <style type="text/css">
        .parsley-required .parsley-equalto{
            color: red;
        }

        .parsley-type #parsley-id-7{
            color: red;
        }
    </style>
<?php
require 'pages/htmfooter.php';
require 'pages/footer.php';
?>

        <script type="text/javascript">

            function regist()
            {
                $.ajax({
                    url:'pages/control/auth.php?email='+$("#email").val()+"&passe="+$("#passe").val(),
                    success : function (data) {
                        data=JSON.parse(data);
                        if(data === true)
                        {
                            $("#staticModal").modal("hide");
                            $("#cod").modal("show");
                            $("#email").val("");
                            $("#passe").val("");
                        }else{
                            alert("Identifiant et/ou mot de passe incorrect");
                        }
                    }
                });

            }

            $("#mail").inputmask(
                {
                    mask: "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}.*{2,6}[.*{1,2}]",
                    greedy: false,
                    onBeforePaste: function (pastedValue, opts) {
                        pastedValue = pastedValue.toLowerCase();
                        return pastedValue.replace("mailto:", "");
                    },
                    definitions: {
                        '*': {
                            validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~\-]",
                            casing: "lower"
                        }
                    }
                });
        </script>
        <script>



            var btnCust = '<button style="display: none"  type="button" class="btn btn-secondary" title="Add picture tags" ' +
                'onclick="alert(\'Call your custom code here.\')">' +
                '<i class="fa fa-save"></i>' +
                '</button>';
            $("#avatar-1").fileinput({
                overwriteInitial: true,
                maxFileSize: 5000,
                showClose: false,
                showCaption: false,
                browseLabel: '',
                removeLabel: '',
                browseIcon: '<i class="zmdi zmdi-camera-add"></i>',
                removeIcon: '<i class="fa fa-refresh"></i>',
                removeTitle: 'Actualiser',
                elErrorContainer: '#kv-avatar-errors-1',
                msgErrorClass: 'alert alert-block alert-danger',
                defaultPreviewContent: '<img style="max-width:200px" id="ava" src="<?php if(infos_user(getUserLogin())->photo != ""){echo getUrl().infos_user(getUserLogin())->photo;}else{ echo "images/icon/avatar.png"; } ?>" alt="Votre photo de profil">',
                layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
                allowedFileExtensions: ["jpg", "png", "gif"]
            });

             var isIE = /*@cc_on!@*/false || !!document.documentMode;
            if(isIE == true){
                $("#ava").css("max-width","200px");
                $("#avatar-1").css("max-width","200px");
            }
        </script>