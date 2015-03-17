$(window).load(function(){

function test(){
	alert();
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
})
