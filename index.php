<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

  <div class="container">
    <h2>Cadastro de clientes</h2>
    <form class="form-group" class="" action="cadastrar.php" method="post">
      <label>Nome: </label><br><input type="text" name="nome" value=""  autocomplete="off"><br><br>
      <label>Data de nascimento: </label><br><input type="date" name="nascimento" value="" placeholder="dd/mm/aaaa" autocomplete="off"><br><br>
      <label>Cidade: </label><br><select name="cidade">
        <?php include 'cidades.php'; ?>
      </select><br><br>
      <label>CPF: </label><br><input type="text" name="CPF" value="" autocomplete="off"><br>
      <label>Renda: </label><br><select name="renda">
        <option value="Empregado">Empregado</option>
        <option value="Desempregado">Desempregado</option>
        <option value="Aposentado">Aposentado</option>
        <option value="Estudante">Estudante</option>
      </select><br><br>
      <button class="btn btn-primary" type="submit" name="button">Cadastrar</button><br><br>
    </form>
    <button class="btn btn-success" type="button" name="button" onclick="window.location = 'estatisticas.php' " >Estatísticas</button><br><br>
  </div>
</body>
</html>
