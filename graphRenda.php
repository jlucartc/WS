<?php

require_once 'pdo.php';

$empregado = $pdo->prepare("SELECT * FROM CLIENTES WHERE RENDA = 'Empregado' ");
$estudante = $pdo->prepare("SELECT * FROM CLIENTES WHERE RENDA = 'Estudante' ");
$desempregado = $pdo->prepare("SELECT * FROM CLIENTES WHERE RENDA = 'Desempregado' ");
$aposentado = $pdo->prepare("SELECT * FROM CLIENTES WHERE RENDA = 'Aposentado' ");

$empregado->execute();
$estudante->execute();
$desempregado->execute();
$aposentado->execute();

$empregado = $empregado->fetchAll();
$estudante = $estudante->fetchAll();
$desempregado = $desempregado->fetchAll();
$aposentado = $aposentado->fetchAll();

$clientesT = count($empregado) + count($estudante) + count($desempregado) + count($aposentado);

include("jpgraph/src/jpgraph.php");
include("jpgraph/src/jpgraph_pie.php");

$data = array(count($empregado),count($estudante),count($desempregado),count($aposentado));

$grafico = new PieGraph(500,500);
$grafico->SetShadow();

$grafico->title->Set('Clientes por renda: ');

// criar o gráfico de barras
$piePlot = new PiePlot($data);
$piePlot->setLegends(array('Empregados','Estudantes','Desempregados','Aposentados'));

// ajuste de cores
//$gBarras->SetShadow("darkblue");
// adicionar gráfico de barras ao gráfico
$grafico->Add($piePlot);

// imprimir gráfico
$grafico->Stroke();
?>
