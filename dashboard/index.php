<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <title>Inicio de secion</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'><link rel="stylesheet" href="./style.css">
</head>
<body>
<!-- partial:index.partial.html -->
<h2>Inicio de sesión Equipo Agua de COCO</h2>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form id="formReg" action="controlLog.php" method = "POST">
			<h1>Crear Cuenta</h1>
			<div class="social-container">
				
			</div>
			<span>O usa tu email para registrarte</span> 
			<input type="text" required placeholder="Nombre" name="txtName"/>
			<input type="email" required placeholder="Email" name="txtEmail_R"/>
			<input type="password" required placeholder="Contraseña" name="txtPass_R"/>
			<button id = "btnRegistrar" name = "btnRegistrar">Registrarse</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form id="formLogin" action="controlLog.php" method = "POST">
			<h1>Inicia Sesión</h1>
			<div class="social-container">
				
			</div>
			<span>O usa tu cuenta personal</span>
			<input type="email" required placeholder="Email" id="txtEmail" name="txtEmail" />
			<input type="password" placeholder="Contraseña" id="txtPass" name="txtPass"/>
			<button name = "btnIniciasesion" id = "btnIniciasesion">Iniciar Sesión</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Bienvenido de nuevo!</h1>
				<p>Para seguir conectandote con nosotros porfavor inicia seción con tu cuenta personal</p>
				<button class="ghost" id="signIn">Iniciar Sesión</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hola, Amigo UwU!</h1>
				<p>Introduce tus datos personales e inicia tu viaje con nosotros</p>
				<button class="ghost" id="signUp">Registrarse</button>
			</div>
		</div>
	</div>
</div>

<footer>
	<p>
		Creado con <i class="fa fa-heart"></i> En
		<a target="_blank" href="https://es.wikipedia.org/wiki/HTML">HTML</a>
		- Aqui mas info de nosotros
		<a target="_blank" href="https://www.facebook.com/alsarodbe">here</a>.
	</p>
</footer>
<!-- partial -->
    <script src="codigo.js"></script>
</body>
</html>
