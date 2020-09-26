

<?php include(__DIR__ . "/../header.php"); ?>
  <script src="static/js/jquery.js"></script>
    <div>
      <?php if(isset($_GET['userDeleted'])) : ?>
        <div class="alert alert-success" style="margin:10px 0 0 0">
            O usuario de id <?= $_GET['userDeleted'] ?> foi excluído do sistema
        </div>
      <?php endif; ?>
      <div id="lista_usuarios" class="w3-margin">

        <input class="w3-input w3-border w3-margin-top" type="text" placeholder="Nome">
        <button class="w3-button w3-theme w3-margin-top">Buscar</button>
        
        <button class="w3-button w3-theme w3-margin-top w3-right"  data-toggle="modal" data-target="#excluirUsuario" style="margin-left:10px">Excluir Usuário</button>
        <button class="w3-button w3-theme w3-margin-top w3-right"  data-toggle="modal" data-target="#cadastrarUsuario">Cadastrar novo usuário</button>
        <table>
          <thead>
            <tr>
              <th>Nome</td>
              <th>Login</td>
              <th>Ativo</td>
              <th>Opções</td>  
            </tr>
          </thead>
          <tbody id="tabela-usuarios">
            
          </tbody>
        </table>

      </div>
    </div>

<script src="<?= url() ?>/static/js/usuarios_index.js"></script>

<?= call_modal('forms.cadastro'); ?>
<?= call_modal('forms.excluir', $data); ?>
<?= call_modal('forms.atualizar'); ?>

<?php include(__DIR__ . "/../footer.php"); ?>