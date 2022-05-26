<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0"> 
	<meta http-equiv="cache-control" content="max-age=0" />
	<meta http-equiv="cache-control" content="no-cache" />
	<meta http-equiv="expires" content="0" />
	<title>Enviar E-mails</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
</head>

<style type="text/css">
	body {
		background-color: #DCDCDC;
		width: 100%;
	}
</style>

<body>

	<nav class="navbar navbar-light bg-dark">
	  <div class="container-fluid">
	    <a class="navbar-brand" href="#">
	      <img src="https://portal.ifba.edu.br/barreiras/imagens-campus-barreiras/icon-email.png/@@images/2272be23-02eb-43ca-9fad-f6fa02970ba3.png" alt="" width="30" height="30" class="d-inline-block align-text-top">
	    </a>
	  </div>
	</nav>

	<br>

	<div class="container">
		<form class="row g-3 needs-validation" id="enviar_emails" method="POST" action="enviar_email.php" enctype="multipart/form-data">
		  <div class="col-md-4">
		    <label for="email_para" class="form-label">Para:</label>
		    <input type="email" name="email_para" class="form-control" id="email_para" value="" required>
		  </div>
		  <div class="col-md-8">
		    <label for="assunto" class="form-label">Assunto:</label>
		    <input type="text" name="assunto" class="form-control" id="assunto" value="" required>
		  </div>
		  <div class="col-md-12">
		    <label for="conteudo" class="form-label">Conteúdo:</label>
		    <textarea class="form-control" name="conteudo" id="conteudo" required="" rows="10"></textarea>
		  </div>
		  <div class="col-md-6">
		    <label for="arquivo" class="form-label">Arquivo:</label>
		    <input type="file" name="arquivo" class="form-control" id="arquivo" multiple="">
		  </div>
		  <br>
		  <div class="col-md-12" id="btnEnviar" align="center">
		    <input class="btn btn-outline-primary EnviarEmail" type="button" value="Enviar" id="botao">
			<img src='images/carregamento.gif' width='45' height='45' id="gif" hidden>
		  </div>
		</form>
	</div>
	<br>

	<!-- FOOTER -->
	<footer class="bg-light text-center text-lg-start">
		<div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
	    	Enviar E-mails -
	    	<a class="text-dark" href="https://github.com/guilhermedonizetti/" target="_blank">Guilherme Donizetti</a>
	  	</div>
	</footer>


	<!-- SCRIPTS -->
	<script type="text/javascript">

		$(".EnviarEmail").on( "click", function() {
			$("#botao").attr("hidden", true);
			$("#gif").attr("hidden", false);

			var email = $("#email_para").val();
			var assunto_email = $("#assunto").val();
			var mensagem = $("#conteudo").val();
			var arquivo = $("#arquivo").val();

			//var dados = document.getElementById("enviar_emails");

			var campos = (email == "" || assunto_email == "" || mensagem == "");
			if(campos == true) {
				alert("E-mail, Assunto e Conteúdo devem ser preenchidos!")
				throw ".";
			}

			dados = {
				"email_para": email,
				"assunto": assunto_email,
				"conteudo": mensagem,
				"arquivo": arquivo
			}

			var url_email = "enviar_email.php";

			$.ajax({
				type: 'POST',
				url: url_email,
				data: dados
			}).done(function(resul){

				console.log(resul)

				if (resul == "true") {
					reverter_botao()
					alert("E-mail enviado com sucesso!")
					$("#email_para").val('')
					$("#assunto").val('')
					$("#conteudo").val('')
				}
				else {
					reverter_botao()
					alert("Erro! Tente enviar seu e-mail novamente.");
				}

			})
		});

		function reverter_botao()
		{
			$("#gif").attr("hidden", true);
			$("#botao").attr("hidden", false);
		}
	</script>
	<!-- fim scripts -->
</body>
</html>