<!-- Modal -->
<form  method="post" action="<?= url(); ?>/usuarios" class='modal fade' id='cadastrarUsuario' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
    <div class='modal-dialog' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='exampleModalLabel'>Atualização de Usuário</h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
            <?= form_method('POST'); ?>
            <div class='modal-body'>
                <div id='lista_usuarios' class='w3-margin'>

                    <div>
                        <label>Nome</label>
                        <input type='text' name="NOME_COMPLETO" class='w3-input w3-block w3-border'>
                    </div>

                    <div>
                        <label>Login</label>
                        <input type='text' name="LOGIN" class='w3-input w3-block w3-border'>
                    </div>

                    <div>
                        <label>SENHA</label>
                        <input type='text' name="SENHA" class='w3-input w3-block w3-border'>
                    </div>

                    <div>
                        <label>Ativo</label>
                        <input type='text' name="ATIVO" value="S" class='w3-input w3-block w3-border'>
                    </div>

                </div>
            </div>
            <div class='modal-footer'>
                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Fechar</button>
                <button type='submit' class='btn w3-theme'>Cadastrar</button>
            </div>
        </div>
    </div>
</form>