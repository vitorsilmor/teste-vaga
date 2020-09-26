jQuery.noConflict();
(function( $ ) {
  $(function() {
    $(document).on('click', '.excluir_usuario', function (e) {
        let usuario = $(this).data("usuario");
    
        $(`select option[value="${usuario}"]`).attr("selected", true);
    
        $('#excluirUsuario').modal('show');
    });
  });
})(jQuery);