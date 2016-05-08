function myFunction(){
				var lacontrasena=document.getElementById("contrasena");
				var textLength = lacontrasena.value.length;
					if(textLength < 6 ){
						document.getElementById("contrasena").style.border=$colorError;
						$("#verificacionContrasena").slideDown();
					}
					else{
						document.getElementById("contrasena").style.border=$colorOk;
						$("#verificacionContrasena").slideUp()
					}
				}
function getLocation() {
		
	if (navigator.geolocation) {
       navigator.geolocation.getCurrentPosition(showPosition);
    } else { 

        alert("Geolocation is not supported by this browser.");
    }

	}

	function showPosition(position) {
	    document.getElementById("latitude").value = position.coords.latitude;
	    document.getElementById("longitude").value = position.coords.longitude;	
	}

		$(document).ready(function(){
				$colorOk = document.getElementById("email").style.border;
				$colorError = 'solid 1px red';
				$("#formularioRegistro").hide();
				$("#login").hide();
				$("#verificacionEmail").hide();
				$("#verificacionContrasena").hide();
				$("#verificacionNick").hide();
				$("#verificacionCiudad").hide();
				$("#verificacionCountry").hide();
				$("#loginNextStep").hide();
				$("#longitude").hide();
				$("#latitude").hide();
				$("#registerNextStep").hide();

				
				$("#email").blur(function(){
					$.ajax({
						type: "post",
						url:'View/Controller/controllerUser.php',
						data: {'action':'emailValidation','email': $(this).val()},
						success: function(result) {
							if(result == "true"){
								$("#email").css('border', $colorError);
								$("#verificacionEmail").slideDown();
							}
							else{
								$("#email").css('border', $colorOk);
								$("#verificacionEmail").slideUp();
							}
						}
					});
				});

				$("#nick").blur(function(){
					$.ajax({
						type: "post",
						url:'View/Controller/controllerUser.php',
						data: {'action':'nickValidation','nick': $(this).val()},
						success: function(result) {
							if(result == "true"){
								$("#nick").css('border', $colorError);
								$("#verificacionNick").slideDown();
							}
							else{
								$("#nick").css('border', $colorOk);
								$("#verificacionNick").slideUp();
							}
						}
					});
				});


				$("#registroDatos").click(function(e) {
					if($("#verificacionEmail").is(":visible") || ($("#email").val() == "")){
							$("#email").focus();
						}
					else if($("#verificacionContrasena").is(":visible") || ($("#contrasena").val() == "")){
							$("#contrasena").focus();
						}
					else if($("#verificacionNick").is(":visible") || ($("#nick").val() == "")){
							$("#nick").focus();
					}
					else if (!($("#terminosYCondiciones").is(":checked") )){
							$("#terminosYCondiciones").focus();

					}
					else{
						$("#formularioRegistro").toggle( "slide" );
						$("#registerNextStep").toggle( "slide" );

					}

				});
				$("#city").blur(function(){
					if($("#city").val()==""){
						$("#city").css('border', $colorError);
						$("#verificacionCiudad").slideDown();

					}
					else{
						$("#city").css('border', $colorOk);
						$("#verificacionCiudad").slideUp();

					}
				});
				$("#country").blur(function(){
					if($("#country").val()==""){
						$("#country").css('border', $colorError);
						$("#verificacionCountry").slideDown();

					}
					else{
						$("#country").css('border', $colorOk);
						$("#verificacionCountry").slideUp();

					}
				});

				$("#loginButton").click(function(){
					$("#registerOrLogin").toggle( "slide" );
					$("#login").toggle( "slide" );
				});

				$("#registerButton").click(function(){
					$("#registerOrLogin").toggle( "slide" );
					$("#formularioRegistro").toggle( "slide" );
				});

				$("#loginNextStepButton").click(function(){
					$.ajax({
						type: "post",
						url:'View/Controller/controllerUser.php',
						data: {'action':'emailorNickValidation','emailOrNick': $("#emailOrNick").val()},
						success: function(result) {
							if(result == "false"){
								$("#emailOrNick").css('border', $colorError);
								$("#verificacionEmailOrNick").slideDown();
							}
							else{
              					var parsed = JSON.parse(result);
								$("#login").toggle( "slide" );
								$("#loginNextStep").toggle( "slide" )
								$("#avatarLogin").attr('src',parsed.img);
							}
						}
					});
				});
				$("#loginUserButton").click(function(){
					compruebaContrasena();
					});

				$("#urlImgPerfil").blur(function(){
					if($("#urlImgPerfil").val() != "")
					 $('#elAvatar').attr('src',$("#urlImgPerfil").val());
				});

				$("#registerNextStepButton").click(function(e){
					if($("#verificacionCiudad").is(":visible") || ($("#city").val() == "")){
							$("#city").focus();
							e.preventDefault();
						}
					else if($("#verificacionCountry").is(":visible") || ($("#country").val() == "")){
							$("#country").focus();
							e.preventDefault();
						}
				});

				$("#locationButton").click(function(){
				getLocation();
				setTimeout(function(){
					var	lat = document.getElementById("latitude").value;
					var lon = document.getElementById("longitude").value;
					var urlLocalization = "http://nominatim.openstreetmap.org/reverse?format=json&lat="+lat+"&lon="+lon +"&zoom=18&addressdetails=1";
					$.ajax({
							url: urlLocalization, 	
							success: function(result){
					    		$("#city").val(result.address.city);
					    		$("#country").val(result.address.country);
					    }});
					}, 2000);
				});


		});
function compruebaContrasena(){
				$.ajax({
						type: "post",
						url:'View/Controller/controllerUser.php',
						data: {'action':'passwordValidation','emailOrNick': $("#emailOrNick").val(), 'passwordLogin': $("#passwordLogin").val()},
						success: function(result) {
							if(result == "false"){
								$("#passwordLogin").css('border', $colorError);
								$("#verificacionPassword").slideDown();
							}
							else{
								location.href = "/YourMedia/View/index.php";
							}
						}
					});	
}


		