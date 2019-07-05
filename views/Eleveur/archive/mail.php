<?php
$mail = new PHPMailer;
$mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                            // Enable SMTP authentication
$mail->Username = 'tibaredhaamranemimi@gmail.com'; // SMTP username
$mail->Password = '030570170176';                  // SMTP password
$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                 // TCP port to connect to
$mail->setFrom('tibaredha@yahoo.fr', 'ONDEEC');
$mail->addReplyTo('tibaredha@yahoo.fr', 'DSP DJELFA');
$mail->addAddress('tibaredha@yahoo.fr');                // Add a recipient
$mail->addCC('tibaredhaamranemimi@gmail.com');
///$mail->addBCC('bcc@example.com');
$mail->isHTML(true);  // Set email format to HTML
$mail->Subject = 'Email from Dr R.TIBA ';
$bodyContent = '<h1> Dr R.TIBA </h1>';
$bodyContent .= '<br/>';
$bodyContent .= '<p>dsp wilaya de djelfa</p>';



// Ajouter une pièce jointe 
$url=URL.'/public/images/'.$this->user[0]['id'].'.jpg';
$mail->addStringAttachment(file_get_contents($url), '61.jpg');
$mail->Body    = $bodyContent;

if(!$mail->send()) {
    echo '<h1>Message could not be sent.</h1><hr><br/>';
    echo '<h1>Mailer Error: </h1><hr><br/>' . $mail->ErrorInfo;
} else {
    echo '<h1>Votre Message a été envoyé avec succés à Mr : '.$this->user[0]['NomP'].'</h1><hr><br/>';
}
?>

    <fieldset id="fieldset0">
<legend>ONDEEC</legend>
<?php HTML::photosdb('IS NOT NULL'); ?>
</fieldset>
<p id="ONDEEC1">ONDEEC</p>
	<?php 
	//HTML::dump_MySQL("127.0.0.1","root","","cheval",2);
	HTML::Br(36);
	?>	    
		
		
	
	
	
	 
	 