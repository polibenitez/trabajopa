enyo.kind({
    name: "Cabecera",
    kind: "Control",
    components: [
        {kind: "onyx.Toolbar",layoutKind:"FittableColumnsLayout",style:"padding-top:0px;",components: [
              {style:"width:35px;",components:[
                    {tag: "img",classes:"cabecera-menu", attributes: {src: "assets/img/icono_de_mapa.png",style:"height: 45px;"}},
                ]},
              {content:"MUPOS",style:"text-align:left;color:rgb(0,182,233);font-size:1.6em;font-style: oblique;font-weight:bold ;",fit:true},
              {kind:"onyx.Button",name:"login",content:"Entrar", classes:"onyx-blue",ontap:"handleBtnNextPage"}
          ]
      },
        {kind: "PopupWindow", name: "popup", onWindowClosed: "closed"}
    ],
    
    handleBtnNextPage : function(inSender,inEvent){
      this.openUrl("../gestion/entrar.php");
    },
    openUrl : function(inSender) {
      this.$.popup.setUrl(inSender);
      this.$.popup.open();
    }
}); 