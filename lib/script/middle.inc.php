<div id="Center">
<?php 
$Page=array("1"=>$Home."", "2"=>$Home."/Agence-print-lille/", "3"=>$Home."/Creation-de-site-internet-lille/", "4"=>$Home."/Referencement-site-internet-lille/", "5"=>$Home."/Visite-Virtuelle-360-lille/");

if ($PageActu==$Page[1]) {
  echo '<img class="imgFond" src="'.$Home.'/lib/img/Slider/creation-site-internet" alt="Agence de communication - <?php echo $Societe; ?>">';     ?>
  <div id="logo" class="Seul">
  <a href="<?php echo $Home; ?>"><img src="<?php echo $Home; ?>/lib/img/En-tete.png" alt="<?php echo $Societe; ?>"/></a>
  </div>
  <div id="tel" class="Seul2">
  03 20 64 54 22
  </div>
  </div><?php
}
elseif ($PageActu==$Page[2]) {
  echo '<img class="imgFond" src="'.$Home.'/lib/img/Slider/refonte-site-internet" alt="Agence de communication - <?php echo $Societe; ?>">';      ?>
  <div id="logo" class="Seul">
  <a href="<?php echo $Home; ?>"><img src="<?php echo $Home; ?>/lib/img/En-tete.png" alt="<?php echo $Societe; ?>"/></a>
  </div>
  <div id="tel" class="Seul2">
  03 20 64 54 22
  </div>
  </div><?php
}
elseif ($PageActu==$Page[3]) {
  echo '<img class="imgFond" src="'.$Home.'/lib/img/Slider/savoir_faire" alt="Agence de communication - <?php echo $Societe; ?>">'; ?>
  <div id="bandeCentre">
    <div id="site"> <img  src="<?php echo $Home; ?>/lib/img/site-fait/Doc-Devis.jpg" alt="Doc-devis - <?php echo $Societe; ?>"> </div>
    <div id="site"> <img  src="<?php echo $Home; ?>/lib/img/site-fait/Emilie Lothaire.jpg" alt="Emilie Lothaire - <?php echo $Societe; ?>"> </div>
    <div id="site"> <img  src="<?php echo $Home; ?>/lib/img/site-fait/Le PtitBelgique.jpg" alt="le p'tit Belgique - <?php echo $Societe; ?>"> </div>
    <div id="site"> <img  src="<?php echo $Home; ?>/lib/img/site-fait/Mobiltech.jpg" alt="Mobiletech - <?php echo $Societe; ?>"> </div>
    <div id="site"> <img  src="<?php echo $Home; ?>/lib/img/site-fait/FastRepairMobile.jpg" alt="Fast Repair Mobile - <?php echo $Societe; ?>"> </div>
    <div id="site"> <img  src="<?php echo $Home; ?>/lib/img/site-fait/Soup chez vous.jpg" alt="Soup Chez Vous - <?php echo $Societe; ?>"> </div>
    <div id="site"> <img  src="<?php echo $Home; ?>/lib/img/site-fait/VivreMobile.jpg" alt="Vivre Mobile - <?php echo $Societe; ?>"> </div>
  </div>
  <div id="logo" class="PasSeul">
  <a href="<?php echo $Home; ?>/"><img src="<?php echo $Home; ?>/lib/img/En-tete.png" alt="<?php echo $Societe; ?>"/></a>
  </div>
  <div id="tel" class="PasSeul2">
  03 20 64 54 22
  </div>
  </div>
<?php }
elseif ($PageActu==$Page[4]) {
  echo '<img class="imgFond" src="'.$Home.'/lib/img/Slider/referencement-site-internet" alt="Agence de communication - <?php echo $Societe; ?>">'; ?>
  <div id="engrenage1">
    <img  src="<?php echo $Home; ?>/lib/img/engrenage1" alt="Engrenage1 - <?php echo $Societe; ?>">
  </div>
  <div id="engrenage2">
    <img  src="<?php echo $Home; ?>/lib/img/engrenage-petit" alt="Engrenage2 - <?php echo $Societe; ?>">
  </div>
  <div id="logo" class="PasSeul3">
  <a href="<?php echo $Home; ?>/"><img src="<?php echo $Home; ?>/lib/img/En-tete.png" alt="<?php echo $Societe; ?>"/></a>
  </div>
  <div id="tel" class="PasSeul4">
  03 20 64 54 22
  </div>
  </div><?php
   }
elseif ($PageActu==$Page[5]) { ?>
        <!--[if !IE]><!-->
        <script type="text/javascript" src="<?php echo $Home ?>/LaVisite360/Visite-virtuelle/Ville-3D/indexdata/lib/jquery-2.0.3.min.js"></script>
        <!--<![endif]-->
        <!--[if lte IE 8]>
        <script type="text/javascript" src="<?php echo $Home ?>/LaVisite360/Visite-virtuelle/Ville-3D/indexdata/lib/jquery-1.10.2.min.js"></script>
        <![endif]-->
        <!--[if gt IE 8]>
        <script type="text/javascript" src="<?php echo $Home ?>/LaVisite360/Visite-virtuelle/Ville-3D/indexdata/lib/jquery-2.0.3.min.js"></script>
        <![endif]-->
        
        <script type="text/javascript">
        function readDeviceOrientation() {
            // window.innerHeight is not supported by IE
            var winH = window.innerHeight ? window.innerHeight : jQuery(window).height();
            var winW = window.innerWidth ? window.innerWidth : jQuery(window).width();
            //force height for iframe usage
            if(!winH || winH == 0){
                winH = '100%';
            }
            // set the height of the document
            jQuery('html').css('height', winH);
            // scroll to top
            window.scrollTo(0,0);
        }
        jQuery( document ).ready(function( jQuery ) {
            if (/(iphone|ipod|ipad|android|iemobile|webos|fennec|blackberry|kindle|series60|playbook|opera\smini|opera\smobi|opera\stablet|symbianos|palmsource|palmos|blazer|windows\sce|windows\sphone|wp7|bolt|doris|dorothy|gobrowser|iris|maemo|minimo|netfront|semc-browser|skyfire|teashark|teleca|uzardweb|avantgo|docomo|kddi|ddipocket|polaris|eudoraweb|opwv|plink|plucker|pie|xiino|benq|playbook|bb|cricket|dell|bb10|nintendo|up.browser|playstation|tear|mib|obigo|midp|mobile|tablet)/.test(navigator.userAgent.toLowerCase())) {
                // add event listener on resize event (for orientation change)
                jQuery(window).resize(function() {
                    readDeviceOrientation();
                });
                // initial execution
                readDeviceOrientation();
            }
        });
        </script>
        <div id="container">
            <div id="tourDIV">
                <div id="panoDIV">
                    <noscript>
                        
                        <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="100%" height="100%" id="<?php echo $Home ?>/LaVisite360/Visite-virtuelle/Ville-3D/indexdata/index">
                            <param name="movie" value="<?php echo $Home ?>/LaVisite360/Visite-virtuelle/Ville-3D/indexdata/index.swf"/>
                            <param name="allowFullScreen" value="true"/>
                            <!--[if !IE]>-->
                            <object type="application/x-shockwave-flash" data="<?php echo $Home ?>/LaVisite360/Visite-virtuelle/Ville-3D/indexdata/index.swf" width="100%" height="100%">
                                <param name="movie" value="<?php echo $Home ?>/LaVisite360/Visite-virtuelle/Ville-3D/indexdata/index.swf"/>
                                <param name="allowFullScreen" value="true"/>
                                <!--<![endif]-->
                                <a href="http://www.adobe.com/go/getflash">
                                    <img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player"/>
                                </a>
                            <!--[if !IE]>-->
                            </object>
                            <!--<![endif]-->
                        </object>
                        
                    </noscript>
                </div>
            </div>
   </div>       
                <script type="text/javascript" src="<?php echo $Home ?>/LaVisite360/Visite-virtuelle/Ville-3D/indexdata/index.js"></script>
                <script type="text/javascript">
                    embedpano({
                    
                    swf:"<?php echo $Home ?>/LaVisite360/Visite-virtuelle/Ville-3D/indexdata/index.swf"
                    
                    ,target:"panoDIV"
                    ,passQueryParameters:true
                    
                    
                    });
                </script>

  <div id="logo" class="PasSeul5">
  <a href="<?php echo $Home; ?>/"><img src="<?php echo $Home; ?>/lib/img/En-tete.png" alt="<?php echo $Societe; ?>"/></a>
  </div>
  <div id="tel" class="PasSeul6">
  03 20 64 54 22
  </div>
  </div><?php
   }
else {
  $Rand=rand(1, 3); 
  if ($Rand=="1") {
  echo '<img class="imgFond" src="'.$Home.'/lib/img/Slider/creation-site-internet.jpg" alt="Agence de communication - <?php echo $Societe; ?>">';
  ?>
  <div id="logo" class="Seul">
  <a href="<?php echo $Home; ?>/"><img src="<?php echo $Home; ?>/lib/img/En-tete.png" alt="<?php echo $Societe; ?>"/></a>
  </div>
  <div id="tel" class="Seul2">
  03 20 64 54 22
  </div>
  </div> <?php
  }
  if ($Rand=="2") {
  echo '<img class="imgFond" src="'.$Home.'/lib/img/Slider/refonte-site-internet.jpg" alt="Agence de communication - <?php echo $Societe; ?>">';
  ?>
  <div id="logo" class="Seul">
  <a href="<?php echo $Home; ?>/"><img src="<?php echo $Home; ?>/lib/img/En-tete.png" alt="<?php echo $Societe; ?>"/></a>
  </div>
  <div id="tel" class="Seul2">
  03 20 64 54 22
  </div>
  </div> <?php
  }
  if ($Rand=="3") {
    echo '<img class="imgFond" src="'.$Home.'/lib/img/Slider/referencement-site-internet" alt="Agence de communication - <?php echo $Societe; ?>">';
  ?>
  <div id="logo" class="Seul">
  <a href="<?php echo $Home; ?>/"><img src="<?php echo $Home; ?>/lib/img/En-tete.png" alt="<?php echo $Societe; ?>"/></a>
  </div>
  <div id="tel" class="Seul2">
  03 20 64 54 22
  </div>
  </div> <?php
  }
}
?>