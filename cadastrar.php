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
    <?php
    require_once 'pdo.php';
    if(isset($_POST['nome']) && isset($_POST['nascimento']) && isset($_POST['cidade']) && isset($_POST['CPF']) && isset($_POST['renda'])){
      $insert = $pdo->prepare("INSERT INTO CLIENTES (nome,nascimento,cidade,cpf,renda) VALUES (?,?,?,?,?)");
      $insert->execute(array($_POST['nome'],$_POST['nascimento'],$_POST['cidade'],$_POST['CPF'],$_POST['renda']));
      if(!preg_match("#^(0[1-9]|[1-2][0-9]|3[0-1])/(0[1-9]|1[0-2])/[0-9]{4}$#",$_POST['nascimento'])){
        ?>
        <h1 class="alert alert-danger">Erro no formato da data de nascimento.</h1>
        <br><br><button class="btn btn-primary" type="button" name="button" onclick="window.location = 'index.php' ">Voltar</button>
        <?php
      }
      else if($insert){
        ?>
        <h1 class="alert alert-success">Cadastro feito com sucesso!</h1>
        <br><br><button class="btn btn-primary" type="button" name="button" onclick="window.location = 'index.php' ">Voltar</button>
        <?php
      }
    }else{
      ?>
      <h1 class="alert alert-danger">Cadastro inválido</h1>
      <br><br><button class="btn btn-primary" type="button" name="button" onclick="window.location = 'index.php' ">Voltar</button>
      <?php
    }

    ?>
  </body>
</html>
