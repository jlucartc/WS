<?php

require_once 'pdo.php';

include("jpgraph/src/jpgraph.php");
include("jpgraph/src/jpgraph_pie.php");

$clientes = $pdo->prepare("SELECT * FROM CLIENTES");

$clientes->execute();

$clientes = $clientes->fetchAll();

$pieGraph = new PieGraph(600,600);
$pieGraph->setShadow();

$maior50 = 0;
$entre5040 = 0;
$entre4030 = 0;
$entre3018 = 0;
$menor18 = 0;

foreach($clientes as $cliente){

  $data = $cliente['nascimento'];
  $dma = explode('/',$data);
  $diff  = date('Y') - $dma[2];

  if($diff > 50){
    $maior50++;
  }else if($diff <= 50 && $diff > 40){
    if($diff == 50 && date('m') >= $dma[1] && date('d') >= $dma[0]){
      $maior50++;
    }else{
      $entre5040++;
    }
  }else if( $diff > 40 ){
    $entre5040++;
  }else if($diff <= 40 && $diff > 30){
    if($diff == 40 && date('m') >= $dma[1] && date('d') >= $dma[0]){
      $entre5040++;
    }else{
      $entre4030++;
    }
  }else if($diff > 30 ){
    $entre4030++;
  }else if($diff <= 30 && $diff > 18){
    if($diff == 30 && date('m') >= $dma[1] && date('d') >= $dma[0]){
      $entre4030++;
    }else{
      $entre3018++;
    }
  }else if($diff >= 18){
    $entre3018++;
  }else if($diff < 18){
    $menor18++;
  }

}

$pieGraph->title->set('Clientes por Idade: ');

$data = array($maior50,$entre5040,$entre4030,$entre3018,$menor18);

$piePlot = new PiePlot($data);

$piePlot->setLegends(array('Mais de 50 anos','Entre 50 e 40 anos','Entre 40 e 30 anos','Entre 30 e 18 anos','Menos de 18 anos'));

$pieGraph->Add($piePlot);

$pieGraph->Stroke();



?>
