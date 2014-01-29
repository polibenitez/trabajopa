enyo.kind({
    name: "Cabecera",
    kind: "Control",
    components: [
        {
             kind: "onyx.Toolbar",
             layoutKind: "FittableColumnsLayout",
             fit:true,
             components:[
             {tag: "img",classes:"cabecera-menu", attributes: {src: "assets/img/icono_de_mapa.png",style:"height: 40px;"}},
             	{
             		tag:"h1",
             		
             		content:"Mupos",
             		//classes:"headerTextTitle",
             		style:"text-align:left;color:rgb(0,182,233);"
             	},
                {kind:"onyx.Button",name:"login",content:"Entrar", classes:"onyx-blue",style:"float:right",ontap:"handleBtnNextPage"}
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