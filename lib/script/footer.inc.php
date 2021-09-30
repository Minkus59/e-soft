<footer>
    <div id="Cadre1">
        <li><a href='<?php echo $Home; ?>'><img itemprop="logo" src='<?php echo $ParamLogoFooter->logo; ?>'/></a></li>
    </div>

    <div id="Cadre2">
    <H3>Nos Services</H3>
    <ul>
        <li <?php if ($PageActu==$Home."/") { echo "class='Up'"; } ?>><a href="<?php echo $Home; ?>">Accueil</a></li>
        <?php
        while ($PageFooter=$SelectPageActifFooter->fetch(PDO::FETCH_OBJ)) {
        ?>
            <li <?php if ($PageActu==$Home.$PageFooter->lien) { echo "class='Up'"; } ?>><a href="<?php echo $Home.$PageFooter->lien ?>"><?php echo $PageFooter->libele ?></a>

            <?php 
            $SelectSousMenuFooter=$cnx->prepare("SELECT * FROM ".$Prefix."neuro_Page WHERE parrin=:parrin AND sous_menu='1' ORDER BY position ASC");
            $SelectSousMenuFooter->bindParam(':parrin', $PageFooter->lien, PDO::PARAM_STR);
            $SelectSousMenuFooter->execute();
            $CountSousMenu=$SelectSousMenuFooter->rowCount();

            if ($CountSousMenu>0) {
                echo "<ul>";
                while ($SousMenuFooter=$SelectSousMenuFooter->fetch(PDO::FETCH_OBJ)) { ?>
                    <li <?php if ($PageActu==$Home.$SousMenuFooter->lien) { echo "class='Up'"; } ?>><a href="<?php echo $Home.$SousMenuFooter->lien ?>"><?php echo $SousMenuFooter->libele ?></a></li>
                <?php 
                }
                echo "</ul></li>";
            }
        } ?>
        <li <?php if ($PageActu==$Home."/Contact/") { echo "class='Up'"; } ?>><a href="<?php echo $Home; ?>/Contact/">Contact</a></li>
        <li <?php if ($PageActu==$Home."/Mentions-legales/") { echo "class='Up'"; } ?>><a href="<?php echo $Home; ?>/Mentions-legales/">Mentions-légales</a></li>
    </ul>
    </div>

    <div id="Cadre3">  
        <H3>Informations & contact</H3>
    <ul>
        <li itemprop="telephone"><img src='<?php echo $Home; ?>/lib/img/tel.png'/> <?php echo $Telephone; ?></li>
        <li itemprop="email"><img src='<?php echo $Home; ?>/lib/img/adresse.png'/> <?php echo $Destinataire; ?></li><BR />
        <img src='<?php echo $Home; ?>/lib/img/Femme.png'/>
    </ul>
    </div>
</div>
<div id="NeuroSoft">
<a href="<?php echo $Home; ?>" target="_blank" title="<?php echo $Societe; ?> - Agence de communication"><img src="<?php echo $Home; ?>/lib/img/En-tete.png" alt="<?php echo $Societe; ?> - Agence de communication"/></a>
</div>

<div id="RDV">
<img src="<?php echo $Home; ?>/lib/img/Rendez-vous-telephonique.png" alt="Rappel téléphonique"/>
<div id="RDV_Tel">
<form name="form_rdv" action="<?php echo $Home; ?>/lib/script/rdv.php" method="POST">
<input type="hidden" name="page" value="<?php echo $PageActu; ?>">
<input type="text" class="rdv" placeholder="<?php echo $Telephone; ?>" required="required" name="rdv">
<input type="submit" class="valid" name="Valid" value=" "/>
</form>
</div>
</footer>