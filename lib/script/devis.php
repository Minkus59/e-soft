<?php 
require($_SERVER['DOCUMENT_ROOT']."/lib/script/fonction_perso.inc.php"); 
require_once($_SERVER['DOCUMENT_ROOT']."/lib/script/log.inc.php"); 

  
if ((isset($_POST['Envoyer']))&&($_POST['Envoyer']=="Envoyer")) {

   $Nom=FiltreText('nom');
   $Message=FiltreText('message');
   $Email=FiltreEmail('email');
   $Page=$_POST['page'];
   $IpAuteur=$_SERVER['REMOTE_ADDR'];

   $BlackList = array("89.159.184.190", "188.143.232.32");

   ErreurLog($IpAuteur);

   session_start();

  if (in_array($IpAuteur, $BlackList)) {
    $Erreur="Vous avez été banni par l'administrateur du site Internet<BR /><BR />
    <img src='".$Home."/lib/img/Pirate.png' alt='Halte au idiot'/>";
    ErreurLog($Erreur);
  } 
  elseif ($Nom[0]===false) {
    $Erreur=$Nom[1];
    ErreurLog($Erreur);
  }  
  else {
    $_SESSION['nom']=$Nom;
  } 

  if ($Message[0]===false) {
    $Erreur=$Message[1];
    ErreurLog($Erreur);
  }  
  else {
    $_SESSION['message']=$Message;
  }  
         
  if ($Email[0]===false) {
    $Erreur=$Email[1]; 
    ErreurLog($Erreur);
  }    
  else {
    $_SESSION['email']=$Email;
  }  
  
  if (!isset($Erreur)) { 

    $boundary = md5(uniqid(mt_rand()));
    
    $Entete = "From: ".$Societe."<".$Serveur.">\r\n";
    $Entete .= "Reply-to: ".$Destinataire."<".$Destinataire.">\r\n";
    $Entete .= 'MIME-Version: 1.0' . "\r\n";                        
    $Entete .='Content-Type: text/html; charset="utf-8"'."\r\n";
    $Entete .='Content-Transfer-Encoding: 8bit';
    
    $Message_mail="<html><head><title>Demande de contact</title></head>
    <body>Page : ".$Page."<BR /><BR />
    Message de : ".$Email."<BR />
    Nom : ".$Nom."<BR />
    E-mail : ".$Email."<BR />
    <BR />
    Message : ".$Message."</p>
    ____________________________________________________</p>
    Cordialement ".$Societe."<br />
    www.neuro-soft.fr</p>
    <font color='#FF0000'>Cet e-mail contient des informations confidentielles et / ou protégées par la loi. Si vous n'en êtes pas le véritable destinataire ou si vous l'avez reçu par erreur, informez-en immédiatement son expéditeur et détruisez ce message. La copie et le transfert de cet e-mail sont strictement interdits.</font>                   
    </body></html>";

    $MessFree=urlencode("Demande de contact
    Page : ".$Page."
    Message de : ".$Email."
    Nom : ".$Nom."
    E-mail : ".$Email."
    Message : ".$Message."");

    $UrlFree="https://smsapi.free-mobile.fr/sendmsg?user=".$UserFree."&pass=".$MdpFree."&msg=".$MessFree;

    $Init=curl_init();
    curl_setopt($Init , CURLOPT_URL, $UrlFree);
    curl_exec($Init);

    if (mail($Destinataire, "Demande de contact", $Message_mail, $Entete)===false) {
       $Erreur = urlencode("L'e-mail n'a pu être envoyé, vérifiez que vous l'avez entré correctement !");
      ErreurLog($Erreur);
       header('location:'.$Page.'?erreurDevis='.$Erreur."#Devis");
    }
    else {
      session_unset();
      session_destroy();
      $Valid=urlencode("Votre message à bien été enregistré, il sera traité dans les meilleurs délais !");
      header('location:'.$Page.'?validDevis='.$Valid."#Devis");
    }
  }
  else {
    header('location:'.$Page.'?erreurDevis='.urlencode($Erreur)."#Devis");
  }
}
else {
  header("location:".$Page);
}
?>