
<!-- Jquery JS-->
<script src="vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap JS-->
<script src="vendor/bootstrap-4.1/popper.min.js"></script>
<script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
<!-- Vendor JS       -->
<script src="vendor/slick/slick.min.js">
</script>
<script src="vendor/wow/wow.min.js"></script>
<script src="vendor/animsition/animsition.min.js"></script>
<script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
</script>
<script src="vendor/counter-up/jquery.waypoints.min.js"></script>
<script src="vendor/counter-up/jquery.counterup.min.js">
</script>
<script src="vendor/circle-progress/circle-progress.min.js"></script>
<script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="vendor/chartjs/Chart.bundle.min.js"></script>
<script src="vendor/select2/select2.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<!-- Main JS-->
<script src="js/cookies.js"></script>
<script src="js/main.js"></script>
<script src="mask/jquery.inputmask.bundle.min.js"></script>
<script src="js/phone.min.js"></script>
<script src="js/parsley.min.js"></script>
<script src="js/fr.js"></script>
<script src="js/fileinput.min.js"></script>
<script src="js/sortable.min.js"></script>
<script src="js/bootstrap-select.js"></script>
<script src="js/jquery.easy-autocomplete.min.js"></script>
<script src="build/js/intlTelInput.js"></script>
<script src="js/push.min.js"></script>
<script src="js/moteur.js"></script>

<script type="text/javascript">

    function rech() {
        Cookies.set("q",$("#recho").val());
        window.location.href="search?q="+$("#recho").val();
    }


    var explo = /*@cc_on!@*/false || !!document.documentMode;
    if(explo == true){
        $('#recho').css('padding','15px');
        $('#recho').css('line-height','normal');
    }


    function logout()
    {
        $.ajax({
            url:'pages/control/logout.php',
            success : function (data) {
                window.location.href="login";
            }
        });

    }

    function change_notify(id)
    {
        $.ajax({
            url:'pages/control/statut_notification.php?id='+id,
            success : function (data) {
                window.location.href="all_notify_view";
            }
        });

    }

    function conver(dte) {
        var d=new Date(dte);
        var options={weekday:"long",year:"numeric",month:"long",day:"numeric",hour:"2-digit",minute:"2-digit"};
        return d.toLocaleDateString("fr-FR",options);
    }
    /**
     * @return {string}
     */
    function Template(data)
    {
        var html = '';
        var i=0;
        $.each(data, function(index, item)
        {
            if(i < 3){
                html +='<a href="javascript:change_notify('+item.id+')"  class="notifi__item"><div class="content"><p>'+item.message+'</p><span class="date">'+conver(item.date)+'</span></div></a>';
            }

            i++;
        });
        if(i >= 4){
            html +='<div  class="notifi__footer"><a href="all_notify">Toutes les notifications</a></div>';
        }
        return html;
    }



setInterval(function () {
    $.ajax({
        url:'pages/control/all_notif.php?',
        success : function (data) {
            $(".quantity").html("");
            $(".quantity").html(data);
            var cont="";
            if(data==0){
                cont = "<p><?php echo ma_tra("Vous n\'avez aucune notification")?></p>";
            }else {
                cont="<p><?php echo ma_tra("Vous avez")?> "+data+" <?php echo ma_tra("nouvelle(s) notification(s)")?></p>";

                i=0;
                $.ajax({
                    url:'pages/control/get_all_notif.php',
                    success : function (donnees) {
                        data=JSON.parse(donnees);
                        if (data.length > 0){
                            $("#deta").html("");
                            $("#deta").html(Template(data));
                        }

                    }
                });

            }
            $("#notifi__title").html("");
            $("#notifi__title").html(cont);
        }
    });
},1000);

    // $.ajax({
    //     url:'pages/control/get_all_notif.php',
    //     success : function (donnees) {
    //         data=JSON.parse(donnees);
    //         if (data.length > 0){
    //             $.each(data, function(index, data)
    //             {
    //                 Push.create('GandokinTché notification', {
    //                     body: data.message,
    //                     icon: "images/logos.png",
    //                     timeout: 9000,
    //                     onClick: function () {
    //                         window.open('https://dashboard.gandokintche.com/balance', '_self');
    //                     }
    //                 });
    //
    //             });
    //         }
    //
    //     }
    // });



        $(".marchand").click(function (e) {
            e.preventDefault();
            $.ajax({
                url:'pages/control/AuthMarchand.php',
                success : function (data) {
                    data=JSON.parse(data);
                    if(data === false)
                    {
                       window.location.href="auth_marchand";
                    }else if (data === true)
                    {
                        window.location.href="role";
                    }
                }
            });
        });


   if(Cookies.get("lang")=="en_US")
   {
       tAds = $(".example").dataTable({
           "paging": true,
           "lengthChange": true,
           "searching": true,
           "ordering": true,
           "info": true,
           "autoWidth": false,
           "aaSorting": [[0,'desc']],
           "language": {
               "decimal": ",",
               "thousands": ".",
               "sEmptyTable":     "No data available in table",
               "sInfo":           "Showing _START_ to _END_ of _TOTAL_ entries",
               "sInfoEmpty":      "Showing 0 to 0 of 0 entries",
               "sInfoFiltered":   "(filtered from _MAX_ total entries)",
               "sInfoPostFix":    "",
               "sInfoThousands":  ",",
               "sLengthMenu":     "Show _MENU_ entries",
               "sLoadingRecords": "Loading...",
               "sProcessing":     "Processing...",
               "sSearch":         "Search:",
               "sZeroRecords":    "No matching records found",
               "oPaginate": {
                   "sFirst":    "First",
                   "sLast":     "Last",
                   "sNext":     "Next",
                   "sPrevious": "Previous"
               },
               "oAria": {
                   "sSortAscending":  ": activate to sort column ascending",
                   "sSortDescending": ": activate to sort column descending"
               }
           }
       });

   }else{
       tAds = $(".example").dataTable({
           "paging": true,
           "lengthChange": true,
           "searching": true,
           "ordering": true,
           "info": true,
           "autoWidth": false,
           "aaSorting": [[0,'desc']],
           "language": {
               "decimal": ",",
               "thousands": ".",
               "sProcessing":     "Traitement en cours...",
               "sSearch":         "Rechercher&nbsp;:",
               "sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments",
               "sInfo":           "Affichage des &eacute;l&eacute;ments _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
               "sInfoEmpty":      "Affichage des &eacute;l&eacute;ments 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
               "sInfoFiltered":   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
               "sInfoPostFix":    "",
               "sLoadingRecords": "Chargement en cours...",
               "sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
               "sEmptyTable":     "Aucune donnée enregistr&eacute;.",
               "buttons": {
                   "copyTitle": 'C\'est Copié !',
                   "copyKeys": 'Appuyez sur <i>ctrl</i> ou <i>\u2318</i> + <i>C</i> pour copier les données du tableau dans votre presse-papiers. <br><br>Pour annuler, cliquez sur ce message ou appuyez sur Echap.',
                   "copySuccess": {
                       _: '%d lignes copiées dans le presse-papier',
                       1: '1 ligne copiée dans le presse papier'
                   }
               },
               "oPaginate": {
                   "sFirst":      "Premier",
                   "sPrevious":   "Pr&eacute;c&eacute;dent",
                   "sNext":       "Suivant",
                   "sLast":       "Dernier"
               },
               "oAria": {
                   "sSortAscending":  ": Trier la colonne par ordre croissant",
                   "sSortDescending": ": Trier la colonne par ordre d&eacute;croissant"
               }
           }
       });

   }


</script>

<style>
    #example_filter input{
        border-radius: 8px;
    }
</style>


</body>

</html>
<!-- end document-->
