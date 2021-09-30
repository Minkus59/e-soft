<header>
    <div id="Logo">    
        <li><a href='<?php echo $Home; ?>'><img src="<?php echo $ParamLogoHeader->logo; ?>"/></li><span><img src="<?php echo $Home; ?>/lib/img/neurone.png"/></span></a>
    </div>
        <nav>
            <ul itemscope itemtype="http://www.schema.org/SiteNavigationElement">
                <a itemprop="url" href="<?php echo $Home; ?>"><li itemprop="name" <?php if (($PageActu==$Home."/")||($PageParrin->parrin==$Home."/")) { echo "class='Up'"; } ?>>Accueil</li><span <?php if (($PageActu==$Home."/")||($PageParrin->parrin==$Home."/")) { echo "class='Up'"; } ?>><img src="<?php echo $PageLibeleAccueil->image; ?>"/></span></a>
                <?php
                while ($Page=$SelectPageActif->fetch(PDO::FETCH_OBJ)) {
                ?>
                    <a itemprop="url" href="<?php echo $Home.$Page->lien ?>"><li itemprop="name" <?php if (($PageActu==$Home.$Page->lien)||($PageParrin->parrin==$Page->lien)) { echo "class='Up'"; } ?>><?php echo $Page->libele ?></li><span <?php if (($PageActu==$Home.$Page->lien)||($PageParrin->parrin==$Page->lien)) { echo "class='Up'"; } ?>><img src="<?php echo $Page->image; ?>"/></span></a>
                <?php 
                } ?>
                <a itemprop="url" href="<?php echo $Home; ?>/Contact/"><li itemprop="name" <?php if (($PageActu==$Home."/Contact/")||($PageParrin->parrin==$Home."/Contact/")) { echo "class='Up'"; } ?>>Contact</li><span <?php if (($PageActu==$Home."/Contact/")||($PageParrin->parrin==$Home."/Contact/")) { echo "class='Up'"; } ?>><img src="<?php echo $PageLibeleContact->image; ?>"/></span></a>
            </ul>
        </nav>
</header>