<?php
require_once "lib/html2pdf.php";
include 'pages/control/database.php';
include 'pages/control/fonction.php';
include 'pages/control/invoice_function.php';
$trans=$_GET["trans"];
$data=getTransa($_GET["trans"]);
$receiver=infos_user($data->code_user_receiver);
$sender=infos_user($data->code_user_sender);

$user_envoyeur = array(
    "firstname" => $sender->nom.' '.$sender->prenom,
    "portable" => $sender->tel,
    "address" => $sender->adresse
);


$user_receveur = array(
    "firstname" => $receiver->nom.' '.$receiver->prenom,
    "portable" => $receiver->tel,
    "address" => $receiver->adresse
);

//$project = array(
//    "id" => 1,
//    "name" => "Création d'un Portfolio",
//    "status" => 1,
//    "infos" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium eos tempora, magni delectus porro cum labore eligendi.",
//    "created" => 1,
//    "paid" => false,
//    "client_id" => 1,
//    "user_id" => 1
//);

$total = $data->montant;

ob_start();
?>

<style type="text/css">
    table {
        width: 100%;
        color: #717375;
        line-height: 5mm;
        border-collapse: collapse;
    }
    h2  { margin: 0; padding: 0; }
    p { margin: 5px;
    }

    .border th {
        border: 1px solid #000;
        color: white;
        background: #000;
        padding: 5px;
        font-weight: normal;
        font-size: 14px;
        text-align: center; }
    .border td {
        border: 1px solid #CFD1D2;
        padding: 5px 10px;
        text-align: center;
    }
    .no-border {
        border-right: 1px solid #CFD1D2;
        border-left: none;
        border-top: none;
        border-bottom: none;
    }
    .space { padding-top: 250px; }

    .10p { width: 10%; } .15p { width: 15%; }
    .25p { width: 25%; } .50p { width: 50%; }
    .60p { width: 60%; } .75p { width: 75%; }
</style>

<page backtop="10mm" backleft="10mm" backright="10mm" backbottom="10mm" footer="page;">

    <page_footer>
        <hr />
        <table>
            <tr>
                <td class="50p">
                    <p style="font-size: 3mm">Générer le <?php echo date("d/m/y à H:m"); ?></p>
                </td>

                <td class="50p">
                    <p  style="font-size: 3mm">GANDOKINTCHE <?php echo date('Y'); ?> </p>
                </td>
            </tr>
        </table>


    </page_footer>

    <table style="vertical-align: top;margin-bottom: 10px">
        <tr>
            <td style="text-align: center">
                <h3>N° :  <?php echo $trans; ?></h3>
            </td>
        </tr>
    </table>

    <table style="margin-top: 20px">
        <tr>
            <td>
                <strong style="text-decoration: underline">Envoyeur</strong><br />
                <strong><?php echo $user_envoyeur['firstname']; ?></strong><br />
                <strong>Adresse : </strong><?php echo nl2br($user_envoyeur['address']); ?><br />
                <?php
                if($user_envoyeur['portable'] != null)
                {
                    ?>
                    <strong>Téléphone : </strong> <?php echo $user_envoyeur['portable']; ?><br />
                    <?php

                }
                ?>
            </td>
        </tr>
    </table>
<hr/>
    <table>
        <tr>
            <td>
                <strong style="text-decoration: underline">Reçeveur</strong><br />
                <strong><?php echo $user_receveur['firstname']; ?></strong><br />
                <strong>Adresse : </strong><?php echo nl2br($user_receveur['address']); ?><br />
                <?php
                if($user_receveur['portable'] != null)
                {
                    ?>
                    <strong>Téléphone : </strong> <?php echo $user_receveur['portable']; ?><br />
                    <?php

                }
                ?>
            </td>
        </tr>
    </table>

<hr/>
    <table>
<!--        <tr>-->
<!--           <td>-->
<!--               Type d'opération : --><?php //if($data->operation == 'VIR'){echo 'Virement d\'argent ';}else{echo 'Réception d\'argent ';} ; ?>
<!--           </td>-->
<!--        </tr>-->

        <tr>
            <td>
                Date d'opération : Le <?php echo date_conversion($data->date); ?>
            </td>
        </tr>

        <tr>
            <td>
                Montant :  <?php echo $data->montant; ?> CFA
            </td>
        </tr>

    </table>

</page>


<?php

$content = ob_get_clean();
try {
    $pdf = new HTML2PDF("p","A6","fr");
    $pdf->pdf->SetAuthor('GANDOKINTCHE');
    $pdf->pdf->SetTitle('Transaction');
    $pdf->pdf->SetSubject('Transaction');
    $pdf->pdf->SetKeywords('GANDOKINTCHE, Transaction');
    $pdf->writeHTML($content);
    ob_end_clean();
    $pdf->Output('transaction.pdf','I');
     //$pdf->Output('Devis.pdf', 'D');
} catch (HTML2PDF_exception $e) {
    die($e);
}



?>
