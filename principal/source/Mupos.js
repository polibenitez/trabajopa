var control="Edificios";
enyo.kind({
  name: "Mupos",
  kind: "FittableRows",
  classes: "onyx enyo-fit",
  components: [
    {kind:"Cabecera"},
    {kind: "Panels",name:"paneles", fit: true, realtimeFit:true, classes: "panels-sample-sliding-panels", arrangerKind: "CollapsingArranger", wrap: false,onBack:"handlePanelBubble", components: [
      {name:"sitios",onItemTap:"handleItemBubble1",components:[
        {kind:"Lista-Entidades"}
      ]},
      {name: "lugares",onItemTapEdificio:"handleItemBubble2", components: [
        {kind:"Edificios",name:"listaEdificios"}
      ]},
      {name: "mapaPanel", components: [
        {kind:"Mapa",touch:true,name:"mapa",url:null}
      ]}
    ]}
  ],
  handleItemBubble1: function(inSender,inEvent){
    this.$.paneles.next();
      if(inEvent.name!=control){
        //console.log(inEvent.name+" NO igual a "+ control);
        control=inEvent.name;
          switch(control){
            case "Edificios":
                  //console.log("vamos a crear edificios");
                  this.createEdificios();
                  this.$.mapa.$.iframe.setSrc("./source/mapa/edificios.html?latitud="+0+"&longitud="+0);
                  
                  break;
            case "Profesores":
                  //console.log("vamos a crear Profesores");
                  this.createProfesores();
                  this.$.mapa.$.iframe.setSrc("./source/mapa/profesores.html");
                  break;
            case "Comida":
                  //console.log("vamos a crear Comida");
                  //this.$.mapa.$.iframe.setSrc("./source/mapa/comidas.html");
                  this.createComida();
                  this.$.mapa.$.iframe.setSrc("./source/mapa/comidas.html?latitud="+0+"&longitud="+0);
                  
                  break;
            case "Transporte":
                  //console.log("vamos a crear Transporte");
                  this.createTransporte();
                  this.$.mapa.$.iframe.setSrc("./source/mapa/transportes.html?latitud="+0+"&longitud="+0);
                  break;
            case "Aparcamientos":
                  //console.log("vamos a crear Aparcamientos");
                  this.createAparcamientos();
                  this.$.mapa.$.iframe.setSrc("./source/mapa/aparcamientos.html?latitud="+0+"&longitud="+0);
                  break;
            case "Instalaciones Deportivas":
                  //console.log("vamos a crear Instalaciones Deportivas");
                  this.createDeportes();
                  this.$.mapa.$.iframe.setSrc("./source/mapa/deportes.html?latitud="+0+"&longitud="+0);
                  break;
            case "Para Estudiantes":
                  //console.log("vamos a crear Para Estudiantes");
                  this.createEstudiantes();
                  this.$.mapa.$.iframe.setSrc("./source/mapa/estudiantes.html?latitud="+0+"&longitud="+0);
                  break;
            default:
            console.log("no vamos a crear nada");
            break;
          }
      }
  },
  handleItemBubble2 :function(inSender,inEvent){
    this.$.paneles.setIndex(2);
    var ubicacion=inEvent.ubicacion.split(";");
    var latitud=ubicacion[0];
    var longitud=ubicacion[1];

          switch(control){
            case "Edificios":
                  this.$.mapa.$.iframe.setSrc("./source/mapa/edificios.html?latitud="+latitud+"&longitud="+longitud);
                  break;
            case "Profesores":
                  this.$.mapa.$.iframe.setSrc("./source/mapa/profesores.html?latitud="+latitud+"&longitud="+longitud+"&id="+inEvent.id);
                  break;
            case "Comida":
                  this.$.mapa.$.iframe.setSrc("./source/mapa/comidas.html?latitud="+latitud+"&longitud="+longitud);
                  break;
            case "Transporte":
                  this.$.mapa.$.iframe.setSrc("./source/mapa/transportes.html?latitud="+latitud+"&longitud="+longitud);
                  break;
            case "Aparcamientos":
                  this.$.mapa.$.iframe.setSrc("./source/mapa/aparcamientos.html?latitud="+latitud+"&longitud="+longitud);
                  break;
            case "Instalaciones Deportivas":
                  this.$.mapa.$.iframe.setSrc("./source/mapa/deportes.html?latitud="+latitud+"&longitud="+longitud);
                  break;
            case "Para Estudiantes":
                  this.$.mapa.$.iframe.setSrc("./source/mapa/estudiantes.html?latitud="+latitud+"&longitud="+longitud);
                  break;
            default:
            console.log("no vamos a crear nada");
            break;
          }
  },
  handlePanelBubble: function(inSender,inEvent){
    this.$.paneles.previous();
  },

  createEdificios: function(){
      this.$.lugares.destroyClientControls();
      this.createComponent({
        kind: Edificios,
        name: "listaEdificios",
        container: this.$.lugares,
      });
      this.$.lugares.render();
  },

  createProfesores:function() {
      this.$.lugares.destroyClientControls();
      this.createComponent({
        kind: Profesores,
        name: "listaProfesores",
        container: this.$.lugares,
      });
      this.$.lugares.render();
  },

  createComida:function() {
      this.$.lugares.destroyClientControls();
      this.createComponent({
        kind: Comida,
        name: "listaComida",
        container: this.$.lugares,
      });
      this.$.lugares.render();
  },

  createTransporte:function() {
      this.$.lugares.destroyClientControls();
      this.createComponent({
        kind: Transporte,
        name: "listaTransporte",
        container: this.$.lugares,
      });
      this.$.lugares.render();
  },

  createAparcamientos:function() {
      this.$.lugares.destroyClientControls();
      this.createComponent({
        kind: Aparcamientos,
        name: "listaAparcamientos",
        container: this.$.lugares,
      });
      this.$.lugares.render();
  },

  createDeportes:function() {
      this.$.lugares.destroyClientControls();
      this.createComponent({
        kind: Deportes,
        name: "listaDeportes",
        container: this.$.lugares,
      });
      this.$.lugares.render();
  },

  createEstudiantes:function() {
      this.$.lugares.destroyClientControls();
      this.createComponent({
        kind: Estudiantes,
        name: "listaEstudiantes",
        container: this.$.lugares,
      });
      this.$.lugares.render();
  }
});