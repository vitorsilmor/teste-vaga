

<?php include(__DIR__ . "/../header.php"); ?>
  <script src="static/js/jquery.js"></script>
    <form method="post" action="<?= url(); ?>/usuarios/<?= $data['usuario']->USUARIO_ID ?>">
      <?php if(isset($_GET['userDeleted'])) : ?>
        <div class="alert alert-success" style="margin:10px 0 0 0">
            O usuario de id <?= $_GET['userDeleted'] ?> foi excluído do sistema
        </div>
      <?php endif; ?>
      <div id="lista_usuarios" class="w3-margin">

        <?= form_method('PUT'); ?>
        <div>
            <label>Nome</label>
            <input type="text" name="NOME_COMPLETO" value="<?= $data['usuario']->NOME_COMPLETO; ?>" class="w3-input w3-block w3-border">
        </div>

        <div>
            <label>Login</label>
            <input type="text"  name="LOGIN" value="<?= $data['usuario']->LOGIN; ?>" class="w3-input w3-block w3-border">
        </div>

        <div>
            <label>Ativo</label>
            <input type="text" name="ATIVO" value="<?= $data['usuario']->ATIVO; ?>" class="w3-input w3-block w3-border">
        </div>

        <button class="w3-button w3-theme w3-margin-top w3-margin-bottom">Gravar</button>
        <button class="w3-button w3-margin-top w3-margin-bottom w3-right">Cancelar</button>
      </div>
    </div>




<?php include(__DIR__ . "/../footer.php"); ?>