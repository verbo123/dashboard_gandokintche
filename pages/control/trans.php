<?php

function getTransaction()
{
        global  $bdd;
        $login=getUserLogin();
        $result=array();
        $sql=$bdd->prepare("select * from transaction where code_user_sender=? or code_user_receiver=? order by date desc ");
        $sql->execute(array($login,$login));
        if($sql)
        {
            while ($row=$sql->fetch(PDO::FETCH_OBJ))
            {
                $result[]=$row;
            }
        }
        return $result;

}
