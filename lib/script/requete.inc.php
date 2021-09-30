<?php 
$PageActu=$_SERVER['REQUEST_URI'];
$PageActu2=$_SERVER['REQUEST_URI'];

$RecupArticle=$cnx->prepare("SELECT * FROM ".$Prefix."neuro_Article WHERE page=:page AND statue='1' ORDER BY position ASC");
$RecupArticle->bindParam(':page', $PageActu2, PDO::PARAM_STR);
$RecupArticle->execute();
$Count=$RecupArticle->rowcount();

$SelectPageActif=$cnx->prepare("SELECT * FROM ".$Prefix."neuro_Page WHERE statue='1' AND sous_menu='0' ORDER BY position ASC");
$SelectPageActif->execute();

$SelectPageActifFooter=$cnx->prepare("SELECT * FROM ".$Prefix."neuro_Page WHERE statue='1' AND sous_menu='0' ORDER BY position ASC");
$SelectPageActifFooter->execute();

$SelectPageSOE=$cnx->prepare("SELECT * FROM ".$Prefix."neuro_Page WHERE lien=:page");
$SelectPageSOE->bindParam(':page', $PageActu2, PDO::PARAM_STR);
$SelectPageSOE->execute();
$SOEPage=$SelectPageSOE->fetch(PDO::FETCH_OBJ);

$HOME="/";
$SelectLibeleAccueil=$cnx->prepare("SELECT * FROM ".$Prefix."neuro_Page WHERE lien=:lien");
$SelectLibeleAccueil->bindParam(':lien', $HOME, PDO::PARAM_STR);
$SelectLibeleAccueil->execute();
$PageLibeleAccueil=$SelectLibeleAccueil->fetch(PDO::FETCH_OBJ);

$CONTACT="/Contact/";
$SelectLibeleContact=$cnx->prepare("SELECT * FROM ".$Prefix."neuro_Page WHERE lien=:lien");
$SelectLibeleContact->bindParam(':lien', $CONTACT, PDO::PARAM_STR);
$SelectLibeleContact->execute();
$PageLibeleContact=$SelectLibeleContact->fetch(PDO::FETCH_OBJ);

$SelectParamLogoFooter=$cnx->prepare("SELECT * FROM ".$Prefix."neuro_Logo WHERE id='1'");    
$SelectParamLogoFooter->execute(); 
$ParamLogoFooter=$SelectParamLogoFooter->fetch(PDO::FETCH_OBJ);

$SelectParamLogoHeader=$cnx->prepare("SELECT * FROM ".$Prefix."neuro_Logo WHERE id='2'");    
$SelectParamLogoHeader->execute(); 
$ParamLogoHeader=$SelectParamLogoHeader->fetch(PDO::FETCH_OBJ);

$SelectActu=$cnx->prepare("SELECT * FROM ".$Prefix."neuro_Page WHERE lien=:lien");
$SelectActu->bindParam(':lien', $PageActu2, PDO::PARAM_STR);
$SelectActu->execute();
$PageParrin=$SelectActu->fetch(PDO::FETCH_OBJ);

$SelectSousMenu=$cnx->prepare("SELECT * FROM ".$Prefix."neuro_Page WHERE parrin=:parrin OR parrin=:lien ORDER BY position ASC");
$SelectSousMenu->bindParam(':parrin', $PageParrin->parrin, PDO::PARAM_STR);
$SelectSousMenu->bindParam(':lien', $PageParrin->lien, PDO::PARAM_STR);
$SelectSousMenu->execute();
$CountSousMenu=$SelectSousMenu->rowCount();
?>