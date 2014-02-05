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
		this.bubble("onItemTapEdificio",this.data.edificios[inEvent.index]);
		inEvent.preventDefault();
	},
	refreshList: function() {
			this.$.list.setCount(this.data.edificios.length);
			this.$.list.reset();
			this.$.list.refresh();
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