enyo.kind({
	name: "Lista-Aparcamientos",
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
			this.$.list.setCount(data.aparcamientos.length);
			this.setupItem();
        }
	},
	setupItem: function(inSender, inEvent) {
			var i = inEvent.index;
			if (!this.names[i]) {
				this.names[i] = this.data.aparcamientos[i].tag;
				this.numbers[i] = this.data.aparcamientos[i].descripcion;
			}

		var ni = this.names[i];
		var n=this.numbers[i];
		
			this.$.item.addRemoveClass("list-sample-selected", inSender.isSelected(i));
		this.$.nombre.setContent(n);
		this.$.numero.setContent(ni);
	},

	listTap: function(inSender,inEvent){
		this.bubble("onItemTapEdificio",this.data.aparcamientos[inEvent.index]);
		inEvent.preventDefault();
	},
	refreshList: function() {
			this.$.list.setCount(this.data.aparcamientos.length);
			this.$.list.reset();
			this.$.list.refresh();
	},
});