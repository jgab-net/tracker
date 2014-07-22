var Messages=(function(){
    var construct = function(){
        this.messages=[];
    };

    construct.prototype={
        addLaravelMessage:function(messageBagList){
            console.log(messageBagList);
            for(var property in messageBagList){
                this.messages=(this.messages.concat(messageBagList[property]));
            }
            return this;
        },
        show:function(){
            var time=0;
            for(var i=0;i<this.messages.length;i++){
                setTimeout(function(message){
                    return function(){
                        toastr.error(message);
                    }
                }(this.messages[i]),time+=500);
            }
        }
    };

    return construct;
}());