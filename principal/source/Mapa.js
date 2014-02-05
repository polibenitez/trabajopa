enyo.kind({
	name: "Mapa",
	kind: "FittableRows",
  classes: "enyo-fit enyo-unselectable contentBg mapa",
  touch:true,
	components: [
      //{fit: true, name: "iframe",src:"./source/mapa/mapas.html?latitud=37.35785&longitud=-5.93400",classes:"frame", tag: "iframe", onload: "frameload", attributes: {onload: enyo.bubbler}},
      {fit: true,touch:true, name: "iframe",src:"./source/mapa/edificios.html?latitud="+0+"&longitud="+0,classes:"frame", tag: "iframe", onload: "frameload", attributes: {onload: enyo.bubbler}},
      { kind:"Footer-Principal" }//crear un footer perznalizadon con opciones de un pie de página normal, como contact, sugerencias, etc..
	],
  
  published:{
    url:null
  },

	create: function(){
    this.inherited(arguments);
    this.onChangeUrl();
	},

  onChangeUrl: function(){
    if(this.url){
      this.$.iframe.setSrc(this.url);
    }
  }

});