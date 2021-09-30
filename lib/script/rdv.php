<?php 
require($_SERVER['DOCUMENT_ROOT']."/lib/script/fonction_perso.inc.php"); 
  
if (isset($_POST['Valid'])) {

   $Page=$_POST['page'];
   $Tel=FiltreTel('rdv');

   if ($Tel[0]===false) {
      $Erreur=$Tel[1];
   }
   else {
      $Tel=$Tel;
   }

  if (!isset($Erreur)) { 
    $boundary = md5(uniqid(mt_rand()));
    
    $Entete = "MIME-Version: 1.0\n";
    $Entete .= "Content-Type:multipart/mixed; boundary=\"$boundary\"\n";
    $Entete .= "From: \"$Societe"\"<$Serveur>\n";
    $Entete .= "Reply-to: \"$Societe"\"<$Destinataire>\n";
    $Entete .= "\n";
    
    $Message_mail="Ce message est au format MIME.\n";
    
    $Message_mail.="--$boundary\n";
    $Message_mail.= "content-type: text/html; charset=iso-8859-1\n";
  
    $Message_mail.="\n";
    $Message_mail.="<html><head><title>Rappel t&eacute;l&eacute;phonique</title></head>
    <body>Veuillez appeler le numero suivant : <b>".$Tel."</b><BR /><BR />
        ____________________________________________________</p>
    Cordialement ".$Societe."<br />
    www.neuro-soft.fr</p>
    <font color='#FF0000'>Cet e-mail contient des informations confidentielles et / ou protégées par la loi. Si vous n'en êtes pas le véritable destinataire ou si vous l'avez reçu par erreur, informez-en immédiatement son expéditeur et détruisez ce message. La copie et le transfert de cet e-mail sont strictement interdits.</font>                 
    </body></html>";
    $Message_mail.="\n\n";
  
    $Message_mail.="--$boundary\n";

    $MessFree=urlencode("Veuillez rappeler le numero suivant : ".$Tel);
    $UrlFree="https://smsapi.free-mobile.fr/sendmsg?user=".$UserFree."&pass=".$MdpFree."&msg=".$MessFree;

    $Init=curl_init();
    curl_setopt($Init , CURLOPT_URL, $UrlFree);
    curl_exec($Init);
      
    if (!mail($Destinataire, "Rappel", $Message_mail, $Entete)) {
       $Erreur="L'e-mail n'a pu être envoyé, veuillez réessayer ultèrieurement !";
       header("location:".$Page."?erreur=".$Erreur);

    }
    else {
       $Valid="Votre numéro à bien été enregistré, vous serez rappelé dans les meilleurs délais";
       header("location:".$Page."?valid=".$Valid);
    }
  }
  else {
    header("location:".$Page."?erreur=".$Erreur);
  }
}

?>