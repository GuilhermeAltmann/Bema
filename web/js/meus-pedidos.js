$(document).ready(function(){

    $('.collapsible').collapsible({
        onOpenStart: function(el) { console.log($(el).data("pedido")); }
    });
});
        