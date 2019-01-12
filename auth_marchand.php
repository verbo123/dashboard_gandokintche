<?php
$active = "Compte marchand";
$devop="marchand";
include 'pages/header.php';?>
<link href="build/css/intlTelInput.min.css" rel="stylesheet" media="all">
<link href="css/easy-autocomplete.min.css" rel="stylesheet" media="all">

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
                           <?php require 'pages/control/register_marchand.php'; ?>
                            <div style="" id="upd" class="card">
                                <div class="card-header">
                                    <i class="mr-2 fa fa-align-justify"></i>
                                    <strong class="card-title" v-if="headerText">
                                        <?php echo ma_tra("Informations de votre compte marchand")?>
                                    </strong><br>
                                    <small>
                                        <?php echo ma_tra("Les informations fournies ci-dessous seront visibles par vos clients. Utiliez-le pour fournir des informations de contact spécifiques à l'assistance.")?>
                                    </small>
                                </div>

                                <div class="cent card-body card-block " style="padding-bottom: 50px;">
                                    <?php
                                        if(isset($_POST["modifier"]))
                                        {
                                            if(!empty($_POST["entreprise"]) && !empty($_POST["site"]) &&
                                                !empty($_POST["tel"]) &&  !empty($_POST["email"]) &&  !empty($_POST["pays"]) &&
                                                !empty($_POST["ville"]) &&  !empty($_POST["adresse"])){
                                                extract($_POST);
                                                update_compte_marchand($entreprise,$pays,$ville,$adresse,$tel,$site,$email);
                                            }
                                        }

                                    if(isset($_POST["valider"]))
                                    {
                                        if(!empty($_POST["entreprise"]) && !empty($_POST["site"]) &&
                                            !empty($_POST["tel"]) &&  !empty($_POST["email"]) &&  !empty($_POST["pays"]) &&
                                            !empty($_POST["ville"]) &&  !empty($_POST["adresse"]))
                                        {
                                            extract($_POST);
                                            if(filter_var($email,FILTER_VALIDATE_EMAIL)){
                                                $code_marchand=generateToken(4);
                                                $data=array($code_marchand,getUserLogin(),$entreprise,$pays,$ville,$adresse,$tel,$site,$email);
                                                // var_dump($data);
                                                save_compte_marchand($data);
                                                $auto=array($code_marchand,getUserLogin(),1); //le 1 pour groupe propriétaire
                                                save_autorisation_user($auto);
                                            }else{
                                                if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "en_US")
                                                {
                                                    echo '<div id="msg" class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>'.
                                                        'Invalid email address !'.
                                                        '</div>';

                                                }else{
                                                    echo '<div id="msg" class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>'.
                                                        'Adresse email invalide !'.
                                                        '</div>';

                                                }

                                            }

                                        }

                                    }

                                    ?>
                                    <form data-parsley-validate  method="post" class="center-block col-form-label-sm">
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label"><?php echo ma_tra("Nom de l'entreprise")?></label>
                                            <input value="<?php if(getcompte_marchand() != null)  echo getcompte_marchand()->nom_entreprise ?>" name="entreprise" required="required" type="text" id="company" placeholder="" class="form-control">
                                        </div>


                                        <div class="form-group">
                                            <label for="street" class=" form-control-label"><?php echo ma_tra("Site web")?></label>
                                            <input  value="<?php if(getcompte_marchand() != null)  if(getcompte_marchand() != null)  echo getcompte_marchand()->site_web ?>" name="site"  type="url" required="required" id="site" placeholder="https://www.monsite.com" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="street" class="form-control-label"><?php echo ma_tra("Téléphone")?></label>
                                            <input   value="<?php if(getcompte_marchand() != null)  echo getcompte_marchand()->numero ?>" name="tel" required="required" type="tel"  placeholder="Ex : 22999999999" class="form-control">
                                        </div>


                                        <div class="form-group">
                                            <label for="street" class=" form-control-label">Email</label>
                                            <input value="<?php if(getcompte_marchand() != null)  if(!empty(getcompte_marchand())){echo getcompte_marchand()->email;}else{echo infos_user(getUserLogin())->adresse;}  ?>" name="email" data-parsley-trigger="keypress" required="required" type="email" id="mail" placeholder="" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="street" class=" form-control-label"><?php echo ma_tra("Pays")?></label>
                                            <input value="<?php if(getcompte_marchand() != null)  if(!empty(getcompte_marchand())){echo getcompte_marchand()->pays;}else{echo infos_user(getUserLogin())->pays;}  ?>" name="pays" id="pays"  required="required" type="text"  placeholder="" class="form-control">
                                        </div>


                                        <div style="display:none" class="form-group">
                                            <label for="selectSm" class=" form-control-label"><?php echo ma_tra("Pays")?></label>
                                            <select   class=" form-control">
                                                <option value=""> </option>
                                                <option value="France">France </option>

                                                <option value="Afghanistan">Afghanistan </option>
                                                <option value="Afrique_Centrale">Afrique_Centrale </option>
                                                <option value="Afrique_du_sud">Afrique_du_Sud </option>
                                                <option value="Albanie">Albanie </option>
                                                <option value="Algerie">Algerie </option>
                                                <option value="Allemagne">Allemagne </option>
                                                <option value="Andorre">Andorre </option>
                                                <option value="Angola">Angola </option>
                                                <option value="Anguilla">Anguilla </option>
                                                <option value="Arabie_Saoudite">Arabie_Saoudite </option>
                                                <option value="Argentine">Argentine </option>
                                                <option value="Armenie">Armenie </option>
                                                <option value="Australie">Australie </option>
                                                <option value="Autriche">Autriche </option>
                                                <option value="Azerbaidjan">Azerbaidjan </option>

                                                <option value="Bahamas">Bahamas </option>
                                                <option value="Bangladesh">Bangladesh </option>
                                                <option value="Barbade">Barbade </option>
                                                <option value="Bahrein">Bahrein </option>
                                                <option value="Belgique">Belgique </option>
                                                <option value="Belize">Belize </option>
                                                <option value="Benin" >Benin </option>
                                                <option value="Bermudes">Bermudes </option>
                                                <option value="Bielorussie">Bielorussie </option>
                                                <option value="Bolivie">Bolivie </option>
                                                <option value="Botswana">Botswana </option>
                                                <option value="Bhoutan">Bhoutan </option>
                                                <option value="Boznie_Herzegovine">Boznie_Herzegovine </option>
                                                <option value="Bresil">Bresil </option>
                                                <option value="Brunei">Brunei </option>
                                                <option value="Bulgarie">Bulgarie </option>
                                                <option value="Burkina_Faso">Burkina_Faso </option>
                                                <option value="Burundi">Burundi </option>

                                                <option value="Caiman">Caiman </option>
                                                <option value="Cambodge">Cambodge </option>
                                                <option value="Cameroun">Cameroun </option>
                                                <option value="Canada">Canada </option>
                                                <option value="Canaries">Canaries </option>
                                                <option value="Cap_vert">Cap_Vert </option>
                                                <option value="Chili">Chili </option>
                                                <option value="Chine">Chine </option>
                                                <option value="Chypre">Chypre </option>
                                                <option value="Colombie">Colombie </option>
                                                <option value="Comores">Colombie </option>
                                                <option value="Congo">Congo </option>
                                                <option value="Congo_democratique">Congo_democratique </option>
                                                <option value="Cook">Cook </option>
                                                <option value="Coree_du_Nord">Coree_du_Nord </option>
                                                <option value="Coree_du_Sud">Coree_du_Sud </option>
                                                <option value="Costa_Rica">Costa_Rica </option>
                                                <option value="Cote_d_Ivoire">Côte_d_Ivoire </option>
                                                <option value="Croatie">Croatie </option>
                                                <option value="Cuba">Cuba </option>

                                                <option value="Danemark">Danemark </option>
                                                <option value="Djibouti">Djibouti </option>
                                                <option value="Dominique">Dominique </option>

                                                <option value="Egypte">Egypte </option>
                                                <option value="Emirats_Arabes_Unis">Emirats_Arabes_Unis </option>
                                                <option value="Equateur">Equateur </option>
                                                <option value="Erythree">Erythree </option>
                                                <option value="Espagne">Espagne </option>
                                                <option value="Estonie">Estonie </option>
                                                <option value="Etats_Unis">Etats_Unis </option>
                                                <option value="Ethiopie">Ethiopie </option>

                                                <option value="Falkland">Falkland </option>
                                                <option value="Feroe">Feroe </option>
                                                <option value="Fidji">Fidji </option>
                                                <option value="Finlande">Finlande </option>
                                                <option value="France">France </option>

                                                <option value="Gabon">Gabon </option>
                                                <option value="Gambie">Gambie </option>
                                                <option value="Georgie">Georgie </option>
                                                <option value="Ghana">Ghana </option>
                                                <option value="Gibraltar">Gibraltar </option>
                                                <option value="Grece">Grece </option>
                                                <option value="Grenade">Grenade </option>
                                                <option value="Groenland">Groenland </option>
                                                <option value="Guadeloupe">Guadeloupe </option>
                                                <option value="Guam">Guam </option>
                                                <option value="Guatemala">Guatemala</option>
                                                <option value="Guernesey">Guernesey </option>
                                                <option value="Guinee">Guinee </option>
                                                <option value="Guinee_Bissau">Guinee_Bissau </option>
                                                <option value="Guinee equatoriale">Guinee_Equatoriale </option>
                                                <option value="Guyana">Guyana </option>
                                                <option value="Guyane_Francaise ">Guyane_Francaise </option>

                                                <option value="Haiti">Haiti </option>
                                                <option value="Hawaii">Hawaii </option>
                                                <option value="Honduras">Honduras </option>
                                                <option value="Hong_Kong">Hong_Kong </option>
                                                <option value="Hongrie">Hongrie </option>

                                                <option value="Inde">Inde </option>
                                                <option value="Indonesie">Indonesie </option>
                                                <option value="Iran">Iran </option>
                                                <option value="Iraq">Iraq </option>
                                                <option value="Irlande">Irlande </option>
                                                <option value="Islande">Islande </option>
                                                <option value="Israel">Israel </option>
                                                <option value="Italie">italie </option>

                                                <option value="Jamaique">Jamaique </option>
                                                <option value="Jan Mayen">Jan Mayen </option>
                                                <option value="Japon">Japon </option>
                                                <option value="Jersey">Jersey </option>
                                                <option value="Jordanie">Jordanie </option>

                                                <option value="Kazakhstan">Kazakhstan </option>
                                                <option value="Kenya">Kenya </option>
                                                <option value="Kirghizstan">Kirghizistan </option>
                                                <option value="Kiribati">Kiribati </option>
                                                <option value="Koweit">Koweit </option>

                                                <option value="Laos">Laos </option>
                                                <option value="Lesotho">Lesotho </option>
                                                <option value="Lettonie">Lettonie </option>
                                                <option value="Liban">Liban </option>
                                                <option value="Liberia">Liberia </option>
                                                <option value="Liechtenstein">Liechtenstein </option>
                                                <option value="Lituanie">Lituanie </option>
                                                <option value="Luxembourg">Luxembourg </option>
                                                <option value="Lybie">Lybie </option>

                                                <option value="Macao">Macao </option>
                                                <option value="Macedoine">Macedoine </option>
                                                <option value="Madagascar">Madagascar </option>
                                                <option value="Madère">Madère </option>
                                                <option value="Malaisie">Malaisie </option>
                                                <option value="Malawi">Malawi </option>
                                                <option value="Maldives">Maldives </option>
                                                <option value="Mali">Mali </option>
                                                <option value="Malte">Malte </option>
                                                <option value="Man">Man </option>
                                                <option value="Mariannes du Nord">Mariannes du Nord </option>
                                                <option value="Maroc">Maroc </option>
                                                <option value="Marshall">Marshall </option>
                                                <option value="Martinique">Martinique </option>
                                                <option value="Maurice">Maurice </option>
                                                <option value="Mauritanie">Mauritanie </option>
                                                <option value="Mayotte">Mayotte </option>
                                                <option value="Mexique">Mexique </option>
                                                <option value="Micronesie">Micronesie </option>
                                                <option value="Midway">Midway </option>
                                                <option value="Moldavie">Moldavie </option>
                                                <option value="Monaco">Monaco </option>
                                                <option value="Mongolie">Mongolie </option>
                                                <option value="Montserrat">Montserrat </option>
                                                <option value="Mozambique">Mozambique </option>

                                                <option value="Namibie">Namibie </option>
                                                <option value="Nauru">Nauru </option>
                                                <option value="Nepal">Nepal </option>
                                                <option value="Nicaragua">Nicaragua </option>
                                                <option value="Niger">Niger </option>
                                                <option value="Nigeria">Nigeria </option>
                                                <option value="Niue">Niue </option>
                                                <option value="Norfolk">Norfolk </option>
                                                <option value="Norvege">Norvege </option>
                                                <option value="Nouvelle_Caledonie">Nouvelle_Caledonie </option>
                                                <option value="Nouvelle_Zelande">Nouvelle_Zelande </option>

                                                <option value="Oman">Oman </option>
                                                <option value="Ouganda">Ouganda </option>
                                                <option value="Ouzbekistan">Ouzbekistan </option>

                                                <option value="Pakistan">Pakistan </option>
                                                <option value="Palau">Palau </option>
                                                <option value="Palestine">Palestine </option>
                                                <option value="Panama">Panama </option>
                                                <option value="Papouasie_Nouvelle_Guinee">Papouasie_Nouvelle_Guinee </option>
                                                <option value="Paraguay">Paraguay </option>
                                                <option value="Pays_Bas">Pays_Bas </option>
                                                <option value="Perou">Perou </option>
                                                <option value="Philippines">Philippines </option>
                                                <option value="Pologne">Pologne </option>
                                                <option value="Polynesie">Polynesie </option>
                                                <option value="Porto_Rico">Porto_Rico </option>
                                                <option value="Portugal">Portugal </option>

                                                <option value="Qatar">Qatar </option>

                                                <option value="Republique_Dominicaine">Republique_Dominicaine </option>
                                                <option value="Republique_Tcheque">Republique_Tcheque </option>
                                                <option value="Reunion">Reunion </option>
                                                <option value="Roumanie">Roumanie </option>
                                                <option value="Royaume_Uni">Royaume_Uni </option>
                                                <option value="Russie">Russie </option>
                                                <option value="Rwanda">Rwanda </option>

                                                <option value="Sahara Occidental">Sahara Occidental </option>
                                                <option value="Sainte_Lucie">Sainte_Lucie </option>
                                                <option value="Saint_Marin">Saint_Marin </option>
                                                <option value="Salomon">Salomon </option>
                                                <option value="Salvador">Salvador </option>
                                                <option value="Samoa_Occidentales">Samoa_Occidentales</option>
                                                <option value="Samoa_Americaine">Samoa_Americaine </option>
                                                <option value="Sao_Tome_et_Principe">Sao_Tome_et_Principe </option>
                                                <option value="Senegal">Senegal </option>
                                                <option value="Seychelles">Seychelles </option>
                                                <option value="Sierra Leone">Sierra Leone </option>
                                                <option value="Singapour">Singapour </option>
                                                <option value="Slovaquie">Slovaquie </option>
                                                <option value="Slovenie">Slovenie</option>
                                                <option value="Somalie">Somalie </option>
                                                <option value="Soudan">Soudan </option>
                                                <option value="Sri_Lanka">Sri_Lanka </option>
                                                <option value="Suede">Suede </option>
                                                <option value="Suisse">Suisse </option>
                                                <option value="Surinam">Surinam </option>
                                                <option value="Swaziland">Swaziland </option>
                                                <option value="Syrie">Syrie </option>

                                                <option value="Tadjikistan">Tadjikistan </option>
                                                <option value="Taiwan">Taiwan </option>
                                                <option value="Tonga">Tonga </option>
                                                <option value="Tanzanie">Tanzanie </option>
                                                <option value="Tchad">Tchad </option>
                                                <option value="Thailande">Thailande </option>
                                                <option value="Tibet">Tibet </option>
                                                <option value="Timor_Oriental">Timor_Oriental </option>
                                                <option value="Togo">Togo </option>
                                                <option value="Trinite_et_Tobago">Trinite_et_Tobago </option>
                                                <option value="Tristan da cunha">Tristan de cuncha </option>
                                                <option value="Tunisie">Tunisie </option>
                                                <option value="Turkmenistan">Turmenistan </option>
                                                <option value="Turquie">Turquie </option>

                                                <option value="Ukraine">Ukraine </option>
                                                <option value="Uruguay">Uruguay </option>

                                                <option value="Vanuatu">Vanuatu </option>
                                                <option value="Vatican">Vatican </option>
                                                <option value="Venezuela">Venezuela </option>
                                                <option value="Vierges_Americaines">Vierges_Americaines </option>
                                                <option value="Vierges_Britanniques">Vierges_Britanniques </option>
                                                <option value="Vietnam">Vietnam </option>

                                                <option value="Wake">Wake </option>
                                                <option value="Wallis et Futuma">Wallis et Futuma </option>

                                                <option value="Yemen">Yemen </option>
                                                <option value="Yougoslavie">Yougoslavie </option>

                                                <option value="Zambie">Zambie </option>
                                                <option value="Zimbabwe">Zimbabwe </option>

                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="street" class=" form-control-label"><?php echo ma_tra("Ville")?></label>
                                            <input value="<?php if(getcompte_marchand() != null)  echo getcompte_marchand()->ville ?>"   name="ville" required="required" type="text" id="street" placeholder="" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="country" class="form-control-label"><?php echo ma_tra("Adresse")?></label>
                                            <input value="<?php if(getcompte_marchand() != null)  echo getcompte_marchand()->adresse ?>"   required="required" name="adresse" type="text" id="country" placeholder="" class="form-control">
                                        </div>
                                        <div class=" pull-right">
                                            <?php
                                            if(getcompte_marchand() == null || isset($_POST["valider"])){
                                                ?>
                                                <button type="reset" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-ban"></i> <?php echo ma_tra("Annuler")?>
                                                </button>
                                                <button name="valider" type="submit" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-dot-circle-o"></i>
                                                    <?php echo ma_tra("Enregistrer")?>
                                                 </button>
                                                 <?php
                                             }else{
                                                 ?>
                                                 <button name="modifier" type="submit" class="btn btn-primary btn-sm">
                                                     <i class="fa fa-dot-circle-o"></i>
                                                     <?php echo ma_tra("Modifier")?>
                                                 </button>
                                                 <?php
                                             }
                                             ?>
                                         </div>
                                     </form>
                                 </div>
                             </div>

 <!--                            <div style="--><?php //if(getcompte_marchand() == null){ echo "display:block"; }else{echo "display:none"; } ?><!--" id="sav" class="card">-->
<!--                                <div class="card-header">-->
<!--                                    <i class="mr-2 fa fa-align-justify"></i>-->
<!--                                    <strong class="card-title" v-if="headerText">Informations de votre compte marchand</strong><br>-->
<!--                                </div>-->
<!--                                <div style="text-align: -webkit-center;text-align: -moz-center;" class="card-body card-block">-->
<!--                                    <p class=" center-block ">-->
<!--                                        <h3 class="">Vous n'avez aucun compte marchand !</h3>-->
<!--                                    </p>-->
<!--                                    <button id="add" style="margin-top: 20px" class="au-btn au-btn-icon au-btn--green au-btn--small">-->
<!--                                        <i class="zmdi zmdi-plus"></i>Créer un compte marchand-->
<!--                                    </button>-->
<!--                                </div>-->
<!--                            </div>-->



                        </div>
                    </div>
                </div>
            </div>
        </div>









    </div>
    <!-- END PAGE CONTAINER-->

    <style type="text/css">


     .cent{
            margin: 0 auto 20%;
        }

        @media (min-width: 600px){
            .cent{
                margin: 0 auto;
                width: 50%;
            }

        }


        .eac-plate-dark{
            width: 100%;
        }
        @media (min-width: 1200px) {
            #enre{
                margin-left: 250px;
                margin-right: 250px;

            }
        }

        #enre{
            padding-bottom: 50px;
        }

        .table-data-feature
        {
            -webkit-justify-content: inherit;
            justify-content: inherit;
        }

        .parsley-required{
            color: red;
        }

        .parsley-type{
            color: red;
        }
    </style>
</div>
<?php require 'pages/footer.php';?>

<script type="text/javascript">

    var opti={
        url:"assets/country.json",

        getValue : function(element) {
            return element.value;
        },
        list:{
            match:{
                enable:true
            }
        },
        ajaxSettings: {
            dataType: "json",
            method: "GET",
            data: {
                dataType: "json"
            }
        },
        theme:"square",
        highlightPhrase: false
    };



    var options = {

        url:"assets/country.json",

        getValue: function(element) {
            return element.value;
        },

        ajaxSettings: {
            dataType: "json",
            method: "GET",
            data: {
                dataType: "json"
            }
        },

        list: {
            showAnimation: {
                type: "fade", //normal|slide|fade
                time: 400,
                callback: function() {}
            },

            hideAnimation: {
                type: "slide", //normal|slide|fade
                time: 400,
                callback: function() {}
            },

            onChooseEvent:function(){

            },

            match: {
                enabled: true
            },
            highlightPhrase: false
        },

        theme: "plate-dark",

        preparePostData: function(data) {
            data.phrase = $("#pays").val();
            return data;
        },

        requestDelay: 400

    };
    $("#pays").easyAutocomplete(options);
    $(".eac-plate-dark").removeAttr('style');
    //
    // var input = document.querySelector("#phone");
    // window.intlTelInput(input, {
    //     // allowDropdown: false,
    //     // autoHideDialCode: false,
    //     // autoPlaceholder: "off",
    //     // dropdownContainer: document.body,
    //     // excludeCountries: ["us"],
    //     // formatOnDisplay: false,
    //     // geoIpLookup: function(callback) {
    //     //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
    //     //     var countryCode = (resp && resp.country) ? resp.country : "";
    //     //     callback(countryCode);
    //     //   });
    //     // },
    //     // hiddenInput: "full_number",
    //     // initialCountry: "auto",
    //     // localizedCountries: { 'de': 'Deutschland' },
    //     // nationalMode: false,
    //     // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
    //     // placeholderNumberType: "MOBILE",
    //     // preferredCountries: ['cn', 'jp'],
    //     // separateDialCode: true,
    //     utilsScript: "build/js/utils.js",
    // });


    // var intp = document.querySelector("#tel");
    //
    // window.intlTelInput(intp, {
    //     // allowDropdown: false,
    //     // autoHideDialCode: false,
    //     // autoPlaceholder: "off",
    //     // dropdownContainer: document.body,
    //     // excludeCountries: ["us"],
    //     // formatOnDisplay: false,
    //     // geoIpLookup: function(callback) {
    //     //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
    //     //     var countryCode = (resp && resp.country) ? resp.country : "";
    //     //     callback(countryCode);
    //     //   });
    //     // },
    //       hiddenInput: "full_number",
    //       initialCountry: "auto",
    //     // localizedCountries: { 'de': 'Deutschland' },
    //     // nationalMode: false,
    //     // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
    //      placeholderNumberType: "MOBILE",
    //      preferredCountries: ['bj'],
    //      separateDialCode: true,
    //     utilsScript: "js/utils.js",
    // });


    $("#add").click(function () {
        $("#sav").css("display","none");
       $("#enr").css("display","block");
    });

    // $("#mail").inputmask(
    //     {
    //         mask: "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}.*{2,6}[.*{1,2}]",
    //         greedy: false,
    //         onBeforePaste: function (pastedValue, opts) {
    //             pastedValue = pastedValue.toLowerCase();
    //             return pastedValue.replace("mailto:", "");
    //         },
    //         definitions: {
    //             '*': {
    //                 validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~\-]",
    //                 casing: "lower"
    //             }
    //         }
    //     });
</script>

