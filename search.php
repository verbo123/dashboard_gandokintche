<?php $active = "recherche"; require 'pages/header.php'; ?>
<?php require 'pages/menu.php' ?>

<div class="row">
    <div class="col-md-12">
        <div class="top-campaign">
            <h3 id="data" style="text-transform: inherit" class="title-3 m-b-30">

            </h3>
            <div id="res">


            </div>

        </div>
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


 <?php require 'pages/htmfooter.php';require 'pages/footer.php'; ?>

<script type="text/javascript">
    var item = new Array();

    c=0; item[c]=new Array("","index","Dashboard-GANDOKINTCHE","index, solde, paiement , application, balance, API, statistique","Système de paiement en ligne...");
    c++; item[c]=new Array("","balance","Solde de compte","solde, compte","Consulter votre solde compte ici...");
    c++; item[c]=new Array("","shop","Achat en ligne","achat, marchand, vente, en ligne, produit ","Liste des achats effecutés sur des sites marchands...");
    c++; item[c]=new Array("","payment","Transfère d'argent","virement, payer, qrcode, transfère ","Système de transfère d'argent...");
    c++; item[c]=new Array("","apikeys","Intégration de l'API","intégration, api, apikeys, key ","Intégration de l'API sur des plateforme en ligne...");
    c++; item[c]=new Array("","profil","Mon compte","profil, compte, mon compte, qrcode ","Consulter votre compte de profil...");



    if(screen.width <= 500 ){
        $('#example').addClass(' table-responsive');
    }else {
        $('#example').removeClass(' table-responsive');
    }

    if(Cookies.get("q") != undefined || Cookies.get("q") != "undefined" || Cookies.get("q") != "")
    {
        $("#data").html("<?php echo ma_tra('Résultat de recherche pour ') ?> <strong><i>"+Cookies.get("q"))+"</i></strong>";
    }else{
        window.location.href=history.back(-1);
    }

    function recherche2() {
        //txt = $("#recho").val().split(" ");

        txt=Cookies.get("q").split(" ");
        fnd = [];
        total=0;
        for (i = 0; i < item.length; i++) {
            fnd[i] = 0; order = [0, 4, 2, 3];
            for (j = 0; j < order.length; j++)
                for (k = 0; k < txt.length; k++)
                    if (item[i][order[j]].toLowerCase().indexOf(txt[k].toLowerCase()) > -1 && txt[k] !== "")
                    {
                        fnd[i] += (j+1);
                    }



        }

        for (i = 0; i < fnd.length; i++)
        {
            n = 0; w = -1;
            for (j = 0;j < fnd.length; j++)
            {
                if (fnd[j] > n)
                {
                    n = fnd[j];
                    w = j;

                    if (w > -1)
                    {
                        total += show(w);
                        fnd[w] = 0;
                    }

                }


            }

        }


        if(total ===0)
        {
            $("#res").html("<h3 style='text-align: center'>Aucun résultat trouvé !</h3>");
        }
        //Cookies.remove("q");
       // $("#res").append(total);
    }
    line="";
    function show(which)
    {
        link = item[which][1] + item[which][0];
        line = "<div><a href='"+link+"'>"+item[which][2]+"</a>";
        line +="<p>"+item[which][4] + "</p><hr></div>";

        $("#res").append(line);
        return 1;
    }

    recherche2();

</script>
