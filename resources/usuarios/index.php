

<?php include(__DIR__ . "/../header.php"); ?>
  <script src="static/js/jquery.js"></script>
    <div>
      <div id="lista_usuarios" class="w3-margin">
        <input class="w3-input w3-border w3-margin-top" type="text" placeholder="Nome">
        <button class="w3-button w3-theme w3-margin-top">Buscar</button>
        <button class="w3-button w3-theme w3-margin-top w3-right">Cadastrar novo usuário</button>

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
            <?php foreach($data['usuarios'] as $usuario): ?>
              <tr>
                <td><?= $usuario->NOME_COMPLETO; ?></td>
                <td><?= $usuario->LOGIN; ?></td>
                <td><?= $usuario->ATIVO == 1 ? 'SIM' : 'NÃO'; ?></td>
                <td>
                  <button class="w3-button w3-theme w3-margin-top"><i class="fas fa-user-times"></i></button>
                  <button class="w3-button w3-theme w3-margin-top"><i class="fas fa-edit"></i></button>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>

      </div>
    </div>
<?php include(__DIR__ . "/../footer.php"); ?>