enyo.kind({
	name: "Lista-Edificios",
	kind: "FittableRows",
	fit:true,
	components: [
		{name: "list", kind: "List", count: 0, fit:true,touch:true, onSetupItem: "setupItem", components: [
			{name: "item", ontap:"listTap",classes:"listItemContainer",components: [
				{name: "nombre"},
				{name: "numero",classes: "list-sample-index"}
			]}
		]}
	],
	published:{
		data:null
	},
	names: [],
	numbers:[],
	create: function() {
		this.inherited(arguments);
		if(this.data != null){
			this.$.list.setCount(data.edificios.length);
			this.setupItem();
        }
	},
	setupItem: function(inSender, inEvent) {
			var i = inEvent.index;
			if (!this.names[i]) {
				this.names[i] = this.pasarJS(this.data.edificios[i].nombre);
				this.numbers[i] = this.data.edificios[i].numero;
			}

		var ni = this.names[i];
		var n="Edificio "+this.numbers[i];
		
			this.$.item.addRemoveClass("list-sample-selected", inSender.isSelected(i));
		this.$.nombre.setContent(n);
		this.$.numero.setContent(ni);
	},

	listTap: function(inSender,inEvent){
		//console.log("ubicacion: "+this.data.edificios[inEvent.index].ubicacion);
		//console.log("presionado "+this.names[inEvent.index]+this.numbers[inEvent.index]);
		this.bubble("onItemTapEdificio",this.data.edificios[inEvent.index]);
		inEvent.preventDefault();
	},
	refreshList: function() {
			this.$.list.setCount(this.data.edificios.length);
			this.$.list.reset();
			this.$.list.refresh();
		//console.log(edificios);
	},
	pasarJS: function(campo){
	
	var rp = String(campo);
	rp = rp.replace(/&aacute;/g, 'á');
	rp = rp.replace(/&eacute;/g, 'é');
	rp = rp.replace(/&iacute;/g, 'í');
	rp = rp.replace(/&oacute;/g, 'ó');
	rp = rp.replace(/&uacute;/g, 'ú');
	rp = rp.replace(/&ntilde;/g, 'ñ');
	rp = rp.replace(/&uuml;/g, 'ü');
	//
	rp = rp.replace(/&Aacute;/g, 'Á');
	rp = rp.replace(/&Eacute;/g, 'É');
	rp = rp.replace(/&Iacute;/g, 'Í');
	rp = rp.replace(/&Oacute;/g, 'Ó');
	rp = rp.replace(/&Uacute;/g, 'Ú');
	rp = rp.replace(/&Ñtilde;/g, 'Ñ');
	rp = rp.replace(/&Üuml;/g, 'Ü');
	//
	return rp;
	}
});

/*Datos para pruebas DAO
var edificios= {"edificios":[
				{"numero":1,"nombre":"Nombre Edificio 1","ubicacion":"latitud,longitud","plantas":14,"comentario":"comentario e1"},
				{"numero":2,"nombre":"Nombre Edificio 2","ubicacion":"latitud,longitud","plantas":23,"comentario":"comentario e2"},
				{"numero":3,"nombre":"Nombre Edificio 3","ubicacion":"latitud,longitud","plantas":31,"comentario":"comentario e3"},
				{"numero":4,"nombre":"Nombre Edificio 4","ubicacion":"latitud,longitud","plantas":45,"comentario":"comentario e4"},
				{"numero":5,"nombre":"Nombre Edificio 5","ubicacion":"latitud,longitud","plantas":45,"comentario":"comentario e5"},
				{"numero":6,"nombre":"Nombre Edificio 6","ubicacion":"latitud,longitud","plantas":45,"comentario":"comentario e6"},
				{"numero":7,"nombre":"Nombre Edificio 7","ubicacion":"latitud,longitud","plantas":45,"comentario":"comentario e7"},
				{"numero":8,"nombre":"Nombre Edificio 8","ubicacion":"latitud,longitud","plantas":45,"comentario":"comentario e8"},
				{"numero":9,"nombre":"Nombre Edificio 9","ubicacion":"latitud,longitud","plantas":45,"comentario":"comentario e9"},
				{"numero":10,"nombre":"Nombre Edificio 10","ubicacion":"latitud,longitud","plantas":45,"comentario":"comentario e10"},
				{"numero":11,"nombre":"Nombre Edificio 11","ubicacion":"latitud,longitud","plantas":45,"comentario":"comentario e11"},
				{"numero":12,"nombre":"Nombre Edificio 12","ubicacion":"latitud,longitud","plantas":45,"comentario":"comentario e12"},
				{"numero":13,"nombre":"Nombre Edificio 13","ubicacion":"latitud,longitud","plantas":45,"comentario":"comentario e13"},
				{"numero":14,"nombre":"Nombre Edificio 14","ubicacion":"latitud,longitud","plantas":45,"comentario":"comentario e14"},
				{"numero":15,"nombre":"Nombre Edificio 15","ubicacion":"latitud,longitud","plantas":45,"comentario":"comentario e15"},
				{"numero":16,"nombre":"Nombre Edificio 16","ubicacion":"latitud,longitud","plantas":45,"comentario":"comentario e16"},
				{"numero":17,"nombre":"Nombre Edificio 17","ubicacion":"latitud,longitud","plantas":45,"comentario":"comentario e17"},
				{"numero":18,"nombre":"Nombre Edificio 18","ubicacion":"latitud,longitud","plantas":45,"comentario":"comentario e18"},
				{"numero":19,"nombre":"Nombre Edificio 19","ubicacion":"latitud,longitud","plantas":45,"comentario":"comentario e19"},
				{"numero":20,"nombre":"Nombre Edificio 20","ubicacion":"latitud,longitud","plantas":45,"comentario":"comentario e20"},
				{"numero":21,"nombre":"Nombre Edificio 21","ubicacion":"latitud,longitud","plantas":45,"comentario":"comentario e21"},
				{"numero":22,"nombre":"Nombre Edificio 22","ubicacion":"latitud,longitud","plantas":45,"comentario":"comentario e22"},
				{"numero":23,"nombre":"Nombre Edificio 23","ubicacion":"latitud,longitud","plantas":45,"comentario":"comentario e23"}
				]};*/