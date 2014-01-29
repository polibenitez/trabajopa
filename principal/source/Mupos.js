var control="Edificios";
enyo.kind({
  name: "Mupos",
  kind: "FittableRows",
  classes: "onyx enyo-fit",
  components: [
    {kind:"Cabecera"},
    {kind: "Panels",name:"paneles", fit: true, realtimeFit:true, classes: "panels-sample-sliding-panels", arrangerKind: "CollapsingArranger", wrap: false,onBack:"handlePanelBubble", components: [
      //aqui podemos añadir otro panel con el que podemos mostrar las categorias
      {name:"sitios",onItemTap:"handleItemBubble1",components:[
        {kind:"Lista-Entidades"}
      ]},
      {name: "lugares",onItemTapEdificio:"handleItemBubble2", components: [
        {kind:"Edificios",name:"listaEdificios"}
      ]},
      {name: "mapaPanel", components: [
        {kind:"Mapa",name:"mapa",url:null}
      ]}
    ]}
  ],
  handleItemBubble1: function(inSender,inEvent){
    //this.$.listaLugares.actualizarLista(inEvent.name);
    this.$.paneles.next();

    //console.log("**********Me presionaron********");
    
      if(inEvent.name!=control){
        console.log(inEvent.name+" NO igual a "+ control);
        control=inEvent.name;
          switch(control){
            case "Edificios":
                  console.log("vamos a crear edificios");
                  this.createEdificios();
                  break;
            case "Profesores":
                  console.log("vamos a crear Profesores");
                  this.createProfesores();
                  break;
            case "Comida":
                  console.log("vamos a crear Comida");
                  break;
            case "Transporte":
                  console.log("vamos a crear Transporte");
                  break;
            case "Aparcamientos":
                  console.log("vamos a crear Aparcamientos");
                  break;
            case "Instalaciones Deportivas":
                  console.log("vamos a crear Instalaciones Deportivas");
                  break;
            case "Para Estudiantes":
                  console.log("vamos a crear Para Estudiantes");
                  break;
            default:
            console.log("no vamos a crear nada");
            break;
          }
      }else{
        console.log(inEvent.name+" es igual a "+ control);
      }
  },
  handleItemBubble2 :function(inSender,inEvent){
    //this.$.listaLugares.actualizarLista(inEvent.name);
    this.$.paneles.setIndex(2);
    //console.log("me llega desde edificios "+inEvent.ubicacion);
    var ubicacion=inEvent.ubicacion.split(";");
    //console.log(ubicacion);
    var latitud=ubicacion[0];
    var longitud=ubicacion[1];
    this.$.mapa.$.iframe.setSrc("./source/mapa/mapas.html?latitud="+latitud+"&longitud="+longitud);
  },
  /*setupItem: function(inSender, inEvent) {
    this.$[inSender.item].setContent("This is row number: " + inEvent.index);
  },
  checkboxChange: function(inSender) {
    this.log();
    this.$.panels.realtimeFit = inSender.getValue();
  }*/
  handlePanelBubble: function(inSender,inEvent){
    this.$.paneles.previous();
  },

  createEdificios: function(){
      this.$.lugares.destroyClientControls();
      //Profesores
      this.createComponent({
        kind: Edificios,
        name: "listaEdificios",
        container: this.$.lugares,
      });
      this.$.lugares.render();
  },

  createProfesores:function() {
      this.$.lugares.destroyClientControls();
      //Profesores
      this.createComponent({
        kind: Profesores,
        name: "listaProfesores",
        container: this.$.lugares,
      });
      this.$.lugares.render();
  }
});