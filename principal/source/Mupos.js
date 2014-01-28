enyo.kind({
  name: "Mupos",
  kind: "FittableRows",
  classes: "onyx enyo-fit",
  components: [
    {kind:"Cabecera"},
    {kind: "Panels",name:"paneles", fit: true, realtimeFit:true, classes: "panels-sample-sliding-panels", arrangerKind: "CollapsingArranger", wrap: false, components: [
      //aqui podemos añadir otro panel con el que podemos mostrar las categorias
      {name:"sitios",components:[
        {kind:"Lista-Entidades",onItemTap:"handleItemBubble1"}
      ]},
      {name: "lugares", components: [
        {kind:"Edificios",name:"listaLugares",onItemTapEdificio:"handleItemBubble2"}
      ]},
      {name: "mapaPanel", components: [
        /*{kind: "Scroller",touch: true, components: [
          //{classes: "panels-sample-sliding-content", content: "Broke, down dumb hospitality firewood chitlins. Has mud tired uncle everlastin' cold, out. Hauled thar, up thar tar heffer quarrel farmer fish water is. Simple gritts dogs soap give kickin'. Ain't shiney water range, preacher java rent thar go. Skinned wirey tin farm, trespassin' it, rodeo. Said roped caught creosote go simple. Buffalo butt, jig fried commencin' cipherin' maw, wash. Round-up barefoot jest bible rottgut sittin' trailer shed jezebel. Crop old over poker drinkin' dirt where tools skinned, city-slickers tools liniment mush tarnation. Truck lyin' snakeoil creosote, old a inbred pudneer, slap dirty cain't. Hairy, smokin', nothin' highway hootch pigs drinkin', barefoot bootleg hoosegow mule. Tax-collectors uncle wuz, maw watchin' had jumpin' got redblooded gimmie truck shootin' askin' hootch. No fat ails fire soap cabin jail, reckon if trespassin' fixin' rustle jest liniment. Ya huntin' catfish shot good bankrupt. Fishin' sherrif has, fat cooked shed old. Broke, down dumb hospitality firewood chitlins. Has mud tired uncle everlastin' cold, out. Hauled thar, up thar tar heffer quarrel farmer fish water is. Simple gritts dogs soap give kickin'. Ain't shiney water range, preacher java rent thar go. Skinned wirey tin farm, trespassin' it, rodeo. Said roped caught creosote go simple. Buffalo butt, jig fried commencin' cipherin' maw, wash. Round-up barefoot jest bible rottgut sittin' trailer shed jezebel. Crop old over poker drinkin' dirt where tools skinned, city-slickers tools liniment mush tarnation. Truck lyin' snakeoil creosote, old a inbred pudneer, slap dirty cain't. Hairy, smokin', nothin' highway hootch pigs drinkin', barefoot bootleg hoosegow mule. Tax-collectors uncle wuz, maw watchin' had jumpin' got redblooded gimmie truck shootin' askin' hootch. No fat ails fire soap cabin jail, reckon if trespassin' fixin' rustle jest liniment. Ya huntin' catfish shot good bankrupt. Fishin' sherrif has, fat cooked shed old. Broke, down dumb hospitality firewood chitlins. Has mud tired uncle everlastin' cold, out. Hauled thar, up thar tar heffer quarrel farmer fish water is. Simple gritts dogs soap give kickin'. Ain't shiney water range, preacher java rent thar go. Skinned wirey tin farm, trespassin' it, rodeo. Said roped caught creosote go simple. Buffalo butt, jig fried commencin' cipherin' maw, wash. Round-up barefoot jest bible rottgut sittin' trailer shed jezebel. Crop old over poker drinkin' dirt where tools skinned, city-slickers tools liniment mush tarnation. Truck lyin' snakeoil creosote, old a inbred pudneer, slap dirty cain't. Hairy, smokin', nothin' highway hootch pigs drinkin', barefoot bootleg hoosegow mule. Tax-collectors uncle wuz, maw watchin' had jumpin' got redblooded gimmie truck shootin' askin' hootch. No fat ails fire soap cabin jail, reckon if trespassin' fixin' rustle jest liniment. Ya huntin' catfish shot good bankrupt. Fishin' sherrif has, fat cooked shed old. Broke, down dumb hospitality firewood chitlins. Has mud tired uncle everlastin' cold, out. Hauled thar, up thar tar heffer quarrel farmer fish water is. Simple gritts dogs soap give kickin'. Ain't shiney water range, preacher java rent thar go. Skinned wirey tin farm, trespassin' it, rodeo. Said roped caught creosote go simple. Buffalo butt, jig fried commencin' cipherin' maw, wash. Round-up barefoot jest bible rottgut sittin' trailer shed jezebel. Crop old over poker drinkin' dirt where tools skinned, city-slickers tools liniment mush tarnation. Truck lyin' snakeoil creosote, old a inbred pudneer, slap dirty cain't. Hairy, smokin', nothin' highway hootch pigs drinkin', barefoot bootleg hoosegow mule. Tax-collectors uncle wuz, maw watchin' had jumpin' got redblooded gimmie truck shootin' askin' hootch. No fat ails fire soap cabin jail, reckon if trespassin' fixin' rustle jest liniment. Ya huntin' catfish shot good bankrupt. Fishin' sherrif has, fat cooked shed old."}
          {fit: false, name: "iframe",src:"./source/mapa/mapas.html?latitud=37.35785&longitud=-5.93400", tag: "iframe", onload: "frameload", attributes: {onload: enyo.bubbler},style: "background: transparent;margin-top: 0%;margin-right: 0%;margin-left:5%;border: none;"}
        ]},*/
        {kind:"Mapa",name:"mapa",url:null}
        //{ kind:"Footer"}
      ]}
    ]}
  ],
  handleItemBubble1: function(inSender,inEvent){
    this.$.listaLugares.actualizarLista(inEvent.name);
    this.$.paneles.next();

    //console.log("**********Me presionaron********");
    console.log(inEvent.name);
    //con el nombre del edificio o el id que nos traigamos del evento que recogemos
    //realizamos una consulta a la BBDD o si vemos que es factble traernos los datos
    //completos en JSON de una sola tirada hacemos una búsqueda en el una tabla con
    //los datos.... ya vere como lo implemento

    //this.$.iframe.setSrc("./source/mapa/mapas.html?latitud=37.35785&longitud=-5.93600");

    //this.$.iframe.render();
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
  }
  /*setupItem: function(inSender, inEvent) {
    this.$[inSender.item].setContent("This is row number: " + inEvent.index);
  },
  checkboxChange: function(inSender) {
    this.log();
    this.$.panels.realtimeFit = inSender.getValue();
  }*/
});