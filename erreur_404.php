<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/lib/script/fonction_perso.inc.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib/script/requete.inc.php"); 
require_once($_SERVER['DOCUMENT_ROOT']."/lib/script/redirect.inc.php");                    
?>
<!DOCTYPE HTML>
<html>

<head>   
<meta charset="ISO-8859-15"/>
<meta content="og:article" property="og:type">
<meta content="<?php echo $SOEPage->titre ?>" property="og:site_name">
<meta content="<?php echo $SOEPage->titre ?>" property="og:title">
<meta content="<?php echo $Home; ?>/lib/img/En-tete.png" property="og:image">
<meta content="<?php echo $SOEPage->description ?>" property="og:description">
<meta content="<?php echo $Home; ?>" property="og:url">
<meta content="<?php echo $Home; ?>" itemprop="image">
<base href="<?php echo $Home; ?>">

<title><?php echo $SOEPage->titre ?></title>
<meta name="category" content="<?php if ($SOEPage->nom=="/") { echo "Accueil"; } else { echo $SOEPage->nom; } ?>" />
<meta name="description" content="<?php echo $SOEPage->description ?>" />

<meta name="keywords" content="agence digitale, web agency, creation site internet lille, creation site web lille, web agency lille, agence web lille, agence de communication, agence multim�dia, agence site internet lille, web agency nord,  creation de site web, agence web, creation site internet, realisation de site web, creation site ecommerce , refonte, webagency, web agency, agence de web, agence de communication, agence conseil en communication interactive, creation site intranet, agence de cr�ation de site internet, e-commerce, ecommerce, E-commerce, e-business, ebusiness, E-business, commerce electronique, marketing, site marchant, site ecommerce, site e-commerce, E-business">

<meta name="robots" content="index, follow"/>
<meta name="author" content="<?php echo $Societe; ?>"/>
<meta name="publisher" content="<?php echo $Publisher; ?>"/>
<meta name="reply-to" content="<?php echo $Destinataire; ?>"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<link rel="shortcut icon" href="<?php echo $Home; ?>/lib/img/icone.ico" />
<link rel="stylesheet" type="text/css" media="screen AND (max-width: 480px)" href="<?php echo $Home; ?>/lib/css/misenpatel.css" />
<link rel="stylesheet" type="text/css" media="screen AND (min-width: 480px) AND (max-width: 960px)" href="<?php echo $Home; ?>/lib/css/misenpatab.css" />
<link rel="stylesheet" type="text/css" media="screen AND (min-width: 960px)" href="<?php echo $Home; ?>/lib/css/misenpapc.css" />

<script type="text/javascript" src="<?php echo $Home; ?>/lib/js/analys.js"></script>
</head>

<body>
<?php require_once($_SERVER['DOCUMENT_ROOT']."/lib/script/header.inc.php"); ?>
    
<section>
    
<article>
<H1>ERREUR 404</H1></p><a href='<?php echo $Home; ?>'>Veuillez revenir à la page d'accueil !!</a>
</article>

</section>

</CENTER>
</body>
</html>