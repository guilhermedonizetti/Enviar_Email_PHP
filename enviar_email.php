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
	$email_para = isset($_POST["email_para"]) ? utf8_decode($_POST["email_para"]) : null;
	$assunto    = isset($_POST["assunto"]) ? utf8_decode($_POST["assunto"]) : null;
	$conteudo   = isset($_POST["conteudo"]) ? utf8_decode($_POST["conteudo"]) : null;
	$arquivo 	= isset($_FILES["arquivo"]) ? $_FILES["arquivo"] : null;

	//FAZ O UPLOAD TEMPORARIO DO ARQUIVO SE EXISTIR
	if(!is_null($arquivo)) {

		if(move_uploaded_file($arquivo["tmp_name"], "arquivos/" . $arquivo["name"])) {

		}
		else {
			die("Falha ao fazer upload do arquivo.");
		}
	}

	//FUNCAO DE ERRO, SE HOUVER DADO EM FALTA
	function erro($x)
	{
		echo "Erro: " . $x;
	}

	//VALIDACOES
	if($email_para == '' || is_null($email_para)) erro("A");
	if($assunto == '' || is_null($assunto)) erro("B");
	if($conteudo == '' || is_null($conteudo)) erro("C");

	$nome_para = explode("@", $email_para);

	//INSTANCIAR CLASSE HABILITANDO AS MENSAGENS DE ERRO
	$mail = new PHPMailer(true);

	try {
	    //CONFIGURACOES DE SERVIDOR
	    //$mail->SMTPDebug  = SMTP::DEBUG_SERVER; //carrega os logs do envio
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

	    //ANEXAR ARQUIVOS
	    if($arquivo != null) {
	    	$mail->addAttachment("arquivos/".$arquivo["name"], $arquivo["name"]);
	    }

	    //CONTEUDO
	    $mail->isHTML(true); //envia email como HTML
	    $mail->Subject = $assunto;
	    $mail->Body    = $conteudo;
	    $mail->AltBody = $conteudo; //se HTML nao carregar

	    $mail->send();
	    echo 'true';
	} catch (Exception $e) {
	    echo 'Não enviado por: ' . $e	;
	}
