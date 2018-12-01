<?php
$active = "Développeurs";
$devop="liaison";
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
                                        <strong class="card-title" v-if="headerText">Application connectée</strong>
                                    </div>
                                    <div class="card-body">

                                        <form style="margin-right: 300px; margin-left: 300px" class="center-block" method="post" novalidate="novalidate" autocomplete="off">

                                            <div class="rs-select2--light rs-select2--md">
                                                <select class="js-select2" name="time">
                                                    <option selected="selected">Aujourd'hui</option>
                                                    <option value="">Hier</option>
                                                    <option value="">Autre date</option>
                                                </select>
                                                <div class="dropDownSelect2"></div>
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
            </div>


        </div>
        <!-- END PAGE CONTAINER-->

    </div>
<?php require 'pages/footer.php';?>