<?php
	
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	use PHPMailer\PHPMailer\SMTP;

	require 'lib/vendor/phpmailer/phpmailer/src/Exception.php';
	require 'lib/vendor/phpmailer/phpmailer/src/PHPMailer.php';
	require 'lib/vendor/phpmailer/phpmailer/src/SMTP.php';

	//AUTOCARREGAMENTO
	require 'lib/vendor/autoload.php';

	//RECEBER OS DADOS
	$email_para = isset($_GET["email_para"]) ? $_GET["email_para"] : null;
	$assunto    = isset($_GET["assunto"]) ? $_GET["assunto"] : null;
	$conteudo   = isset($_GET["conteudo"]) ? $_GET["conteudo"] : null;
	//$arquivo = isset($_GET["arquivo"]) ? $_GET["arquivo"] : null;

	//CFUNCAO DE ERRO, SE HOUVER DADO EM FALTA
	function erro()
	{
		echo "false";
	}

	//VALIDACOES
	if($email_para == '' || is_null($email_para)) erro();
	if($assunto == '' || is_null($assunto)) erro();
	if($conteudo == '' || is_null($conteudo)) erro();

	$nome_para = explode("@", $email_para);

	//INSTANCIAR CLASSE HABILITANDO AS MENSAGENS DE ERRO
	$mail = new PHPMailer(true);

	try {
	    //CONFIGURACOES DE SERVIDOR
	    $mail->SMTPDebug  = SMTP::DEBUG_SERVER; //carrega os logs do envio
	    $mail->isSMTP();
	    $mail->Host  	  = 'smtp.gmail.com'; //Servidor de email do Gmail
	    $mail->SMTPAuth   = true; //Habilita a autenticacao do email
	    $mail->Username   = 'mail@gmail.com'; //email host
	    $mail->Password   = 'senha'; //senha do email host
	    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Criptografia TLS da mensagem
	    $mail->Port       = 465; //porta

	    //DESTINATARIO(S)
	    $mail->setFrom('guilhermebrunodonizetti@gmail.com', 'Guilherme Bruno'); //de
	    $mail->addAddress($email_para, $nome_para[0]); //para

	    //CONTEUDO
	    $mail->isHTML(true); //envia email como HTML
	    $mail->Subject = $assunto;
	    $mail->Body    = $conteudo;
	    $mail->AltBody = $conteudo; //se HTML nao carregar

	    $mail->send();
	    echo 'true';
	} catch (Exception $e) {
	    echo 'false';
	}
