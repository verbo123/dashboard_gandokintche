<?php

function get_idm_user_invoice()
{
    global $bdd;
    $result=array();
    $sql=$bdd->prepare("select * from compte_marhand where user_created=? ");
    $sql->execute(array(getUserLogin()));
    if($sql->rowCount() == 1)
    {

            $row=$sql->fetch(PDO::FETCH_OBJ);
            $result=$row;

    }
    return $result;
}

function getMontantTotal($ref)
{
    global $bdd;
    $total=0;
    $sql=$bdd->prepare("select * from produit where ref_vente=? ");
    $sql->execute(array($ref));
    if($sql)
    {
        while ($row=$sql->fetch(PDO::FETCH_OBJ))
        {
            $total +=$row->prix;
        }
    }
    return $total;
}

function getProduits($ref)
{
    global $bdd;
    $result=null;
    $sql=$bdd->prepare("select * from produit where ref_vente=? ");
    $sql->execute(array($ref));
    if($sql)
    {
        while ($row=$sql->fetch(PDO::FETCH_OBJ))
        {
            $result[]=$row;
        }
    }
    return $result;
}

function get_facturation_id($id)
{
    global $bdd;
    $result=null;
    $sql=$bdd->prepare("select * from facturation where ref=? ");
    $sql->execute(array($id));
    if($sql)
    {
        $row=$sql->fetch(PDO::FETCH_OBJ);
            $result=$row;
    }
    return $result;
}

function getFacturation()
{
    if(count(get_idm_user_invoice()) > 0)
    {
        global $bdd;
        $result=array();
        $sql=$bdd->prepare("select * from facturation where marchand=? ");
        $sql->execute(array(get_idm_user_invoice()->code_marchand));
        if($sql)
        {
            while ($row=$sql->fetch(PDO::FETCH_OBJ))
            {
                $result[]=$row;
            }
        }
        return $result;
    }

}