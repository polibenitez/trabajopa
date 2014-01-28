enyo.kind({
    name: "Header",
    kind: "Control",
    components: [
        {
             kind: "onyx.Toolbar",
             layoutKind: "FittableColumnsLayout",
             components:[
             	{
             		tag:"h1",
             		fit:true,
                    name:"labelSuperior",
             		content:"Lugares",
             		classes:"headerTextTitle",
             		style:"text-align:center"
             	}
             ]
        }
    ],
    published:{
        etiqueta:""
    },
    create:function() {
        this.inherited(arguments);
        this.etiquetaChanged();
    },
    etiquetaChanged:function(){
        this.$.labelSuperior.setContent(this.etiqueta);
    }
});      

      