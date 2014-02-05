enyo.kind({
    name: "Footer",
    kind: "Control",
    components: [
        {
            kind: "onyx.Toolbar",
            layoutKind: "FittableColumnsLayout",
             components:[
                {kind: "onyx.Grabber", ontap:"handleBtnBackPage"},
                {
                    tag:"h1",
                    fit:true,
                    content:"Selecciona",
                    classes:"headerTextTitle",
                    style:"text-align:center"
                }
             ]
        }
    ],
    handleBtnBackPage : function(inSender,inEvent){
      this.bubble("onBack",inEvent);
    }
});