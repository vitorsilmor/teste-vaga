
let url = window.location.origin;

$.get(`${url}/usuarios/index/json/data`, (function (data) {
    let obj = JSON.parse(data);
    $('.barra-logado').html(obj.logado);

    obj.usuarios.forEach(usuario => {
        $(`
                <tr>
                    <td>${usuario.NOME_COMPLETO}</td>
                    <td>${usuario.LOGIN}</td>
                    <td>${usuario.ATIVO == 'S' ? 'SIM' : 'NÃO'}</td>
                    <td>
                    <button class="excluir_usuario w3-button w3-theme w3-margin-top" data-usuario="${usuario.USUARIO_ID}"><i class="fas fa-user-times"></i></button>
                    <button type="button" class="atualizar_usuario w3-button w3-theme w3-margin-top"><i class="fas fa-edit"></i></button>
                    </td>
                </tr>
            `).appendTo('#tabela-usuarios');
    });
}));


$(document).on('click', '.excluir_usuario', function (e) {
    let usuario = $(this).data("usuario");

    $(`select option[value="${usuario}"]`).attr("selected", true);

    $('#excluirUsuario').modal('show');
});









