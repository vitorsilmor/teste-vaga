<!-- Modal -->
<form  method="post" action="<?= url(); ?>/usuarios" class='modal fade' id='excluirUsuario' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
    <div class='modal-dialog' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='exampleModalLabel'>Cadastro de Usuários</h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
            <div class='modal-body'>
                <div id='lista_usuarios' class='w3-margin'>
                <?= form_method('DELETE'); ?>
                <div class="form-group">
                    <label for="usuarios">Selecione o usuário que deseja excluir.</label>
                    <select class="form-control" id="usuarios" name="USUARIO_ID">
                        <?php foreach($data['usuarios'] as $usuario): ?>
                            <option value="<?= $usuario->USUARIO_ID; ?>"><?= $usuario->NOME_COMPLETO; ?></option>>
                        <?php endforeach; ?>
                    </select>
                </div>

                </div>
            </div>
            <div class='modal-footer'>
                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Fechar</button>
                <button type='submit' class='btn w3-theme'>Excluir</button>
            </div>
        </div>
    </div>
</form>