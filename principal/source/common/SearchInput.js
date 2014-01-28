enyo.kind({
    name: "SearchInput",
    kind: "Control",
    layoutKind: "FittableColumnsLayout",
    components: [
        {
        	kind:"onyx.InputDecorator",
        	name: "inputTextDecorator",
        	fit:true,
        	style:"background:#fff",
        	components:[
        		{
        			kind:"onyx.Input",
        			name:"txtInput",
        			oninput:"inputChanged",
                    onchange:"valueChanged"
        		}
        	]
        }
    ],
    published:{
       placeholder:""		
    },
    create:function() {
    	this.inherited(arguments);
    	this.placeholderChanged();
    },
    placeholderChanged:function() {
    	this.$.txtInput.setAttribute("placeholder",this.placeholder);
    },
    inputChanged:function(inSender,inEvent) {
    	//on Type bubble out an event to the parent.
    	this.bubble("onSearchInput",{value:this.$.txtInput.getValue()});
    }
});