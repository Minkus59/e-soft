<?php 
$Erreur=$_GET['erreur'];
$Valid=$_GET['valid'];

session_start();
?>
<center>
<section>
<?php require_once($_SERVER['DOCUMENT_ROOT']."/lib/script/nav.inc.php"); ?>
    
<article itemtype="http://schema.org/LocalBusiness">
<?php 
if (isset($Erreur)) { echo "<font color='#FF0000'>".$Erreur."</font><BR />"; } 
if (isset($Valid)) { echo "<font color='#00CC00'>".$Valid."</font><BR />"; }
?>

<H1>Contact</H1></p>

Pour toutes questions commerciales ou techniques : <?php echo $Telephone; ?></p>

Par e-mail : <b><span itemprop="email"><?php echo $Destinataire; ?></span></b> ou via le <b>formulaire ci-dessous</b> </p>

<form name="form_contact" id="form_contact" action="<?php echo $Home; ?>/lib/script/contact.php" method="POST">
<input type="email" value="<?php if (isset($_SESSION['email'])) { echo $_SESSION['email']; } ?>" name="email" placeholder="Votre adresse e-mail*" required="required"/><BR />
<input type="text" value="<?php if (isset($_SESSION['nom'])) { echo $_SESSION['nom']; } ?>" name="nom" placeholder="Nom / Prénom*" required="required"><BR /><BR />
<textarea cols="40" rows="10" name="message" placeholder="Message ou détailles pour devis*" required="required"><?php if (isset($_SESSION['message'])) { echo $_SESSION['message']; } ?></textarea><BR /><BR />
<input type="submit" name="Envoyer" value="Envoyer"/>

</form><BR />

<font color='#FF0000'>*</font> : Informations requises<BR /><BR />

</article>

<?php
if ($Count>0) {

    while($Actu=$RecupArticle->fetch(PDO::FETCH_OBJ)) { 
      ?>
      <script type="application/ld+json">
      {
        "@context": "http://schema.org",
        "@type": "Article",
        "headline": "<?php echo $SOEPage->titre; ?>",
        "keywords": ["<?php echo $KeyWord; ?>"],
        "datePublished": "<?php echo date("d/m/Y",$Actu->created); ?>",
        "articleSection": "entertainment",
        "creator": "<?php echo $Publisher; ?>",
        "author": "<?php echo $Publisher; ?>",
        "articleBody": "<?php echo $Actu->message; ?>",
        "mainEntityOfPage": "True"
      }
      </script>
      <?php
        echo '
        <article>';

        echo $Actu->message;
        if (($Cnx_Admin==true)||($Cnx_Client==true)) { 
            echo '<a href="'.$Home.'/Admin/Article/Nouveau/?id='.$Actu->id.'"><img src="'.$Home.'/Admin/lib/img/modifier.png"></a><a href="'.$Home.'/Admin/Article/supprimer.php?id='.$Actu->id.'"><img src="'.$Home.'/Admin/lib/img/supprimer.png"></a>';
        } 
        echo '</article>';
    }
}
?>

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

