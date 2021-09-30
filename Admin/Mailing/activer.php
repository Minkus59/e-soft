<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/lib/script/fonction_perso.inc.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib/script/redirect.inc.php"); 

if ($Cnx_Admin!=TRUE) {
  header('location:'.$Home.'/Admin');
}

$Erreur=$_GET['erreur'];
$Id=$_GET['id'];

if ((!empty($_GET['id']))&&(isset($_POST['oui']))) {

    $Select=$cnx->prepare("SELECT * FROM ".$Prefix."neuro_Diffusion_Liste WHERE id=:id");
    $Select->bindParam(':id', $Id, PDO::PARAM_INT);
    $Select->execute();
    $Diffusion=$Select->fetch(PDO::FETCH_OBJ);

    if($Diffusion->diffusion!=0) {
        $Erreur="Impossible d'activer la diffusion sur cette email";
    }
    else {
        $Update=$cnx->prepare("UPDATE ".$Prefix."neuro_Diffusion_Liste SET diffusion=1 WHERE id=:id");
        $Update->bindParam(':id', $Id, PDO::PARAM_INT);
        $Update->execute();

        header('Location:'.$Home.'/Admin/Mailing/');
    }
}

if ((!empty($_GET['id']))&&(isset($_POST['non']))) {  
    header('Location:'.$Home.'/Admin/Mailing/');
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

Etes-vous sur de vouloir activer cette email ? </p>

<TABLE width="300">
<form action="" method="POST">
<TR><TD align="center"><input name="oui" type="submit" value="OUI"></TD><TD align="center"><input name="non" type="submit" value="NON"/></TD></TR>
</form></TABLE>

</article>
</section>
</div>
</CENTER>
</body>

</html>