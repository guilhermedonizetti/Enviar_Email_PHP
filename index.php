<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Enviar E-mails</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>

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
		<form class="row g-3 needs-validation" method="POST" action="enviar_email.php">
		  <div class="col-md-4">
		    <label for="validationCustom01" class="form-label">Para:</label>
		    <input type="email" name="email_para" class="form-control" id="validationCustom01" value="" required>
		  </div>
		  <div class="col-md-8">
		    <label for="validationCustom02" class="form-label">Assunto:</label>
		    <input type="text" name="assunto" class="form-control" id="validationCustom02" value="" required>
		  </div>
		  <div class="col-md-12">
		    <label for="validationCustom03" class="form-label">Conteúdo:</label>
		    <textarea class="form-control" name="conteudo" required="" rows="10"></textarea>
		  </div>
		  <div class="col-md-6">
		    <label for="validationCustom05" class="form-label">Arquivo:</label>
		    <input type="file" name="arquivos" class="form-control" id="validationCustom05" multiple="">
		  </div>
		  <br>
		  <div class="col-md-12" align="center">
		    <input class="btn btn-outline-primary" type="submit" value="Enviar">
		  </div>
		</form>
	</div>
</body>
</html>