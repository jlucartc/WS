<?php
    require_once 'pdo.php';

    $cidades = $pdo->prepare("SELECT * FROM CIDADES ORDER BY NOME");

    $cidades->execute();

    $cidades = $cidades->fetchAll();

    foreach ($cidades as $cidade) {
      ?>
      <option value="<?php echo $cidade['nome']; ?>"><?php echo $cidade['nome']; ?></option>
      <?php
    }

 ?>
