enyo.kind({
    name: "Footer-Principal",
    kind: "Control",
    components: [
        {
            kind: "onyx.MoreToolbar",
            //layoutKind: "FittableColumnsLayout",
            fit:true,
             components:[
                {kind: "onyx.Grabber", ontap:"handleBtnBackPage"},
                //{tag:"h1",content:"Mupos",style:"color:olive;"},
                //{tag: "img",classes:"cabecera-menu",content:"Recomienda",ontap:"tapHandler", attributes: {src: "assets/img/icon-chrome.png"}},
                

                    /*{kind: "onyx.MenuDecorator", components: [
                    {kind:onyx.IconButton, src: "assets/img/icon-chrome1.png"},
                    {kind: "onyx.ContextualPopup", name:"facebook",
                        title:"Toolbar Button",
                        floating:true,
                        actionButtons:[
                            {content:"test1", classes: "onyx-button-warning"},
                            {content:"Dismiss", name:"dismiss_button"}
                        ],
                        components: [
                            {content:"testing 1"},
                            {content:"testing 2"},
                            {content:"testing 3"},
                            {content:"testing 4"},
                            {content:"testing 5"},
                            {content:"testing 6"}
                        ]
                    }
                ]},*/
                
                {tag: "img",classes:"cabecera-menu",content:"Informaci\u00F3n",ontap:"tapInformacion", attributes: {src: "assets/img/icon_informacion.png"}},
                {tag: "img",classes:"cabecera-menu",content:"Sugerencias",ontap:"tapSugerencia", attributes: {src: "assets/img/icon_email.png"}},
                //
             ]
        },
        {kind: "PopupWindow", name: "popup", onWindowClosed: "closed"}
    ],

    handleBtnBackPage : function(inSender,inEvent){
      //this.openUrl("../gestion/entrar.php");
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
            enyo.log(inEvent.popup);    //info about popup it's coming from
            enyo.log("action button index: " + inEvent.originator.index); //index of action button
            enyo.log("action button name: " + inEvent.originator.name); //name of action button (you can set this - see example use below)

            //if (inEvent.originator.name == "dismiss_button"){
                inEvent.popup.hide();
            //}
        }
    }
});