$(document).ready(function(){

    $('.collapsible').collapsible({
        onOpenStart: function(el) { 

            var idpedido = $(el).data("pedido"); 

            $.ajax({
                url: "?r=/site/descricaocompleta",
                method: "GET",
                data: {"idpedido": idpedido}
              }).then(
                // success
                function( html, textStatus, jqXHR ) {
                     $(el).find(".collapsible-body").html(html);
                },
                // error
                function( jqXHR, textStatus, errorThrown ) { 
                    alert("Erro ao tentar trazer informações do pedido");
                }
            );  
        }
    });
});
        