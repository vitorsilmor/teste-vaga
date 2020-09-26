
<?php include(__DIR__ . "/../header.php"); ?>
    <div>
      <div id="lista_usuarios" class="w3-margin">
        <form method="post" action="<?= url(); ?>/search">
          <?php form_method("POST"); ?>
          <input class="w3-input w3-border w3-margin-top" name="nome" value="<?= $_POST['nome'];?>"type="text" placeholder="Nome">
          <button type="submit" class="w3-button w3-theme w3-margin-top">Buscar</button>
        </form>
        <table>
          <thead>
            <tr>
              <th>Nome</td>
              <th>Login</td>
              <th>Ativo</td>
              <th>Opções</td>  
            </tr>
          </thead>
          <tbody>
            <?php foreach($data['usuarios'] as $usuario) : ?>
            <tr>
              <td><?= $usuario->NOME_COMPLETO; ?></td>
              <td><?= $usuario->LOGIN; ?></td>
              <td><?= $usuario->ATIVO == 'S' ? 'SIM' : 'NÃO'; ?></td>
              <td>
                <button class="excluir_usuario w3-button w3-theme w3-margin-top" data-usuario="${usuario.USUARIO_ID}"><i class="fas fa-user-times"></i></button>
                <a class="w3-button w3-theme w3-margin-top" href="<?= url() . "/usuarios/$usuario->USUARIO_ID"; ?>"><i class="fas fa-edit"></i></a>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>

      </div>
<script src="<?= url() ?>/static/js/usuarios_search.js"></script>

<?= call_modal('forms.excluir', $data); ?>

<?php include(__DIR__ . "/../footer.php"); ?>