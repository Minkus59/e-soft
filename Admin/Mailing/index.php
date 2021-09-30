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

$SelectClient=$cnx->prepare("SELECT * FROM ".$Prefix."neuro_Diffusion_Liste");
$SelectClient->execute();
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
   
<H1>Liste de diffusion</H1>   

Ajouter une adresse email <BR />

<form name="form_ajout" action="<?php echo $Home; ?>/Admin/Mailing/ajouter.php" method="POST">
<input type="text" name="email" required/><BR />

<select name="diffusion" required>
<option value="1">Oui</option>
<option value="2">Non</option>
</select>
<BR /><BR />

<input type="submit" name="Ajouter" value="Ajouter"/>
</form>

<BR /><HR /><BR />

<table width=900>
<tr>
    <th>
        Email
    </th>
    <th>
        Diffusion
    </th>
    <th>
        Action
    </th>
</tr>
<?php
while($Liste=$SelectClient->fetch(PDO::FETCH_OBJ)) { ?>
    <tr <?php if ($Liste->diffusion=="1") { echo 'class="vert"'; } elseif ($Liste->diffusion=="2") { echo 'class="gris"'; } else { echo 'class="rouge"'; } ?> >
        <td>
            <?php echo stripslashes($Liste->email); ?>
        </td>
        <td>
            <?php echo $Liste->diffusion; ?>
        </td>
        <td>
        <?php 
            if ($Liste->diffusion==1) { 
                echo '<a title="Désactiver" href="'.$Home.'/Admin/Mailing/desactiver.php?id='.$Liste->id.'"><img src="'.$Home.'/Admin/lib/img/desactiver.png" alt="Désactiver"></a>';
            } 
            else { 
                echo '<a title="Activer" href="'.$Home.'/Admin/Mailing/activer.php?id='.$Liste->id.'"><img src="'.$Home.'/Admin/lib/img/activer.png" alt="Activer"></a>';
            } 
            echo '<a title="Supprimer" href="'.$Home.'/Admin/Mailing/supprimer.php?id='.$Liste->id.'"><img src="'.$Home.'/Admin/lib/img/supprimer.png"></a></td></tr>';
            ?>
        </td>
    </tr>
<?php
}
?>
</table><BR />

</form>

</article>
</section>
</div>
</CENTER>
</body>

</html>