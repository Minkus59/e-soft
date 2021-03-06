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
$Id=$_GET['id'];
$Now=time();

if (isset($_POST['StatuePage'])) {
   $_SESSION['StatuePage']=$_POST['StatuePage'];
}

if ((!isset($_SESSION['StatuePage']))||($_SESSION['StatuePage']=="NULL")) {
     $Select=$cnx->prepare("SELECT * FROM ".$Prefix."neuro_Article");
     $Select->execute();
}
else {
     $Select=$cnx->prepare("SELECT * FROM ".$Prefix."neuro_Article WHERE page=:page position ASC, page ASC");
     $Select->bindParam(':page', $_SESSION['StatuePage'], PDO::PARAM_STR);
     $Select->execute();
}

$SelectPage=$cnx->prepare("SELECT * FROM ".$Prefix."neuro_Page");
$SelectPage->execute();
    
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

<H1>Liste des articles</H1></p>

<form name="FormPage" action="" method="POST">
<select name="StatuePage" required="required" onChange="this.form.submit()">
      
<option value="NULL" <?php if ($_SESSION['StatuePage']=="NULL") { echo "selected"; } ?>>Tous</option>
<?php while ($Page=$SelectPage->fetch(PDO::FETCH_OBJ)) { ?>
<option value='<?php echo $Page->lien; ?>' <?php if ($_SESSION['StatuePage']== $Page->lien) { echo "selected"; } ?>><?php echo $Page->libele; ?></option>
<?php } ?>

</select></p>
</form>

<table>
<tr><th>Position</th><th>Lien de page</th><th>Date de cr??ation</th><th>Action</th></tr>
<?php

while ($Article=$Select->fetch(PDO::FETCH_OBJ)) {
?>
   <tr <?php if ($Article->statue==0) { echo "class='rouge'"; } else { echo "class='vert'"; } ?>>
   <td><?php echo $Article->position; ?></td>
   <td><?php echo $Article->page; ?></td>
   <td><?php echo date("d-m-Y", time($Article->created)); ?></td>
   <td><?php echo '<a title="Apper??u" href="'.$Home.$Article->page.'"><img src="'.$Home.'/Admin/lib/img/apercu.png"></a>';
   echo '<a href="'.$Home.'/Admin/Article/Nouveau/?id='.$Article->id.'"><img src="'.$Home.'/Admin/lib/img/modifier.png"></a>';
   if ($Article->statue==1) { ?>
        <a title="D??sactiver" href="<?php echo $Home; ?>/Admin/Article/desactiver.php?id=<?php echo $Article->id; ?>"><img src="<?php echo $Home; ?>/Admin/lib/img/desactiver.png" alt="D??sactiver"></a>
  <?php } else { ?>
        <a title="Activer" href="<?php echo $Home; ?>/Admin/Article/activer.php?id=<?php echo $Article->id; ?>"><img src="<?php echo $Home; ?>/Admin/lib/img/activer.png" alt="Activer"></a>
  <?php } 
        echo '<a title="Supprimer" href="'.$Home.'/Admin/Article/supprimer.php?id='.$Article->id.'"><img src="'.$Home.'/Admin/lib/img/supprimer.png"></a></td></tr>';
}
?>
</table>

</article>
</section>
</div>
</CENTER>
</body>

</html>