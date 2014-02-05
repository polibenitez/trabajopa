enyo.kind({
	name: "Lista-Transporte",
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
			this.$.list.setCount(data.transporte.length);
			this.setupItem();
        }
	},
	setupItem: function(inSender, inEvent) {
			var i = inEvent.index;
			if (!this.names[i]) {
				this.names[i] = this.data.transporte[i].tipo;
				this.numbers[i] = this.data.transporte[i].descripcion;
			}

		var ni = this.names[i];
		var n=this.numbers[i];
		
		this.$.item.addRemoveClass("list-sample-selected", inSender.isSelected(i));
		this.$.nombre.setContent(n);
		this.$.numero.setContent(ni);
	},

	listTap: function(inSender,inEvent){
		this.bubble("onItemTapEdificio",this.data.transporte[inEvent.index]);
		inEvent.preventDefault();
	},
	refreshList: function() {
			this.$.list.setCount(this.data.transporte.length);
			this.$.list.reset();
			this.$.list.refresh();
	},
});