enyo.kind({
    name: "SearchableList",
    kind: "FittableRows",
    fit:true,
    components: [
    	/*{
    		name:"txtSearchInput",
    		kind:"SearchInput",
    		classes:"padding10px",
    		placeholder:"Buscar...",
    		onSearchInput:"handleSearchInput"
    	},*/
        {
    		name: "list", 
    		kind: "List", 
    		fit:true, 
    		count:0, 
    		touch:true, 
    		onSetupItem: "setupItem", 
    		components: [
    			{
    				name: "listItemContainer", 
    				ontap:'listItemTapped', 
    				classes:"listItemContainer",
    				components: [
						{
                            kind:"onyx.Item",
							name: "item",
							classes:"padding10px",
							content:"titulo",
                            //ontap:'itemTapped', 
						}
    				]
    			}
    		]
    	}
    ],
    published:{
        data:null,
        filteredTaffyDB:null,
        resultFilteredArray:null,
        searchInput:""		
    },
    create: function() {
        this.inherited(arguments);
        //Standard routine check if data is null.
        if(this.data != null){
            this.dataChanged();
        }
        //console.log(this.data);
    },
    dataChanged:function(){
    	// When setData is called or contructor itself having data, 
    	// then dataChanged will fire.
    	// Meaning there's data passing into this control.
    	
        // instead of usual List.setCount(this.data.length);
        // We trigger a function called filterList() which uses
        // Taffy to preprocess / filter our data.
        if (this.data != null){
            this.filteredTaffyDB = TAFFY(this.data);
            // Convert this.data into a fully TAFFYDB object.
            this.filterList();
        }
    },
    filterList:function(){
        // filterList task
        // 1. reset all List.
        // 2. perform a TaffyDB likenocase query based on this.searchInput (by default is "")
        // 3. place resulFilteredArray result length to empower the list.
        // 4. list.refresh ensure all item are rerender should any changes happen again.
        this.$.list.reset();    
            
        
        //likenocase is a TAFFY syntax that filters without any case sensitivity.
        //get is a method to return an array of result.
        //console.log( this.filteredTaffyDB({name:{likenocase:this.searchInput}}).get() );
        this.resultFilteredArray = this.filteredTaffyDB({name:{likenocase:this.searchInput}}).get();
        this.$.list.setCount(this.resultFilteredArray.length);
        this.$.list.refresh();
        // With this resultFilteredArray's length trigger the List to populate.
        // Using the setCount method which trigger (this.data.length) amount 
        // of setupItem.
    },
    setupItem:function(inSender,inEvent) {
        //console.log(this.resultFilteredArray[inEvent.index]);
        this.$.item.setContent(this.resultFilteredArray[inEvent.index].name);
        this.$.item.addRemoveClass("item-sample-selected", inSender.isSelected(inEvent.index));
        //this.$.item.addRemoveClass("list-sample-selected", inSender.isSelected(inEvent.index));
        //this.$.item.setContent("hola");
        //console.log(inEvent);
    },
    handleSearchInput:function(inSender,inEvent) {
    	// Capture Input from search's bubble.
        this.searchInput = inEvent.value;
        this.filterList();
    },
    listItemTapped:function(inSender,inEvent) {
        //this.$.item.setStyle("background-color:red");
        
        //this.$.item.setStyle("color:#777");
        //console.log("index : "+this.$.item.getContent()+" es presionado");
        //this.$.item.setStyle("background-color:white");
        //this.$.list.reset();
        //this.$.item.setStyle("background-color:lightblue");
        //this.$.item.setStyle("color:white");
        //this.$.item.applyStyle("color", "red");
        //console.log("index : "+inEvent.index+" es presionado");
        //console.log("index : "+this.$.item.getContent()+" es presionado");
        //console.log("otro  : "+this.$.listItemContainer.$.item.isSelected()+" es presionado");
        

        //console.log(this.data[inEvent.index]);
        //this.bubble("onItemTap",inSender);
        this.bubble("onItemTap",this.data[inEvent.index]);
        inEvent.preventDefault();
        
    }/*,
    itemTapped:function(inSender,inEvent){
        console.log("mi prueba es con: "+inSender.getContent()+"y el index me dice "+inEvent.index);
        //console.log("este es de lista "+this.$.list.select(inEvent.index).getContent());
        //this.$.list(inEvent.index).setSelectedColor("red");                                               
        //var item=inEvent.item;
        //console.log(item.content);
        //console.log("Presionado");
    }*/
});
