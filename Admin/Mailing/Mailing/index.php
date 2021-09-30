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

if (isset($_GET['id'])) { 
  $ParamMailling=$cnx->prepare("SELECT * FROM ".$Prefix."neuro_Param_Mailling WHERE id=:id");  
  $ParamMailling->BindParam(":id", $Id, PDO::PARAM_STR); 
  $ParamMailling->execute(); 
  $Param=$ParamMailling->fetch(PDO::FETCH_OBJ);
}

$ParamMaillingListe=$cnx->prepare("SELECT * FROM ".$Prefix."neuro_Param_Mailling");    
$ParamMaillingListe->execute(); 


if ((isset($_POST['Modifier']))&&(isset($_GET['id']))) {
     
    $_SESSION['mailling']=$_POST['mailling']; 
    $_SESSION['libele']=$_POST['libele']; 

    if (empty($_SESSION['mailling'])) {
        $Erreur="Un message doit etre saisie !";
    }
    elseif (empty($_SESSION['libele'])) {
        $Erreur="Un libélé doit etre saisie afin de retrouver votre mail !";
    }
    else {
      $Insert=$cnx->prepare("UPDATE ".$Prefix."neuro_Param_Mailling SET mailling=:mailling, libele=:libele WHERE id=:id");
      $Insert->BindParam(":id", $Id, PDO::PARAM_STR);
      $Insert->BindParam(":libele", $_SESSION['libele'], PDO::PARAM_STR);
      $Insert->BindParam(":mailling", $_SESSION['mailling'], PDO::PARAM_STR);
      $Insert->execute();

      if (!$Insert) {
          $Erreur="Erreur serveur, veuillez réessayer ultèrieurement !";
      }
      else  {     
          unset($_SESSION['mailling']); 
          unset($_SESSION['libele']); 
          $Valid="Mailling modifier avec succès";
          header("location:".$Home."/Admin/Mailing/Mailing/?valid=".urlencode($Valid));
      }
  } 
}

if ((isset($_POST['Enregistrer4']))&&(!isset($_GET['id']))) {
    $_SESSION['mailling']=$_POST['mailling']; 
    $_SESSION['libele']=$_POST['libele']; 

    if (empty($_SESSION['mailling'])) {
        $Erreur="Un message doit etre saisie !";
    }
    elseif (empty($_SESSION['libele'])) {
        $Erreur="Un libélé doit etre saisie afin de retrouver votre mail !";
    }
    else {
        $InsertParam=$cnx->prepare("INSERT INTO ".$Prefix."neuro_Param_Mailling (libele, mailling) VALUES(:libele, :mailling)");
        $InsertParam->bindParam(':libele', $_SESSION['libele'], PDO::PARAM_STR);
        $InsertParam->bindParam(':mailling', $_SESSION['mailling'], PDO::PARAM_STR);
        $InsertParam->execute();

        unset($_SESSION['mailling']); 
        unset($_SESSION['libele']);   
        $Valid="Mailling ajouter avec succès";
        header("location:".$Home."/Admin/Mailing/Mailing/?valid=".urlencode($Valid));
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

<div id="Form_Middle5">
<H1 class="TitreOrange">Mailing Type</H1>

<form name="SelectMode" action="" method="POST">
Message envoyé avec le Mailing <font color='#FF0000'>*</font> <BR /><BR />
<input type="text" name="libele" placeholder="Libélé*" value="<?php if (isset($_SESSION['libele'])) { echo $_SESSION['libele']; }  else { echo $Param->libele; } ?>"/><BR />

<textarea id="message" name="mailling" placeholder="Message*" require="required"><?php if (isset($_SESSION['mailling'])) { echo $_SESSION['mailling']; }  else { echo $Param->mailling; } ?></textarea>
<BR />
<span class="col_1"></span>
<?php
if (isset($_GET['id'])) { 
?>
<input type="submit" class="ButtonOrange" name="Modifier" value="Modifier"/>
<?php } 
else { ?>
<input type="submit" class="ButtonOrange" name="Enregistrer4" value="Enregistrer"/>
<?php } ?>
</form>
</div>

<H1 class="TitreOrange">Liste des mails enregistré</H1>

<table>
<tr>
      <th>Libélé</th>
      <th>E-mail</th>
      <th>Action</th>
      </tr>
<?php

while ($Page=$ParamMaillingListe->fetch(PDO::FETCH_OBJ)) {
?>
   <tr>
   <td><?php echo $Page->libele; ?></td>
   <td><?php echo $Page->mailling; ?></td>
   <td>
   <?php 
   echo '<a href="'.$Home.'/Admin/Mailing/Mailing/?id='.$Page->id.'"><img src="'.$Home.'/Admin/lib/img/modifier.png"></a>';
   echo '<a title="Supprimer" href="'.$Home.'/Admin/Mailing/Mailing/supprimer.php?id='.$Page->id.'"><img src="'.$Home.'/Admin/lib/img/supprimer.png"></a></td></tr>';
}
?>
</table>
</article>
</section>
</div>
</CENTER>
</body>

</html>