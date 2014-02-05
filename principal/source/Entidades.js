enyo.kind({
	name: "Lista-Entidades",
	kind: "FittableRows",
  classes: "enyo-fit enyo-unselectable contentBg",
	components: [
      { kind:"Header",etiqueta:"Lugares"},
      { kind:"SearchableList",name:"listaDatos"},
      { kind:"Footer" }
	],
 
	create: function(){
    this.inherited(arguments);
      this.conectorDatos();
	},
  
  conectorDatos:function() {
      var ajax = new enyo.Ajax({
          url: "../datosLista.php",
      });

      ajax.go({
              format:"json",
              peticion:"entidades"
            });
      ajax.response(this, "processResponse");
  },

  processResponse:function(inRequest, inResponse){
    if (!inResponse) return;
    var datos=new Array();
    for (var i = 0; i < inResponse.length; i++) {
      datos[i]={name:inResponse[i]};
    }

    this.$.listaDatos.data=datos;
    this.$.listaDatos.dataChanged();

  }
});