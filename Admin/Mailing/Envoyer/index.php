<?php
require_once($_SERVER['DOCUMENT_ROOT']."/lib/script/fonction_perso.inc.php");  
require_once($_SERVER['DOCUMENT_ROOT']."/lib/script/redirect.inc.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib/script/requete.inc.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib/script/log.inc.php"); 

if ($Cnx_Admin!=TRUE) {
  header('location:'.$Home.'/Admin');
}

$Erreur=$_GET['erreur'];
$Valid=$_GET['valid'];
if (isset($_POST['type'])) {
    $_SESSION['type']=$_POST['type'];
}
$Now=time();

if (isset($_SESSION['type'])) {
    $RecupParam=$cnx->prepare("SELECT * FROM ".$Prefix."neuro_Param_Mailling WHERE id=:id");
    $RecupParam->BindParam(":id", $_SESSION['type'], PDO::PARAM_STR);
    $RecupParam->execute();
    $Param=$RecupParam->fetch(PDO::FETCH_OBJ); 
}   

//creation d'un tableau liste avec la liste de diffusion
unset($_SESSION['email']);
$SelectClient=$cnx->prepare("SELECT * FROM ".$Prefix."neuro_Diffusion_Liste WHERE diffusion='1'");
$SelectClient->execute();
$Compteur=$SelectClient->rowCount();

$u=0;
while($Liste=$SelectClient->fetch(PDO::FETCH_OBJ)) {
    if($Compteur>1) {
        if($u==0) {
            $_SESSION['email'].=$Liste->email;  
        }
        else {
            $_SESSION['email'].=", ".$Liste->email; 
        }
    }
    else {
        $_SESSION['email'].=$Liste->email;
    }
    $u++;
}

if ((isset($_POST['Envoyer']))&&($_POST['Envoyer']=="Envoyer")) { 

    //Envoi
    $Retour=FiltreEmail('email');
    if ((isset($_POST['destinataire']))&&(!empty($_POST['destinataire']))) {
        if ((isset($_POST['objet']))&&(!empty($_POST['objet']))) {
            if ((isset($_POST['message']))&&(!empty($_POST['message']))) {               
                if (preg_match("#^[A-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['retour'])) { 
                    
                    $Destinataire2=$_POST['destinataire'];
                    $Objet=$_POST['objet'];
                    $Message=$_POST['message'];
                    $Retour=$_POST['retour'];
                    
                    $boundary = md5(uniqid(mt_rand()));
                    
                    $Entete = "From: $Retour\n";
                    $Entete .= "Reply-To: $Retour\n";
                    $Entete .= "MIME-Version: 1.0\n";
                    $Entete .= "Content-Type:multipart/mixed; boundary=\"$boundary\"\n";
                    $Entete .= "\n";
                    
                    $message="Ce message est au format MIME.\n";
                    
                    $message.="--$boundary\n";
                    $message.="Content-Type: text/html; charset=iso8859-15\n";  
                    $message.="\n";
                    
                    $message.="<html><head>
                                <title>".$Objet."</title>
                                </head>
                                <body>
                                ".$Message."
                                </body>
                                </html>";
                                
                    $message.="\n\n";   
                    $message.="--$boundary\n";   
                    
                    if (mail($Destinataire2, $Objet, $message, $Entete)===FALSE) {
                        $Erreur = "L'e-mail n'a pu ??tre envoy??, v??rifiez que vous l'avez entr?? correctement !";
                    }
                    else {  
                        $Insert=$cnx->prepare("INSERT INTO ".$Prefix."neuro_Mail (destinataire, objet, message, retour, type, created) VALUES(:destinataire, :objet, :message, :retour, :type, :created)");
                        $Insert->BindParam(":destinataire", $Destinataire2, PDO::PARAM_STR);
                        $Insert->BindParam(":objet", $Objet, PDO::PARAM_STR);
                        $Insert->BindParam(":message", $Message, PDO::PARAM_STR);
                        $Insert->BindParam(":retour", $Retour, PDO::PARAM_STR);
                        $Insert->BindParam(":type", $_SESSION['type'], PDO::PARAM_STR);
                        $Insert->BindParam(":created", $Now, PDO::PARAM_STR);
                        $Insert->execute();

                        unset($_SESSION['type']);
                        unset($_SESSION['email']);
                        unset($_SESSION['selection']);

                        $Valid="Votre message a bien ??t?? envoy?? !";
                        header("location:".$Home."/Admin/Mailing/?valid=".urlencode($Valid));
                    }
                }
                else {
                    $Erreur="L'adresse e-mail de retour n'est pas conforme !</p>";
                }  
            }
            else {
                $Erreur="Veuillez entrer un message !";
            }
        }
        else {
            $Erreur="Veuillez entrer un objet de message !";
        }
    } 
    else {
        $Erreur="Veuillez entrer aux moins un destinataire !";
    }
}
    
?>

<?php require_once($_SERVER['DOCUMENT_ROOT']."/Admin/lib/script/head.inc.php"); ?>

<body>
<header>
<?php require_once($_SERVER['DOCUMENT_ROOT']."/Admin/lib/script/header.inc.php"); ?>
</header>

<section>
    
<nav>
<div id="MenuGauche">
<?php require_once($_SERVER['DOCUMENT_ROOT']."/Admin/lib/script/menu.inc.php"); ?>
</div>
</nav>

<article>
<?php if (isset($Erreur)) { echo "<font color='#FF0000'>".$Erreur."</font><BR />"; }
if (isset($Valid)) { echo "<font color='#009900'>".$Valid."</font><BR />"; } ?>

<div id="Form_Middle3">
<H1>Envoyer un Mailling</H1></p>
<form name="form" action="" method="POST" >
<select name="type" id="type" onChange="submit()">
<option value="NULL" <?php if ($Type=="NULL") { echo "selected"; } ?> >-- Vide --</option>
<?php 
$Mailling=$cnx->prepare("SELECT * FROM ".$Prefix."neuro_Param_Mailling");    
$Mailling->execute(); 

while($Model=$Mailling->fetch(PDO::FETCH_OBJ)) { ?>
<option value="<?php echo $Model->id; ?>" <?php if ($Model->id==$_SESSION['type']) { echo "selected"; } ?> ><?php echo $Model->libele; ?></option>
<?php } ?>
</select>
</form>
</p>

<form name="form_mail" action="" method="POST" enctype="multipart/form-data">

<input type="text" placeholder="?? :" name="destinataire" require="required" value="<?php echo $_SESSION['email']; ?>"/></p>

<input type="text" placeholder="Objet :" name="objet" require="required"/></p>

<input type="text" placeholder="Adresse de retour" name="retour" value="<?php echo $Destinataire; ?>" require="required"/></p>

<textarea id="message" name="message" placeholder="Message*" require="required">
<?php echo $Param->mailling ?>
</textarea></p>

<input type="submit" class="ButtonRose" name="Envoyer" value="Envoyer"/>
<input type="submit" class="ButtonRose" name="reset" value="Reinitialiser"/>
</form>
</div>

</article>
</section>
</div>
</CENTER>
</body>

</html>