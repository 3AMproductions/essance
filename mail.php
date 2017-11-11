<?php
  ini_set('include_path','.:/home/pimp3am/includes');
  require_once('ext.phpmailer.php');

	function mail_sent($p){
    $mail = new my_phpmailer();
  	$mail->to = array(array("karnsj@cse.ohio-state.edu","3AM Productions"));
    $mail->IsMail();
  
  	$mail->FromName = $p['name'];
    $mail->From = $p['email'];
    $mail->Subject = 'Hire Request from Website';
    $mail->Body = "\nContact Information:\n\tName:\t\t".addslashes($p['name'])."\n\t";
  	$mail->Body .= "Work Phone:\t".addslashes($p['phone1'])."\n\t";
  	$mail->Body .= "Home Phone:\t".addslashes($p['phone2'])."\n\t";
  	$mail->Body .= "Cell Phone:\t".addslashes($p['phone3'])."\n\t";
  	$mail->Body .= "Email:\t".addslashes($p['email'])."\n\n";
  	$mail->Body .= "How did you hear about Essance Project Band?";
   	foreach($p['refer'] as $r){
   	  if ($r == "client") $mail->Body .= "\n\tReferred by a client";
   		elseif ($r == "band") $mail->Body .= "\n\tReferred by a band or musician";
   		elseif ($r == "venue") $mail->Body .= "\n\tReferred by venue, planner, etc.";
   	}
  	if(isset($p['refer']['other']) and $p['refer']['other'] != "") $mail->Body .= "\n\tReferred by: ".addslashes($p['refer']['other']);
  	
  	$mail->Body .= "\n\nMusical Genre(s):";
  	if(isset($p['music'])) foreach($p['music'] as $m) $mail->Body .= "\n\t".$m;
  	$mail->Body .= "\n\nEvent Information:\n\tEvent Type:\t".addslashes($p['event'])."\n\t";
  	$mail->Body .= "Date:\t\t".addslashes($p['date'])."\n\t";
  	$mail->Body .= "Time:\t\t".addslashes($p['time'])."\n\t";
  	$mail->Body .= "Location:\t".addslashes($p['location'])."\n\t";
  	$mail->Body .= "Budget:\t".addslashes($p['budget'])."\n\t";
  	$mail->Body .= "Comments:\t".addslashes($p['misc'])."\n\t";
  	
  	return $mail->Send();
	}	
?>
