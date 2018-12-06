<?php
$active = "Accueil";
require 'pages/header.php';
?>

<style type="text/css">
    @keyframes bounce {
    0%, 20%, 60%, 100% {
        -webkit-transform: translateY(0);
        transform: translateY(0);
    }

    40% {
        -webkit-transform: translateY(-20px);
        transform: translateY(-20px);
    }

    80% {
        -webkit-transform: translateY(-10px);
        transform: translateY(-10px);
    }
}

#id1:hover, #id2:hover, #id3:hover, #id4:hover {
    animation: bounce 1s;
}

@media(max-width: 420px)
{
   #id1, #id2, #id3, #id4
   {
    margin-left: 30px;
    margin-right: 30px;
   } 
}


</style>


    <!-- END HEADER MOBILE-->

    <div class="page-wrapper">

<?php require 'pages/menus/side_mobile_menu.php';?>
    <!-- MENU SIDEBAR-->
<?php require 'pages/menus/side_menu.php';?>

        <!-- PAGE CONTAINER-->
        <div class="page-container">
<?php
include 'pages/control/trans.php';
?>
    <!-- HEADER DESKTOP-->
<?php require 'pages/menus/head_menu.php';?>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                            <div class="row">

                                <div  class="row m-t-25">
                                    <div id="id1"  style="cursor:pointer;" class="col-sm-6 col-lg-3">
                                        <div class="overview-item overview-item--c1">
                                            <div class="overview__inner">
                                                <div class="overview-box clearfix">
                                                    <div class="icon">
                                                        <i class="fa fa-money-bill-alt"></i>
                                                    </div>
                                                    <div class="text">
                                                        <h2><?php echo getMontantUser(getUserLogin())->total; ?> CFA</h2>
                                                        <a style="color:rgba(255, 255, 255, 0.6);font-size:18px" href="balance">Solde courant</a>
                                                    </div>
                                                </div>
                                                <div class="overview-chart">

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="id2" style="cursor:pointer" class="col-sm-6 col-lg-3">
                                        <div class="overview-item overview-item--c2">
                                            <div class="overview__inner">
                                                <div class="overview-box clearfix">
                                                    <div class="icon">
                                                        <i class="zmdi zmdi-shopping-cart"></i>
                                                    </div>
                                                    <div class="text">
                                                        <h2><?php echo get_nbre_achat(); ?></h2>
                                                
                                                        <a style="color:rgba(255, 255, 255, 0.6);font-size:18px" href="transaction">Achats en ligne</a>
                                                    </div>
                                                </div>
                                                <div class="overview-chart">
<!--                                                    <canvas id="widgetChart2"></canvas>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="id3" style="cursor:pointer" class="col-sm-6 col-lg-3">
                                        <div class="overview-item overview-item--c3">
                                            <div class="overview__inner">
                                                <div class="overview-box clearfix">
                                                    <div class="icon">
                                                        <i class="zmdi zmdi-receipt"></i>
                                                    </div>
                                                    <div class="text">
                                                        <h2><?php echo get_nbre_virement(); ?></h2>
                                                        
                                                         <a style="color:rgba(255, 255, 255, 0.6);font-size:18px" href="transaction">Virements effectués</a>
                                                    </div>
                                                </div>
                                                <div class="overview-chart">
<!--                                                    <canvas id="widgetChart3"></canvas>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div style="cursor:pointer" id="id4" class="col-sm-6 col-lg-3">
                                        <div class="overview-item overview-item--c4">
                                            <div class="overview__inner">
                                                <div class="overview-box clearfix">
                                                    <div class="icon">
                                                        <i class="zmdi zmdi-apps"></i>
                                                    </div>
                                                    <div class="text">
                                                        <h2><?php echo get_nbre_app(); ?></h2>
                                                        
                                            <a style="color:rgba(255, 255, 255, 0.6);font-size:18px" href="apikeys">Applications</a>

                                                    </div>
                                                </div>
                                                <div class="overview-chart">

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>

<!--    <div class="row">-->
<!--        <div class="col-md-12">-->
<!--
<!--            --><?php
//            if (count(getTransaction()) > 0)
//            {
//                ?>
<!--                <h3 class="title-5 m-b-35">Transations</h3>-->
<!--                <div class="table-data__tool">-->
<!--                    <div class="table-data__tool-left">-->
<!---->
<!--                        <div class="rs-select2--light rs-select2--md">-->
<!--                            <select class="js-select2" name="time">-->
<!--                                <option selected="selected">Aujourd'hui</option>-->
<!--                                <option value="">Hier</option>-->
<!--                                <option value="">Autre date</option>-->
<!--                            </select>-->
<!--                            <div class="dropDownSelect2"></div>-->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<!---->
<!---->
<!--                </div>-->
<!--                <div class="table-responsive table-responsive-data2">-->
<!--                    <table class="table table-data2">-->
<!--                        <thead>-->
<!--                        <tr>-->
<!--                            <th>N° Transaction</th>-->
<!--                            <th>date</th>-->
<!--                            <th>description</th>-->
<!--                            <th>montant</th>-->
<!--                            <th></th>-->
<!--                        </tr>-->
<!--                        </thead>-->
<!--                        <tbody>-->
<!--                        <tr class="spacer"></tr>-->
<!---->
<!--                        --><?php
//                        foreach (getTransaction() as $tran)
//                        {
//
//                            ?>
<!--                            <tr class="tr-shadow">-->
<!--                                <td>-->
<!--                                    <span class="block-email">--><?php //echo $tran->no_trans; ?><!--</span>-->
<!--                                </td>-->
<!--                                <td>--><?php //echo date_conversion($tran->date); ?><!--</td>-->
<!--                                <td>-->
<!--                                    --><?php
//
//                                    if($tran->code_user_sender == getUserLogin()){
//                                        echo ' <span class="status--denied">Virement de fond</span>';
//                                    }else{
//                                        echo '<span class="status--process">Reception de fond</span>';
//                                    }
//                                    ?>
<!---->
<!--                                </td>-->
<!--                                <td>--><?php //echo $tran->montant; ?><!-- FCFA</td>-->
<!--                                <td>-->
<!--                                    <div class="table-data-feature">-->
<!--                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Supprimer">-->
<!--                                            <i class="zmdi zmdi-delete"></i>-->
<!--                                        </button>-->
<!--                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Détails">-->
<!--                                            <i class="zmdi zmdi-more"></i>-->
<!--                                        </button>-->
<!--                                    </div>-->
<!--                                </td>-->
<!--                            </tr>-->
<!--                            <tr class="spacer"></tr>-->
<!---->
<!--                            --><?php
//                        }
//                        ?>
<!---->
<!--                        </tbody>-->
<!--                    </table>-->
<!--                </div>-->
<!--
<!--                --><?php
//
//            }else{
//
//            }
//            ?>
<!--        </div>-->
<!--    </div>-->

<?php
require 'pages/htmfooter.php';
require 'pages/footer.php';
?>

 <script type="text/javascript">

 $('#id1').click(function(){
    window.location.href="balance";
 });

  $('#id2').click(function(){
    window.location.href="shop";
 });

   $('#id3').click(function(){
    window.location.href="transaction";
 });

    $('#id4').click(function(){
    window.location.href="apikeys";
 });

     // Opera 8.0+
     var isOpera = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
     // Firefox 1.0+
     var isFirefox = typeof InstallTrigger !== 'undefined';
     // At least Safari 3+: "[object HTMLElementConstructor]"
     var isSafari = Object.prototype.toString.call(window.HTMLElement).indexOf('Constructor') > 0;
     // Internet Explorer 6-11
     var isIE = /*@cc_on!@*/false || !!document.documentMode;
     // Edge 20+
     var isEdge = !isIE && !!window.StyleMedia;
     // Chrome 1+
     var isChrome = !!window.chrome && !!window.chrome.webstore;
     // Blink engine detection
     var isBlink = (isChrome || isOpera) && !!window.CSS;

     console.log(isIE);
     if(isIE == true){
         $("#exp").css("width","1000px");
     }


 </script>