<?php
require 'database.php';
require 'fonction.php';
global  $bdd;
$login=getUserLogin();
$statut='NEW';
$result=array();
$sql=$bdd->prepare("select * from notification where  code_user=? and statut=? order by date desc ");
$sql->execute(array($login,$statut));
if($sql)
{
    while ($row=$sql->fetch(PDO::FETCH_OBJ))
    {
        $result[]=$row;
    }
}
echo json_encode($result);