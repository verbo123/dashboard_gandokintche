<?php
require 'database.php';
require 'fonction.php';
global $bdd;
$statut='NEW';
$result=0;
$pl=$bdd->prepare(" select * from notification where  code_user=? and statut=?");
$pl->execute(array(getUserLogin(),$statut));
if($pl)
{
    $result=$pl->rowCount();
}
echo $result;