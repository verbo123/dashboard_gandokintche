<?php
require 'Tools/localization.php';
require_once "lib/html2pdf.php";
include 'pages/control/database.php';
include 'pages/control/fonction.php';
include 'pages/control/invoice_function.php';
$data=get_data_in_table(getUserLogin());
$clt=get_facturation_id($_GET["pdf"]);


$user = array(
    "id" => $data->code_marchand,
    "firstname" => strtoupper($data->nom_entreprise),
    "email" => $data->email,
    "portable" => $data->numero,
    "address" => $data->adresse
);

$client = array(
    "id" => infos_user($clt->client_id)->code,
    "firstname" => infos_user($clt->client_id)->nom,
    "lastname" => infos_user($clt->client_id)->prenom,
    "mail" => infos_user($clt->client_id)->adresse,
    "portable" => infos_user($clt->client_id)->tel
//    "address" => "5 Avenue du Boulevard Maréchal Juin\n14000 Caen",
//    "infos" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium eos tempora, magni delectus porro cum labore eligendi."
);

function generateId($length){
    $va=openssl_random_pseudo_bytes($length);
    $va=bin2hex($va);
    return $va;
}

$task=array();
foreach (getProduits($_GET["pdf"]) as $produit)
{
    $tasks[] = array(
        "id" => $produit->id_produit,
        "ref" => $produit->ref_vente,
        "description" => $produit->libelle,
        "price" => $produit->prix,
        "quantity" => $produit->quantity
    );
}


ob_start();
$total = 0;
$total_tva = 0;
?>

<style type="text/css">
    table {
        width: 100%;
        color: #717375;
        font-family: helvetica;
        line-height: 5mm;
        border-collapse: collapse;
    }
    h2  { margin: 0; padding: 0; }
    p { margin: 5px; }

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

    .wd{
        width: 200px;
    }
</style>

<page backtop="10mm" backleft="10mm" backright="10mm" backbottom="10mm" footer="page;">

    <page_footer>
        <hr />
        <p><?php echo ma_tra("Fait à Cotonou, le")?> <?php echo date("d/m/y"); ?></p>
        <p>&nbsp;</p>
    </page_footer>

    <img class="wd" src="images/icon/logof.png">
    <table style="vertical-align: top;margin-top: 20px">
        <tr>
            <td class="75p">
                <strong><?php echo $user['firstname']; ?></strong><br />
                <strong><?php echo ma_tra("Adresse")?> : </strong><?php echo nl2br($user['address']); ?><br />
                <strong><?php echo ma_tra("Téléphone")?> : </strong> <?php echo $user['portable']; ?><br />
                <?php echo $user['email']; ?>
            </td>
            <td class="25p">
                <strong><?php echo $client['firstname']." ".$client['lastname']; ?></strong><br />
                <?php echo nl2br($client['mail']); ?><br />
            </td>
        </tr>
    </table>

    <table style="margin-top: 50px;">
        <tr>
            <td class="50p"><h2><?php echo ma_tra("Facture")?> n°<?php echo get_nbre_facture(); ?></h2></td>
            <td class="50p" style="text-align: right;"><?php echo ma_tra("Emis le")?> <?php echo date("d/m/y H:m"); ?></td>
        </tr>
        <tr>
<!--            <td style="padding-top: 15px;" colspan="2"><strong>Objectif:</strong> --><?php //echo $project['name']; ?><!--</td>-->
        </tr>
    </table>

    <table style="margin-top: 30px;" class="border">
        <thead>
        <tr>
            <th class="60p"><?php echo ma_tra("Libellé")?></th>
            <th class="10p"><?php echo ma_tra("Quantité")?></th>
            <th class="15p"><?php echo ma_tra("Prix Unitaire")?></th>
            <th class="15p"><?php echo ma_tra("Montant")?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?php echo $task['description']; ?></td>
                <td><?php echo $task['quantity']; ?></td>
                <td><?php echo $task['price']; ?> FCFA</td>
                <td><?php
                    $price_tva = $task['price']*$task['quantity'];
                    echo $price_tva." FCFA";
                    ?>
                </td>

                <?php
                $total += $task['price'];
                $total_tva += $price_tva;
                ?>
            </tr>
        <?php endforeach ?>


        <tr>
            <td class="no-border" colspan="2"></td>
            <td style="text-align: center;"> <strong><?php echo ma_tra("Autres frais")?> :</strong> </td>
            <td>  <?php echo infoVente($_GET["pdf"])->frais; ?> FCFA</td>
        </tr>

         <tr>
            <td class="no-border" colspan="2"></td>
            <td style="text-align: center;"><strong><?php echo ma_tra("Taxe")?> :</strong></td>
            <td> <?php echo infoVente($_GET["pdf"])->tax*100; ?> %</td>
        </tr>

        <tr>
            <td class="no-border" colspan="2"></td>
            <td style="text-align: center;"><strong><?php echo ma_tra("Total")?> :</strong></td>
            <td> <?php echo ($total+infoVente($_GET["pdf"])->frais)*(1+infoVente($_GET["pdf"])->tax); ?> FCFA</td>
        </tr>
<!--        <tr>-->
<!--            <td colspan="2" class="no-border"></td>-->
<!--            <td>TVA : --><?php //echo ($total_tva - $total); ?><!-- &euro;</td>-->
<!--        </tr>-->
<!--        <tr>-->
<!--            <td colspan="2" class="no-border"></td>-->
<!--            <td>TTC : --><?php //echo $total_tva; ?><!-- &euro;</td>-->
<!--        </tr>-->
        </tbody>
    </table>

</page>


<?php
$content = ob_get_clean();
try {
    $pdf = new HTML2PDF("p","A4","fr");
    $pdf->pdf->SetAuthor('GANDOKINTCHE');
    $pdf->pdf->SetTitle('Facture'.get_nbre_facture());
    $pdf->pdf->SetSubject('Facturation');
    $pdf->pdf->SetKeywords('GANDOKINTCHE, Facture, Vente en ligne');
    $pdf->writeHTML($content);
     ob_end_clean();
    $pdf->Output('Facture'.generateId(4).'.pdf','I');
    // $pdf->Output('Devis.pdf', 'D');
} catch (HTML2PDF_exception $e) {
    die($e);
}

?>
