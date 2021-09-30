<?php 
$Erreur=$_GET['erreur'];
$Valid=$_GET['valid'];
?>
<center>
<section>
<?php require_once($_SERVER['DOCUMENT_ROOT']."/lib/script/nav.inc.php"); ?>

<?php
if ($Count>0) {
    while($Actu=$RecupArticle->fetch(PDO::FETCH_OBJ)) { 
      ?>
      <script type="application/ld+json">
      {
        "@context": "http://schema.org",
        "@type": "Article",
        "headline": "<?php echo $SOEPage->titre; ?>",
        "articleSection": "<?php echo $SOEPage->libele; ?>",
        "articleBody": "<?php echo $SOEPage->description; ?>",
        "datePublished": "<?php echo date('d/m/Y',$Actu->created); ?>",
        "dateModified": "<?php echo date('d/m/Y',$Actu->created); ?>",
        "creator": "<?php echo $Publisher; ?>",
        "author": "<?php echo $Publisher; ?>",
        "publisher": "<?php echo $Societe; ?>",
        "image": "http://www.neuro-soft.fr/lib/img/image/Fond-Melle-Mot.jpg",
        "mainEntityOfPage": "True"
      }
      </script>
      <?php
        echo '
        <article>';

        if (isset($Erreur)) { echo "<font color='#FF0000'>".$Erreur."</font><BR />"; } 
        if (isset($Valid)) { echo "<font color='#00CC00'>".$Valid."</font><BR />"; }

        echo "<span>".$Actu->message."</span><BR />";

        if ($Cnx_Admin==true) { 
            echo '<a href="'.$Home.'/Admin/Article/Nouveau/?id='.$Actu->id.'"><img src="'.$Home.'/Admin/lib/img/modifier.png"></a><a href="'.$Home.'/Admin/Article/supprimer.php?id='.$Actu->id.'"><img src="'.$Home.'/Admin/lib/img/supprimer.png"></a>';
        } 
        echo '</article>';
    }
}
else {
    echo '<article>
    Aucun article pour le moment !
    </article>';
}
?>

<div id="Devis">
<article>
<?php 
$ErreurDevis=$_GET['erreurDevis'];
$ValidDevis=$_GET['validDevis'];

if (isset($ErreurDevis)) { echo "<font color='#333'>".$ErreurDevis."</font><BR />"; } 
if (isset($ValidDevis)) { echo "<font color='#00CC00'>".$ValidDevis."</font><BR />"; }
?>
<table>
<form name="form_devis" id="form_devis" action="<?php echo $Home; ?>/lib/script/devis.php" method="POST">
<tbody>
<tr>
<td align="right">
<input type="hidden" value="<?php echo $PageActu; ?>" name="page"/>
<input type="text" value="<?php if (isset($_SESSION['nom'])) { echo $_SESSION['nom']; } ?>" name="nom" placeholder="Nom / Prénom*" required="required">
</td>
<td rowspan="2" align="left"><textarea name="message" placeholder="Détailler votre demande*" required="required"><?php if (isset($_SESSION['message'])) { echo $_SESSION['message']; } ?></textarea></td>
</tr>
<tr>
<td align="right"><input type="email" value="<?php if (isset($_SESSION['email'])) { echo $_SESSION['email']; } ?>" name="email" placeholder="Votre adresse e-mail*" required="required"/></td>
</tr>
<tr>
<td align="right"><input type="submit" name="Envoyer" value="Envoyer"/></td>
<td align="left"><font color='#FF0000'>*</font> : Informations requises</td>
</tr>
</tbody>
</form>
</table>
</article>
</div>

<?php require_once($_SERVER['DOCUMENT_ROOT']."/lib/script/footer.inc.php"); ?>
</section>
</center>

<script type="application/ld+json">
{ "@context" : "http://schema.org/",
  "@type" : "LocalBusiness",
  "url" : "<?php echo $PageActu; ?>",
  "email" : "<?php echo $Destinataire; ?>",
  "logo" : "http://neuro-soft.fr/lib/img/En-tete.png",
  "name" : "<?php echo $Societe; ?>", 
  "address" : "<?php echo $Adresse; ?>", 
  "foundingDate" : "28/01/2015",
  "areaServed" : "Lille",
  "contactPoint" : [
    { "@type" : "ContactPoint",
      "telephone" : "+33320645422",
      "contactType" : "customer service",
      "areaServed" : "FR"
    } , {
      "@type" : "ContactPoint",
      "telephone" : "+33783202963",
      "contactType" : "customer service",
      "areaServed" : "FR"
    } , {
      "@type" : "ContactPoint",
      "telephone" : "+33652660645",
      "contactType" : "technical support",
      "areaServed" : "FR"
    } 
  ]
}
</script>

<script type="application/ld+json">
{ "@context" : "http://schema.org",
  "@type" : "Organization",
  "url" : "<?php echo $PageActu; ?>",
  "email" : "<?php echo $Destinataire; ?>",
  "logo" : "http://neuro-soft.fr/lib/img/En-tete.png",
  "name" : "<?php echo $Societe; ?>", 
  "address" : "<?php echo $Adresse; ?>", 
  "foundingDate" : "28/01/2015",
  "founder" : "<?php echo $Publisher; ?>",
  "sameAs" : [ "https://www.facebook.com/NeuroSoftTeam",
  "https://twitter.com/neurosoftteam",
  "https://plus.google.com/u/0/b/110533102167855907487/110533102167855907487/about"]
}
</script>