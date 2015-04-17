	var miHorario = [];
	var clases = {};

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

function inscribir_MLB(post_data){
	$.post(
		ajax_url,
		post_data,
		function(response){
			console.log(response);
			if(response){
				console.log("Registrado");
				setTimeout("location.href='miHorario.php'", 1000);
			}
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
	var contador=0, lunes=0, martes=0, miercoles=0, jueves=0, viernes=0;
	var identificador ="";
	var clase = "";
	clases['1']= [];
	clases['2']= [];
	clases['3']= [];
	clases['4']= [];
	clases['5']= [];

	$('#misHorarios .disp').click(function(e){
		clase = this.getAttribute('class');
		identificador = clase.substring(0,5);
		estado = clase.substring(5,clase.length);
		var caso = identificador.substring(2,3);
		var valor = this.childNodes[0]['data'];

		if(estado=='[ disp ]' && contador<3){
			switch(caso){
				case '1':
					if(lunes<2){
						this.setAttribute("class", identificador+"[ select ]");		
						lunes++;
						contador++;
						clases['1'].push(valor);
						clases['1'].sort();
						}
				break;
				
				case '2':
					if(martes<2){
						this.setAttribute("class", identificador+"[ select ]");		
						martes++;
						contador++;
						clases['2'].push(valor);
						clases['2'].sort();
						}
				break;
				
				case '3':
					if(miercoles<2){
						this.setAttribute("class", identificador+"[ select ]");		
						miercoles++;
						contador++;
						clases['3'].push(valor);
						clases['3'].sort();
						}
				break;
				
				case '4':
					if(jueves<2){
						this.setAttribute("class", identificador+"[ select ]");		
						jueves++;
						contador++;
						clases['4'].push(valor);
						clases['4'].sort();
						}
				break;
				
				case '5':
					if(viernes<2){
						this.setAttribute("class", identificador+"[ select ]");		
						viernes++;
						contador++;
						clases['5'].push(valor);
						clases['5'].sort();
						}
				break;
			}
		}
		else if(estado=='[ select ]'){
			this.setAttribute("class", identificador+"[ disp ]");
			contador--;
			switch(caso){
				case '1':
					for (var index = 0; index < clases['1'].length; index++) {
						if(clases['1'][index]==valor){
							clases['1'].splice(index,1);
						}
					};
					lunes--;
					break;
					
				case '2':
					for (var index = 0; index < clases['2'].length; index++) {
						if(clases['2'][index]==valor){
							clases['2'].splice(index,1);
						}
					};
					martes--;
					break;
				
				case '3':
					for (var index = 0; index < clases['3'].length; index++) {
						if(clases['3'][index]==valor){
							clases['3'].splice(index,1);
						}
					};
					miercoles--;
					break;
				case '4':
				for (var index = 0; index < clases['4'].length; index++) {
					if(clases['4'][index]==valor){
						clases['4'].splice(index,1);
					}
				};
				jueves--;
				break;
				case '5':
				for (var index = 0; index < clases['5'].length; index++) {
					if(clases['5'][index]==valor){
						clases['5'].splice(index,1);
					}
				};
				viernes--;
				break;
			}
		}
		actualizarInfo(clases);
		if(contador==3){
			document.getElementById("submitBtn").disabled = false;
		}
		else{
			document.getElementById("submitBtn").disabled = true;	
		}

	});
}

function actualizarInfo(clases){
	console.log(clases);
	var conteo=0, dia;
	var mostrador;
	document.getElementById('data1').innerText="";
	document.getElementById('data2').innerText="";
	document.getElementById('data3').innerText="";

	for (var iknus = 1; iknus <= 5; iknus++) {
		if(clases[iknus].length>0){
			for (var jk = 0; jk < clases[iknus].length; jk++){
				switch(iknus){
					case 1:
						dia= "Lunes\n";
					break;
					case 2:
						dia= "Martes\n";
					break;
					case 3:
						dia= "Miércoles\n";
					break;
					case 4:
						dia= "Jueves\n";
					break;
					case 5:
						dia= "Viernes\n";
					break;
				}
				switch(conteo){
					case 0:
						mostrador=document.getElementById('data1');
						mostrador.innerText=dia+clases[iknus][jk];	
						conteo++;
					break;
					case 1:
						mostrador=document.getElementById('data2');
						mostrador.innerText=dia+clases[iknus][jk];	
						conteo++;
					break;
					case 2:
						mostrador=document.getElementById('data3');
						mostrador.innerText=dia+clases[iknus][jk];	
						conteo++;
					break;
				}
			}
		}
	};
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

function inscribirMLB(){
		$('.js-inscribir').click(function(e){
			e.preventDefault();
			confirmacion = confirm("¿Estás seguro de realizar tu inscripción?");
			console.log(confirmacion);
			if(confirmacion){
					var post_data= {};
					post_data['action']  = "registrar_grupo_MLB";
					post_data['id']  = $('.user_id').val();
					post_data['nombre'] = $('#nombreGrupo').val();
					post_data['sede'] = '1';
					post_data['programa'] = '2';
					post_data['idioma'] = $('#idiomas').val();
					post_data['horario'] = clases;
					post_data['registrados'] = $('#integrantes').val();
					console.log(post_data);
					inscribir_MLB(post_data);
				};
		});
}

//})
	$(window).load(function(){
	//horarios();
	//sumar();
});