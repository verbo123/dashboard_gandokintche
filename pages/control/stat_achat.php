<?php
require 'database.php';
require 'fonction.php';
global  $bdd;
    $result=array();
    //$sql=$bdd->query("select count(*) as nbre,year(date) as annee from transaction where  operation='VIR' and typ_virement='CLA' group by year(date) ");

    $sql=$bdd->query("select count(*) as nbre,year(date) as annee  from transaction where operation='VIR' and typ_virement='ACHA' and code_user_sender = '".getUserLogin()."'  group by year(date)");

    if($sql)
    {
        while ($row=$sql->fetch(PDO::FETCH_OBJ))
        {
            $result[]=$row;
        }
    }

    echo json_encode($result);

