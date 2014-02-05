enyo.kind({
    name: "Footer-Principal",
    kind: "Control",
    components: [
        {
            kind: "onyx.MoreToolbar",
            fit:true,
             components:[
                {kind: "onyx.Grabber", ontap:"handleBtnBackPage"},
                {tag: "img",classes:"cabecera-menu",content:"Informaci\u00F3n",ontap:"tapInformacion", attributes: {src: "assets/img/icon_informacion.png"}},
                {tag: "img",classes:"cabecera-menu",content:"Sugerencias",ontap:"tapSugerencia", attributes: {src: "assets/img/icon_email.png"}},
             ]
        },
        {kind: "PopupWindow", name: "popup", onWindowClosed: "closed"}
    ],

    handleBtnBackPage : function(inSender,inEvent){
      this.bubble("onBack",inEvent);
    },

    tapInformacion:function(inSender,inEvent){
        this.openUrl("../informacion.html");
    },

    tapSugerencia:function(inSender,inEvent){
        this.openUrl("../sugerencias/sugerencias.php");
    },

    openUrl : function(inSender) {
      this.$.popup.setUrl(inSender);
      this.$.popup.open();
    },

    tapHandler: function(inSender, inEvent) {
        if (inEvent.actionButton) {
            enyo.log(inEvent.popup);
            enyo.log("action button index: " + inEvent.originator.index);
            enyo.log("action button name: " + inEvent.originator.name);
                inEvent.popup.hide();
        }
    }
});