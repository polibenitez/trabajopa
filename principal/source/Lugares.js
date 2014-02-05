enyo.kind({
	name: "Lista-Lugares",
	kind: "FittableRows",
  classes: "enyo-fit enyo-unselectable contentBg",
	components: [
      { kind:"Header" },
      { kind:"Lista",name:"listaDatos"},
      { kind:"Footer" }
	],
 
	create: function(){
    this.inherited(arguments);
	},
  
  conectorDatos:function() {
      var ajax = new enyo.Ajax({
          url: "../datosLista.php",
      });

      ajax.go({
              format:"json",
              peticion:"edificios"
            });
      ajax.response(this, "processResponse");
  },

  processResponse:function(inRequest, inResponse){
    if (!inResponse) return;
    var datos=new Array();
    for (var i = 0; i < inResponse.length; i++) {
      datos[i]={nombre:inResponse[i]};
    }
    this.$.listaDatos.data=datos;
    this.$.listaDatos.refreshList();
  },
  
  addLista: function(inResult) {
    var datos=new Array();
    for (var i = 0; i < inResult.length; i++) {
      datos[i]={name:inResult[i]};
    }
      this.createComponent({
      kind: SearchableList,
      container: this.$.Contenedor,
      name: "Lista",
      data: datos,
      count:20
    });
  },
  actualizarLista: function(elemento){
    switch(elemento){
      case "Edificios":
            console.log("vamos a crear edificios");
            this.conectorDatos();
            break;
      case "Despachos":
            console.log("vamos a crear Despachos");
            break;
      case "Servicios":
            console.log("vamos a crear Servicios");
            break;
      case "Comedores":
            console.log("vamos a crear Comedores");
            break;
      case "Paradas de bus":
            console.log("vamos a crear Paradas de bus");
            break;
      case "Parkings":
            console.log("vamos a crear Parkings");
            break;
      default:
      console.log("no vamos a crear nada");
      break;
    }
  }
});