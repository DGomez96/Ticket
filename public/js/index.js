$(document).ready(function(){
    console.log('Jquery Start!');

    
    $("[id*='commentButton']").click((element)=>{
        $('#idTicketComentario').empty();
        let idT = element.target.attributes[2].nodeValue;
        console.log(element.target.attributes);
        $('#idTicketComentario').val(idT);
        $('#comentarTicket').modal('show');
    });

  
    $("[id*='statusButton']").click(function(element){
        $('#idTicket').empty();
        let idT = element.target.attributes[2].nodeValue;
        $('#idTicket').val(idT);
        if(window.location.pathname != '/invoice'){
            $('#cambiar').modal('show');
        }else{
            $('#cambiarInvoice').modal('show');
        }
    });

});