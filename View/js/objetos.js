	function curso(id, sede, proyecto,  idioma, hInicio, hFin, dias, lugares, ocupados){
		this.id = id;
		this.sede = sede; 
		this.proyecto = proyecto; 
		this.idioma = idioma;
		this.hInicio = hInicio;
		this.hFin = hFin;
		this.dias = dias;
		this.lugares = lugares;
		this.ocupados = ocupados;
	}


	function horarios(){
		//alert();
		//ESCOM retirar la sede.
		var SL1 = new curso('1', 'ESCOM', 'SL', 'INGLÉS', '9:00', '10:30', 'L-V', '30', '3');
		var SL2 = new curso('2', 'ESCOM', 'SL', 'INGLÉS', '10:30', '12:00', 'L-V', '30', '2');
		var SL3 = new curso('3', 'ESCOM', 'SL', 'FRANCÉS', '12:00', '13:30', 'L-V', '30', '6');
		var SL4 = new curso('4', 'ESCOM', 'SL', 'INGLÉS', '12:00', '13:30', 'S', '30', '25');
		var MLB1 = new curso('5', 'ESCOM', 'MLB', 'INGLÉS', '12:00', '13:30', 'L-V', '30', '6');
		var MLB2 = new curso('6', 'ESCOM', 'MLB', 'INGLÉS', '12:00', '13:30', 'S', '30', '25');

		var direccion = 'Av. Juan de Dios Bátiz esq. Av. Miguel Othón de Mendizába, Gustavo A. Madero, Lindavista, 07738 Ciudad de Mexico, D.F.';

		var horarios = [];
		horarios.push(SL1);
		horarios.push(SL2);
		horarios.push(SL3);
		horarios.push(SL4);
		horarios.push(MLB1);
		horarios.push(MLB2);

		mySede = new sede('1', 'ESCOM', horarios, direccion);	
		//console.log(mySede);

		$('.container-js').append('<h2>'+mySede.name+'- Escuela Superior de Cómputo</h2>');
		$('.container-js').append('<table><tr><td class="img-js"><img src="images/ESCOM.jpg" alt="" /></td><td class="img-js">'+mySede.direccion+'</td></tr></table>');
		$('.container-js').append('<br />');
		$('.container-js').append('<table class="[ horarios ][ cell ] table table-striped"><tr><td> PROGRAMA </td><td> IDIOMA </td><td> HORARIO </td><td> DÍAS </td><td> DISPONIBILIDAD </td><td>  </td></tr></table>');
		//$('.horarios').append('<tr class="[ table-container ]"></tr>');
		
		//for (var j = 0; j < horarios.length; j++) {
		for (var j = horarios.length; j < horarios.length; j++) {
			$('.horarios').append('<tr id="col_'+j+'" class="[ table-container'+j+' ][ cell ]"></tr>');
			$('.table-container'+j).append('<td class="cell">'+horarios[j].proyecto+'</td>');
			$('.table-container'+j).append('<td class="cell">'+horarios[j].idioma+'</td>');
			$('.table-container'+j).append('<td class="cell">'+horarios[j].hInicio+' - '+horarios[j].hFin+'</td>');
			$('.table-container'+j).append('<td class="cell">'+horarios[j].dias+'</td>');
			$('.table-container'+j).append('<td class="cell">'+(horarios[j].lugares-horarios[j].ocupados)+'</td>');
			$('.table-container'+j).append('<td class="cell"> <img src="images/mas.png" id='+horarios[j].hInicio+' class="Add" onclick="sumar(this)" /> </td>');
		}
		//$('.horarios').append('<tr><td>A</td></tr>');
		$('.container-js').append('<br />');
		
		$('.container-js').append('<p><h2>Tu Horario</h2></p>');
		$('.container-js').append('<table class="[ misHorarios ][ cell ] table table-striped"><tr><td> PROGRAMA </td><td> IDIOMA </td><td> HORARIO </td><td> DÍAS </td><td> DISPONIBILIDAD </td><td>  </td></tr></table>');
	}


	function actividad(nombre, miembros, tipo, status, prioridad, MoS){
		this.name = nombre;
		this.team = miembros;
		this.status = status;
		this.priority = prioridad;
		this.mos = MoS;
	}

	function proyecto(id, nombre, actividad){
		this.id = id;
		this.name = nombre;
		this.activities = actividad;
	}

	function MoS(descripcion, meta){
		this.descripcion = descripcion;
		this.status = 0;
		this.meta = meta;
		this.valor = "";
		this.KPIs = "";
	}

	function sede(id, nombre, horarios, direccion){
		this.id=id;
		this.name=nombre;
		this.horarios=horarios;
		this.direccion=direccion;
	}
	
	function agregar_KPI_a_MoS(actividad, KPIs){
		var tmp = actividad.mos;
		console.log(tmp);
	}

	function KPI(descripcion, meta){
		this.descripcion = descripcion;
		this.status = 0;
		this.meta = meta;
		this.valor = "";
	}


	function equipo(equipo){
		this.team = equipo;
	}

	function tracking(){	
		var myMos = new MoS("MoS 1", "100%");
		var myKPI = new KPI("KPI 1", "10");


		console.log(myMos);

		var arrMoS = [];
		var arrKPI = [];
		arrMoS.push(myMos);
		arrMoS.push(myMos);
		arrMoS.push(myMos);
		

		arrKPI.push(myKPI);
		arrKPI.push(myKPI);
		arrKPI.push(myKPI);


		id = 0;
		nombre = "Test 1";

		var arrTeam = ["Miguel Segura","Luis Olmos"];

		var miembros = new equipo(arrTeam);
		console.log(miembros);

		var activities = [];
		var proyect_data={};
		
		proyect_data['id'] = id;
		proyect_data['name'] = nombre;
		proyect_data['activities'] = activities;
		console.log(proyect_data);

		var myActivity = new actividad("Actividad 1", arrTeam, "Green, Red, Sales", "0", "Alta", arrMoS);
		var myActivity2 = new actividad("Actividad 2", arrTeam, "Green, Red, Sales", "0", "Alta", arrMoS);

		activities.push(myActivity);
		activities.push(myActivity2);

		agregar_KPI_a_MoS(activities[0], arrKPI);
		console.log(proyect_data);

		var proyecto_1 = new proyecto("0", "proyecto_1", activities);
		console.log(proyecto_1);
	}

$(window).load(function(){
	//horarios();
	//sumar();
});
