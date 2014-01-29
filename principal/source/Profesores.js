enyo.kind({
	name: "Profesores",
	kind: "FittableRows",
  classes: "enyo-fit enyo-unselectable contentBg",
	components: [
      { kind:"Header",etiqueta:"Profesores"},
      { kind:"Lista-Profesores",name:"listaDatos"},
      { kind:"Footer" }
	],
 
	create: function(){
    this.inherited(arguments);
      this.conectorDatos();
	},
  
  conectorDatos:function() {
      var ajax = new enyo.Ajax({
          //url: "http://localhost/proyectos/trabajopa/datosLista.php",
          url:"../datosLista.php",
      });

      ajax.go({
              format:"json",
              peticion:"profesores"
            });
      ajax.response(this, "processResponse");
      // handle error
      //ajax.error(this, "processError");
  },

  processResponse:function(inRequest, inResponse){
    if (!inResponse) return;
    //console.log(inResponse);
    //console.log("voy a llamar a profesores");

    this.$.listaDatos.data=inResponse;
    this.$.listaDatos.refreshList();
    //console.log("Ya llame a profesores");
  },
  
  addLista: function(inResult) {
    //console.log(inResult);
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
    //console.log("soy Lugares y Me llego "+ elemento);
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