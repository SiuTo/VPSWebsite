<?php
	require "PHPMailer/PHPMailerAutoload.php";

	function sendmail($content)
	{
		$mail=new PHPMailer;

		$mail->isSMTP();
		$mail->Host="mail.privateemail.com";
		$mail->SMTPAuth=true;
		$mail->Username="admin@siuto.me";
		$mail->Password="SiuTo038.nc";
		$mail->SMTPSecure="tls";
		$mail->Port=587;

		$mail->From="admin@siuto.me";
		$mail->FromName="admin";
		$mail->addAddress("418xiaotao@163.com");

		$mail->Subject=$content;
		$mail->Body=$content;
	
		$mail->send();
	}
?>

