<?php
require 'Tools/localization.php';
if(!isset($_COOKIE["account_code"]))
{
    header("location: login");
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Système de paiement en ligne au Bénin">
    <meta name="author" content="Verbeck DEGBESSE">
    <meta name="keywords" content="paiement, en ligne, Bénin, payez, gandokintché">

 <link rel="icon" href="images/icon/fvicon.png" type="image/x-icon" />
    <!-- Title Page-->
    <title>Dashboard-GANDOKINTCHE | <?php echo $active; ?></title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
    <link href="css/parsley.css" rel="stylesheet" media="all">
    <link href="css/bootstrap-select.css" rel="stylesheet" media="all">
    <link href="css/fileinput.min.css" rel="stylesheet" media="all">


<!--    <link href="css/datable.css" rel="stylesheet" media="all">-->
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" media="all">
<body class="animsition">

<style>
    .table-data__tool{
        margin-top: -30px;
    }
</style>