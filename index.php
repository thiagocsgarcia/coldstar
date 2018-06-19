<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> :: Time4Fit ::</title>

		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">

</head>
<body class=" bg-black-fosco">


	<header class="row">

			<div class="col-md-4"></div>

			<div class="col-md-4">
				<img src="images/logo.png" class="img-rounded img-responsive" alt="Responsive image" height="300" width="300">
			</div>

			<div class="col-md-4"></div>

	</header>


	<div class="row">

		<div class="col-md-4">
		</div>

		<div class="col-md-4">

				<h3> Insira Login e Senha para entrar ... </h3>


				<form class="form-horizontal" action="autenticar.php" method="post">
				  <div class="row form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Login</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="inputEmail3" name="login" placeholder="Email">
				    </div>
				  </div>

				  <div class=" row form-group">
				    <label for="inputPassword3" class="col-sm-2 control-label"> Senha </label>
					    <div class="col-sm-10">
					      <input type="password" class="form-control" id="inputPassword3" name="senha" placeholder="Password">
					    </div>
				  </div>

			
				  <div class="row form-group">
				    
				      <button type="submit" class="btn btn-success btn-block"> :: Logar</button>
				   
				  </div>
				</form>

		</div>

		<div class="col-md-4">
		</div>
	
	</div>


</body>
</html>