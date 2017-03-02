<?php

require_once 'pdo.php';

include("jpgraph/src/jpgraph.php");
include("jpgraph/src/jpgraph_pie.php");

$cidades = $pdo->prepare("SELECT COUNT(*),cidade FROM CLIENTES GROUP BY CIDADE");

$cidades->execute();

$cidades = $cidades->fetchAll();

$data = array();

$legendas = array();

foreach($cidades as $cidade){
  $data[] = $cidade['COUNT(*)'];
  $legendas[] = $cidade['cidade'];
}

$pieGraph = new PieGraph(600,600);
$pieGraph->setShadow();

$pieGraph->title->set('Clientes por cidade: ');

$piePlot = new PiePlot($data);

$piePlot->setLegends($legendas);

$pieGraph->Add($piePlot);

$pieGraph->Stroke();



?>
