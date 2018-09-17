$(document).ready(function(){

    $('a[data-confirm-cliente]').click(function(ev){
        var hrefx = $(this).attr('href');
        if(!$('#confirm-delete-cliente').length){
            $('body').append('<div class="modal fade" id="confirm-delete-cliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header">Excluir Cliente<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Deseja excluir este cliente?</div><div class="modal-footer"><button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button><a class="btn btn-danger text-white" id="dataConfirmClienteOK" >Excluir</a></div></div></div></div>');
        }
        $('#dataConfirmClienteOK').attr('href',hrefx)
        $('#confirm-delete-cliente').modal({shown:true});
        return false;
    });

});