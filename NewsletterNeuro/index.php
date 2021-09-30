<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/lib/script/fonction_perso.inc.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib/script/requete.inc.php"); 
require_once($_SERVER['DOCUMENT_ROOT']."/lib/script/redirect.inc.php");                    

if (isset($_POST['Supprimer'])) {

    $Email=$_POST['email'];

    $Update=$cnx->prepare("UPDATE ".$Prefix."neuro_Diffusion_Liste SET diffusion=2 WHERE email=:email");
    $Update->bindParam(':email', $Email, PDO::PARAM_INT);
    $Update->execute();

    $Valid="Votre demande a bien été pris en compte";
}
?>

<!DOCTYPE HTML>
<html>

<head>   
<meta charset="ISO-8859-15"/>
<base href="<?php echo $Home; ?>">

<title>Newsletter - <?php echo $Societe; ?></title>

<meta name="robots" content="noindex, nofollow"/>
<meta name="author" content="<?php echo $Societe; ?>"/>
<meta name="publisher" content="<?php echo $Publisher; ?>"/>
<meta name="reply-to" content="<?php echo $Destinataire; ?>"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<link rel="amphtml" href="<?php echo $PageActu; ?>" />

<link rel="shortcut icon" href="<?php echo $Home; ?>/lib/img/icone.ico" />
<link rel="stylesheet" type="text/css" media="screen AND (max-width: 480px)" href="<?php echo $Home; ?>/lib/css/misenpatel.css" />
<link rel="stylesheet" type="text/css" media="screen AND (min-width: 480px) AND (max-width: 960px)" href="<?php echo $Home; ?>/lib/css/misenpatab.css" />
<link rel="stylesheet" type="text/css" media="screen AND (min-width: 960px)" href="<?php echo $Home; ?>/lib/css/misenpapc.css" />

<script type="text/javascript" src="<?php echo $Home; ?>/lib/js/analys.js"></script>
</head>

<body>
<?php require_once($_SERVER['DOCUMENT_ROOT']."/lib/script/header.inc.php"); ?>

<center>
<section>
<article>
<?php if (isset($Erreur)) { echo "<font color='#FF0000'>".$Erreur."</font><BR />"; }
if (isset($Valid)) { echo "<font color='#009900'>".$Valid."</font><BR />"; } ?>

<H1>Désinscription</H1>   

Pour vous désinscrire de nos newsletters et listes de diffusion, veuillez saisir votre adresse e-mail. <BR />
La désinscription prendra effet sous 48 heures. <BR /><BR />

<form name="form_suppr" action="" method="POST">
<input type="email" name="email" required/><BR /><BR />

<input type="submit" name="Supprimer" value="Valider"/>
</form>

</article>
</section>
</center>

</body>
</html>