<?php 
if ($CountSousMenu>0) {
    echo '<div id="Menu"><ul itemscope itemtype="http://www.schema.org/SiteNavigationElement">';
    while ($SousMenu=$SelectSousMenu->fetch(PDO::FETCH_OBJ)) { ?>
        <a itemprop="url" href="<?php echo $Home.$SousMenu->lien ?>"><li itemprop="name" <?php if ($PageActu==$Home.$SousMenu->lien) { echo "class='Up'"; } ?>><?php echo $SousMenu->libele ?></li></a>
    <?php 
    }
    echo "</ul></div>";
}
?>