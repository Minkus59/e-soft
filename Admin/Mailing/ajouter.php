<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/lib/script/fonction_perso.inc.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib/script/redirect.inc.php");  

if ($Cnx_Admin!=TRUE) {
  header('location:'.$Home.'/Admin');
}

if (isset($_POST['Ajouter'])) {

    $Email=$_POST['email'];
    $Diffusion=$_POST['diffusion'];

    $RecupEmail=explode(",",$Email);

    for ($z=0;$z<count($RecupEmail);$z++) {
        $Select=$cnx->prepare("SELECT (email) FROM ".$Prefix."neuro_Diffusion_Liste WHERE email=:email");
        $Select->bindParam(':email', $RecupEmail[$z], PDO::PARAM_STR);
        $Select->execute();
        $Count=$Select->rowCount();

        if($Count==0) {
            $Ajout=$cnx->prepare("INSERT INTO ".$Prefix."neuro_Diffusion_Liste (email, diffusion) VALUES(:email, :diffusion)");
            $Ajout->bindParam(':email', $RecupEmail[$z], PDO::PARAM_STR);
            $Ajout->bindParam(':diffusion', $Diffusion, PDO::PARAM_INT);
            $Ajout->execute();
        }
    }
    header('Location:'.$Home.'/Admin/Mailing/?valid=Email ajoutée avec succès');
}
?>  
