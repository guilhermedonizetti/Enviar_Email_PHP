<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0"> 
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
		<form class="row g-3 needs-validation" id="enviar_email" method="POST" action="enviar_email.php">
		  <div class="col-md-4">
		    <label for="validationCustom01" class="form-label">Para:</label>
		    <input type="email" name="email_para" class="form-control" id="email_para" value="" required>
		  </div>
		  <div class="col-md-8">
		    <label for="validationCustom02" class="form-label">Assunto:</label>
		    <input type="text" name="assunto" class="form-control" id="assunto" value="" required>
		  </div>
		  <div class="col-md-12">
		    <label for="validationCustom03" class="form-label">Conteúdo:</label>
		    <textarea class="form-control" name="conteudo" id="conteudo" required="" rows="10"></textarea>
		  </div>
		  <div class="col-md-6">
		    <label for="validationCustom05" class="form-label">Arquivo:</label>
		    <input type="file" name="arquivos" class="form-control" id="validationCustom05" multiple="">
		  </div>
		  <br>
		  <div class="col-md-12" align="center">
		    <input class="btn btn-outline-primary EnviarEmail" type="button" value="Enviar">
		  </div>
		</form>
	</div>
	<br>

	<script type="text/javascript">
		$(".EnviarEmail").on( "click", function() {
			var email = $("#email_para").val();
			var assunto = $("#assunto").val();
			var conteudo = $("#conteudo").val();

			var campos = (email == "" || assunto == "" || conteudo == "");
			if(campos == true) {
				alert("E-mail, Assunto e Conteúdo devem ser preenchidos!")
				throw ".";
			}

			var url_email = "enviar_email.php?email_para="+email+"&assunto="+assunto+"&conteudo="+conteudo;

			$.ajax({
				type: 'GET',
				url: url_email
			}).done(function(resul){

				if (resul == "true") {
					alert("E-mail enviado com sucesso!")
					$("#email_para").val('')
					$("#assunto").val('')
					$("#conteudo").val('')
				}
				else {
					alert("Erro! Tente enviar seu e-mail novamente.");
				}

			})
		});
	</script>

	<footer class="bg-light text-center text-lg-start">
		<div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
	    	Enviar E-mails -
	    	<a class="text-dark" href="https://github.com/guilhermedonizetti/" target="_blank">Guilherme Donizetti</a>
	  	</div>
	</footer>
</body>
</html>