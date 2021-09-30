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

$SelectMail=$cnx->prepare("SELECT * FROM ".$Prefix."neuro_Mail ORDER BY id DESC");
$SelectMail->execute();  
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

<H1>Liste des e-mails envoyé</H1></p>

<table>
<tr>
    <th>Destinataire</th>
    <th>Objet</th>
    <th>Type</th>
    <th>Date</th>
</tr>
<?php

while ($Mail=$SelectMail->fetch(PDO::FETCH_OBJ)) {
$pattern ='/[, ]/';
$replace = '<BR />';
$Adresse = preg_replace($pattern, $replace, $Mail->destinataire);
?>
   <tr>
   <td><?php echo $Adresse; ?></td>
   <td><?php echo $Mail->objet; ?></td>
   <td><?php echo $Mail->type; ?></td>
   <td><?php echo date("d-m-Y", $Mail->created); ?></td>
   </tr>
<?php
}
?>
</table>

</article>
</section>
</div>
</CENTER>
</body>

</html>