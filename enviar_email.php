<?php
	
	//RECEBER OS DADOS
	$email_para = isset($_POST["email_para"]) ? $_POST["email_para"] : null;
	$assunto    = isset($_POST["assunto"]) ? $_POST["assunto"] : null;
	$conteudo   = isset($_POST["conteudo"]) ? $_POST["conteudo"] : null;
	//$arquivo = isset($_POST["arquivo"]) ? $_POST["arquivo"] : null;

	//CFUNCAO DE ERRO, SE HOUVER DADO EM FALTA
	function erro()
	{
		echo "<script type='text/javascript'>
				alert('Erro. Todos os campos devem ser preenchidos!');
				window.location.href = 'index.php';
			  <script>";
	}

	//VALIDACOES
	if($email_para == '' || is_null($email_para)) erro();
	if($assunto == '' || is_null($assunto)) erro();
	if($conteudo == '' || is_null($conteudo)) erro();

	$headers = array(
	    'From' => 'guilhermedonizettiads@gmail.com',
	    'X-Mailer' => 'PHP/' . phpversion()
	);

	$enviar = mail($email_para, $assunto, $conteudo, $headers);

	if($enviar) {
		echo "<script type='text/javascript'>
				alert('E-mail enviado com sucesso!');
				window.location.href = 'index.php';
			  <script>";
	}
	else {
		echo "<script type='text/javascript'>
				alert('Erro.E-mail não enviado, tente novamente.');
				window.location.href = 'index.php';
			  <script>";
	}
