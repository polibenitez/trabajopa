enyo.kind({
    name: "Footer-Principal",
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
                    content:"Pie de pagina principal",
                    classes:"headerTextTitle",
                    style:"text-align:center"
                }
             ]
        }
    ],

    handleBtnBackPage : function(inSender,inEvent){
      //this.openUrl("../gestion/entrar.php");
      this.bubble("onBack",inEvent);
    }
});