<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/lib/script/fonction_perso.inc.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib/script/requete.inc.php"); 
require_once($_SERVER['DOCUMENT_ROOT']."/lib/script/redirect.inc.php");                    
?>
<!DOCTYPE HTML>
<html>

<head>   
<base href="<?php echo $Home; ?>">

<meta property="og:site_name" content="<?php echo $Societe; ?>" /> 
<meta property="fb:admins" content="<?php echo $IdFacebook; ?>" /> 
<meta property="fb:page_id" content="<?php echo $IdPageFacebook; ?>" /> 
<meta property="og:type" content="<?php echo $TypeFacebook; ?>" />
<meta property="og:image" content="<?php echo $ImgFacebook; ?>" /> 
<meta property="og:url" content="<?php echo $Home; ?>" /> 
<meta property="og:title" content="<?php echo $SOEPage->titre ?>" /> 
<meta property="og:description" content="<?php echo $SOEPage->description ?>" />
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

<?php require_once($_SERVER['DOCUMENT_ROOT']."/lib/article/Page.inc.php"); ?>
</body>
</html>