enyo.kind({
    name: "Footer",
    kind: "Control",
    components: [
        {
            kind: "onyx.Toolbar",
            layoutKind: "FittableColumnsLayout",
             components:[
                {
                    tag:"h1",
                    fit:true,
                    content:"Selecciona",
                    classes:"headerTextTitle",
                    style:"text-align:center"
                }
             ]
        }
    ]
});