
<?php
$_SESSION["Tiempo"]=0;
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Login 10</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">
	<input id="base_url" type="hidden"hidden value="http://localhost/SistemaInventario/">
	</head>
	<body class="img js-fullheight" style="background-image: url(images/Run-Your-Business-Right.jpg);">
	<section class="ftco-section">
		<div class="container ">
			<div id="autentication">
				
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login </h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center">Have an account?</h3>
				  
		      
		      		<div class="form-group">
		      			<input  id="Username" type="text" class="form-control" placeholder="Username" >
		      		</div>
	            <div class="form-group">
	              <input id="password" type="password" class="form-control" placeholder="Password" >
	              <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
	            <div class="form-group">
	            	<button onclick="$Valida_sesion();"class="form-control btn btn-primary px-3">Sign In</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
		            	<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="#" style="color: #fff">Forgot Password</a>
								</div>
	            </div>
	          
	          
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <script src="js/vanilla-toast.min.js" type="text/javascript"></script>
	</body>
	<script>
		$("#password").on("keydown", function (e) {
    if (e.keyCode === 13) {  //checks whether the pressed key is "Enter"
		$Valida_sesion();
    }
});
		    $Valida_sesion = function() {
	  var base_url=$('#base_url').val();	
      var user = $('#Username').val();
      var pass = $('#password').val();

      if (!user && !pass) {
        $('#Username').addClass("is-invalid");
        $('#password').addClass("is-invalid");
		muestra_Alert('Error al inicion de Sesion ', 'Llene todos los campos ', 4);
        return;
      }else
	  if (!user) {
        $('#Username').addClass("is-invalid");
		$('#password').removeClass("is-invalid");
		muestra_Alert('Error al inicion de Sesion ', 'Ingrese su correo ', 4);
        return;
      }else
	  if (!pass) {
		$('#Username').removeClass("is-invalid");
        $('#password').addClass("is-invalid");
		muestra_Alert('Error al inicion de Sesion ', 'Ingrese su constraseña ', 4);
        return;
      }
	  var dataString="User="+user+"&Password="+pass;
	  console.log(dataString);
	  $.ajax({
        type: "POST",
        url: base_url+"valida_sesion/validar_sesion.php",
        data: dataString,
        success: function(html) {
			console.log(html);
			if(html==0){
			muestra_Alert('Error al inicion de Sesion ', 'El correo no existe ', 4);
			$('#Username').addClass("is-invalid");
        	$('#password').addClass("is-invalid");
			}else if(html==2){
			muestra_Alert('Error al inicion de Sesion ', 'La contraseña es incorrecta ', 4);
			$('#Username').addClass("is-valid");
        	$('#password').addClass("is-invalid");
			}
			else if(html==1){
			$('#Username').addClass("is-valid");
        	$('#password').addClass("is-valid");
			muestra_Alert('Inicio de Sesion ', 'Bienvenido '+user, 1);
			setTimeout(function(){
				//window.location.href = base_url+"home";

                console.log("YA LA ARMAMOS");
            }, 3000);
			}
        }
      });
    };



	
function muestra_Alert(title,msj,tipo){
if(tipo==1){
vt.success(msj, {
title: title,
duration: 3000,
closable: true,
focusable: true,
callback: undefined
});
}else if(tipo==2){
vt.info(msj, {
title: title,
duration: 3000,
closable: true,
focusable: true,
callback: undefined
});
}else if(tipo==3){
vt.warn(msj, {
title: title,
duration: 3000,
closable: true,
focusable: true,
callback: undefined
});
}else{
vt.error(msj, {
title: title,
duration: 3000,
closable: true,
focusable: true,
callback: undefined
});
}

}

	</script>
	
</html>

