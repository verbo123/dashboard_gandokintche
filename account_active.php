<h2 id="redi">Vous serai réédirigé bientôt....</h2>
<?php
        include 'Tools/database.php';
        include 'Tools/fonction.php';

        if(isset($_GET["token_ID"]))
        {
            global $bdd;
            $table="users";
            $field="tmp_token";
            if(verify($table,$field,$_GET["token_ID"])==true)
            {
                $req=$bdd->prepare("update users set active=true where tmp_token=?");
                $req->execute(array($_GET["token_ID"]));
                if ($req){
                    $sql=$bdd->prepare("select * from users where tmp_token = ?");
                    $sql->execute(array($_GET["token_ID"]));
                    if($sql){
                        $row=$sql->fetch(PDO::FETCH_OBJ);

                        $to=$row->adresse;
                        $header = "Content-type: text/html; charset= utf-8 \r\n";
                        $header .= "FROM: "."GANDOKINTCHE"."<contact@gandokintche.com> \r\n";
                        $header .= "MIME-Version: 1.0 \r\n";
                        $header .= "Content-Transfer-Encoding: 8bit \r\n";
//                $header .="Disposition-Notification-To: ".$adresse." r\n";
                        $header .= "Date: ".date("r (T)")." \r\n";
                        $subject="IDENTIFIANT DE VIREMENT GANDOKINTCHE";

                        ob_start();
?>

                      <h2>Votre indentifiant vous permettant de re&ccedil;evoir des virements est le suivant : <?php echo $row->op_code; ?></h2>;

            <?php
              $message=ob_get_clean();
                        $email_content= mail($to, $subject,$message,$header);


                        setcookie("account_code",$row->code);
                        header('location: login');
                    }

                }
            }else{
                echo '<style type="text/css">';
                echo '#redi{display:none; }';
                echo '</style>';
                echo '<h2>Désolé, votre compte n\'existe pas....</h2>';
            }
        }else{
            echo '<style type="text/css">';
            echo '#redi{display:none; }';
            echo '</style>';
            echo '<h2>Désolé, votre compte n\'existe pas....</h2>';
        }
?>