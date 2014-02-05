enyo.kind({
	name: "Mapa",
	kind: "FittableRows",
  classes: "enyo-fit enyo-unselectable contentBg mapa",
  touch:true,
	components: [
      {fit: true,touch:true, name: "iframe",src:"./source/mapa/edificios.html?latitud="+0+"&longitud="+0,classes:"frame", tag: "iframe", onload: "frameload", attributes: {onload: enyo.bubbler}},
      {kind:"Footer-Principal" }
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