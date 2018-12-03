<?php
require 'database.php';
global $bdd;
if(isset($_POST["profil"])){
    $target_dir="upload/images/profil";
    if(!empty($_FILES))
    {
//        var_dump($_FILES);
        $file_name=$_FILES["avatar-1"]["name"];
        $file_extension= strrchr($file_name, ".");
        $file_tmp_name=$_FILES["avatar-1"]["tmp_name"];
        $mes_extension=array('.jpg','.JPG','.JPEG','.png','.PNG');
        if(!file_exists($target_dir)){
            mkdir($target_dir,0777,true);
        }
        $target_dir=$target_dir."/".$file_name;
        if(in_array($file_extension, $mes_extension))
        {
            if(move_uploaded_file($file_tmp_name, $target_dir))
            {
                $sql=$bdd->prepare("update users set photo=? where code=?");
                $sql->execute(array($target_dir,getUserLogin()));
                if($sql){
                    echo '<div id="msg" class="alert alert-success"> <button type="button" class="close" data-dismiss="alert">&times;</button>';
                    echo 'Photo de profil modifier avec succès !';
                    echo '</div>';

                }

            }
        }else{
            echo '<div id="msg" class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>';
            echo 'Format d\'image non prise ne compte';
            echo '</div>';
        }

    }
}
