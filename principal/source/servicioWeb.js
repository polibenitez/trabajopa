enyo.kind({
    name: "PopupWindow",
    kind: enyo.Component,
    published: {
        url: "",
        options: ""
    },
    statics: {
        idIndex: 0
    },
    events: {
        onWindowClosed: ""
    },
    //* @protected
    window: null,
    //* @public
    focus: function() {
        this.window != null && this.window.focus();
    },
    open: function() {
        this.windowName = "popup" + PopupWindow.idIndex;
        this.window = window.open(this.url, this.windowName, this.options);
        // increment the idIndex property of Popup, not just this instance
        PopupWindow.idIndex++;
        
        // check if it's closed every 250s
        this.interval = setInterval(enyo.bind(this, this.checkIfClosed), 250);
    },
    checkIfClosed: function() {
        if (this.window.closed == true) {
            this.doWindowClosed({
                window: this.window
            });
            
            clearInterval(this.interval);
        }
    }
});