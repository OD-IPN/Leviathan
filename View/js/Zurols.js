	var miHorario = [];

	function comprobarHorario(horaInicio){
		if (miHorario.length == 0)
			return false;
		for (var j = 0; j < miHorario.length; j++){
			if (miHorario[j].localeCompare(horaInicio) == 0){
				return true;
			}
		}
		
	}
	function quitarHora(horaAQuitar){
		var index = miHorario.indexOf(horaAQuitar);
		miHorario.splice(index, 1);
		return true;
	}

	function sumar(elemento){
		fila = $(elemento).parent().parent();
		horaInicio = fila.attr('id');

		if (comprobarHorario(horaInicio))
			sweetAlert("Oops...", "Ya tienes un grupo en la misma hora!", "error");
		else{
			miHorario.push(horaInicio);
			$(fila).find('img').removeClass('Add');
			$(fila).find('img').parent().html('<img id='+horaInicio+' src="images/menos.png" onclick="quitar(this)" class="quitar" />');
			
			$('.misHorarios').append(fila);
			swal("Good job!", "Se ha agregado el grupo!", "success");

			console.log(miHorario);
			return 0;
		}
	}

	function quitar(elemento){
		fila = $(elemento).parent().parent();
		horaInicio = $(elemento).attr('id');

		if (quitarHora(horaInicio)){
			$(fila).find('img').removeClass('quitar');
			$(fila).find('img').parent().html('<img  id='+horaInicio+' src="images/mas.png"  onclick="sumar(this)" class="Add" />');			
			$('.horarios').append(fila);
			swal("Good job!", "Se ha quitado el grupo de tu horario!", "success");	
			
			console.log(miHorario);
			return 0;
		}else
			console.log("algo salió mla al eliminar la hora");			
	}

	function filtrar(){
		$('#sede').on('change', function(e){
			sede = $('#sede').val();
			programa = $('#programa').val();
			idioma = $('#idioma').val();
			modalidad = $('#modalidad').val();
			cadena=sede+''+programa+''+idioma+''+modalidad;
			filtrosMultiples(cadena);
		});
		$('#programa').on('change', function(e){
			sede = $('#sede').val();
			programa = $('#programa').val();
			idioma = $('#idioma').val();
			modalidad = $('#modalidad').val();
			cadena=sede+''+programa+''+idioma+''+modalidad;
			filtrosMultiples(cadena);
		});
		$('#idioma').on('change', function(e){
			sede = $('#sede').val();
			programa = $('#programa').val();
			idioma = $('#idioma').val();
			modalidad = $('#modalidad').val();
			cadena=sede+''+programa+''+idioma+''+modalidad;
			filtrosMultiples(cadena);
		});
		$('#modalidad').on('change', function(e){
			sede = $('#sede').val();
			programa = $('#programa').val();
			idioma = $('#idioma').val();
			modalidad = $('#modalidad').val();
			cadena=sede+''+programa+''+idioma+''+modalidad;
			filtrosMultiples(cadena);
		});

	}

	function filtrosMultiples(cadena){
		$('.horarios tr').show();

		switch(cadena[0]){
			case '1':
			$('.UPIICSA').hide();
			break;

			case '2':
			$('.ESCOM').hide()
			break;

			default:
			break;
		}

		switch(cadena[1]){
			case '1':
			$('.MLB').hide();
			break;

			case '2':
			$('.SL').hide()
			break;

			default:
			break;
		}

		switch(cadena[2]){
			case '1':
			$('.Francés').hide();
			$('.Alemán').hide();
			break;

			case '2':
			$('.Inglés').hide();
			$('.Alemán').hide();
			break;

			case '3':
			$('.Inglés').hide();
			$('.Francés').hide();
			break;

			default:
			break;
		}

		switch(cadena[3]){
			case '1':
			$('.S').hide();
			break;

			case '2':
			$('.L-V').hide();
			break;

			default:
			break;
		}

		$('.misHorarios tr').show();
	
	}

	function registrarGrupos(){
		$('.js-inscribir').click(function(e){
			e.preventDefault();
			confirmacion = confirm("¿Estás seguro de realizar tu inscripción?");
			console.log(confirmacion);
			if(confirmacion){
				var infoTabla= document.getElementById('misHorarios');
				infoTabla = infoTabla.childNodes[1].childNodes;

				for (var k = 2; k < infoTabla.length; k++) {
					var childs = infoTabla[k].childNodes;
					idFila = infoTabla[k].getAttribute('data-id');
					console.log(idFila);
					for (var i = 0; i < childs.length-2; i++) {
						if(i%2 != 0)
							console.log(childs[i].innerText);
					};
					var post_data= {};
					post_data['action']  = 'registrar_grupo_SL';
					post_data['id']  = $('.user_id').val();
					post_data['id_curso'] = idFila;
					post_data['sede'] = childs[1].innerText;
					post_data['programa'] = childs[3].innerText;
					post_data['idioma'] = childs[5].innerText;
					post_data['dias'] = childs[9].innerText;
					post_data['cupo'] = childs[11].innerText;
					post_data['inscritos'] = 30-post_data['cupo'];
					inscribir(post_data);
					console.log(post_data);

				};
			}	

		});
	}


	function reportes(){
		$('.reportes_js').click(function(e){
			var post_data= {};
			post_data['action']  = 'reportes';
			post_data['programa']  = $('#programa').val();;
			post_data['tipo']    = $('.reporte select[name="reportes"]').val();
			console.log(post_data);

			$.post(
				ajax_url,
				post_data,
				function(response){
					console.log(response);
					$('.reporteInfo').append(""+response);

				});
		
		});
	}


	ajax_url="../Controller/functions.php";


	function registrar(){
		$('.js-registrar').click(function(e) {
			formValidation('.js-RegisterForm');
		});
	}

	function formValidation(forma){
		$(forma).validate({
			rules: {
				password_confirmation:{
					equalTo: "#password"
				},
				password_confirmation2:{
					equalTo: "#password2"
				}
			},
			submitHandler:function(){
			console.log(forma);
			switch(forma){
				case '.j-register-user':
	                    //registerUser();
	                    break;

	                    case '.js-RegisterForm':
	                    register_info();
	                    break;

	                    case '.login_form':
	                    login_info();
	                    break;

	                    default:
	                    console.log('default');
	                    break;
	                }
	            }
	        });
}


	function login(){
		$('.login_submit ').click(function(e) {
				formValidation('.login_form');
			});
	}

	function logout(){
		$('.js-logout ').click(function(e) {
			e.preventDefault();

			var post_data= {};
			post_data['action']  = 'logout';

			$.post(
				ajax_url,
				post_data,
				function(response){
					console.log(response);
					if(response=="0")setTimeout("location.href='register.php'", 1000);

				});
		});
	}

	function inscribir(post_data){
		
		$.post(
			ajax_url,
			post_data,
			function(response){
				console.log(response);
			});
		
	}

	function login_info(){
		var login_data= {};

		login_data['action']  = 'login';
		login_data['email']    = $('.login_form input[name="email"]').val();
		login_data['password'] = $('.login_form input[name="password"]').val();

		$.post(
			ajax_url,
			login_data,
			function(response){
				response = response[response.length-1];
				if(response=='1'){
					console.log("success");
					setTimeout("location.href='index.php'", 1000);
				}
				else if(response=='0'){
					console.log("Error - Password incorrecta");
		            	//setTimeout("location.href='index.php'", 1000);
		            }
		            else if(response=="2"){
		            	console.log("Error - Usuario no registrado");
		            	//setTimeout("location.href='index.php'", 1000);
		            }
		            else if(response=="3"){
		            	console.log("Error - Formato de e-mail incorrecto");
		            	//setTimeout("location.href='index.php'", 1000);
		            }

		        } //response
		        );
	}


	function horariosMLB(){
		var contador=0;
		var identificador ="";
		var clase = "";
		$('#misHorarios .disp').click(function(e){
			console.log(this.getAttribute('class'));
			clase = this.getAttribute('class');
			identificador = clase.substring(0,5);
			estado = clase.substring(5,clase.length);
			//console.log(identificador);
			//console.log(estado);

			if(estado=='[ disp ]' && contador<3){
				this.setAttribute("class", identificador+"[ select ]");
				contador++;
			}
			else if(estado=='[ select ]'){
				this.setAttribute("class", identificador+"[ disp ]");
				contador--;
			}

			console.log(identificador.substring(2,3));
			switch(identificador.substring(2,2)){
			case 1:
				console.log("Lunes");
				break;
		}
		});

	}


	function register_info(){
		var register_data= {};

		register_data['action']  = 'register';
		register_data['nombre']  = $('.js-RegisterForm input[name="nombre"]').val();
		register_data['apellido']  = $('.js-RegisterForm input[name="apellidos"]').val();
		register_data['edad']  = $('.js-RegisterForm input[name="edad"]').val();
		register_data['direccion']  = $('.js-RegisterForm input[name="direccion"]').val();
		register_data['tel']  = $('.js-RegisterForm input[name="tel"]').val();
		register_data['escuela']  = $('.js-RegisterForm select[name="escuela"]').val();
		register_data['externo']  = $('.js-RegisterForm input[name="externo"]').val();
		register_data['campus']  = $('.js-RegisterForm input[name="campus"]').val();
		register_data['email']  = $('.js-RegisterForm input[name="email"]').val();
		register_data['password']  = $('.js-RegisterForm input[name="password"]').val();

		console.log(register_data);
		$.post(
			ajax_url,
			register_data,
			function(response){
				console.log(response);
				if(response=='1'){
					console.log("success");
					setTimeout("location.href='index.php'", 1000);
				}
				else if(response=='0'){
					console.log("Error - Password incorrecta");
		            	//setTimeout("location.href='index.php'", 1000);
		            }
		            else if(response=="-1"){
		            	console.log("Error - Usuario no registrado");
		            	//setTimeout("location.href='index.php'", 1000);
		            }
		            else if(response=="-2"){
		            	console.log("Error - Formato de e-mail incorrecto");
		            	//setTimeout("location.href='index.php'", 1000);
		            }

		        } //response
		        );
	}

//})
	$(window).load(function(){
	//horarios();
	//sumar();
});