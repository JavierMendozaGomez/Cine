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
		$(document).ready(function(){
				$colorOk = document.getElementById("email").style.border;
				$colorError = 'solid 1px red';
				$("#formularioRegistro").hide();
				$("#login").hide();
				$("#verificacionEmail").hide();
				$("#verificacionEmail").css('color','red');
				$("#verificacionContrasena").hide();
				$("#verificacionContrasena").css('color','red');			
				$("#verificacionNick").hide();
				$("#verificacionNick").css('color','red');

				$("#email").blur(function(){
					$.ajax({
						type: "post",
						url:'ValidationForm.php',
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
						url:'ValidationForm.php',
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


				$("#EnviarRegistro").click(function(e) {
					if($("#verificacionEmail").is(":visible") || ($("#email").val() == "")){
							e.preventDefault();
							$("#email").focus();
						}
					else if($("#verificacionContrasena").is(":visible") || ($("#contrasena").val() == "")){
							e.preventDefault();
							$("#contrasena").focus();
						}
					else if($("#verificacionNick").is(":visible") || ($("#nick").val() == "")){
							e.preventDefault();
							$("#nick").focus();
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

				$("#loginNextStep").click(function(){
				});


		});