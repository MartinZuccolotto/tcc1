<?php
include('../conect/conn.php');

$caminhoImg = $_POST['img'];
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$valor = $_POST['valor'];
$calorias = $_POST['calorias'];
$carboidratos = $_POST['carboidratos'];
$proteinas = $_POST['proteinas'];
$gordura = $_POST['gordura'];
$sodio = $_POST['sodio'];

$img = $pdo->prepare('UPDATE pratos SET caminho = ?, nome = ?, descricao = ?, valor = ?, calorias = ?, carboidratos = ?, proteinas = ?, gordura = ?, sodio = ?');
$img->bindParam(1, $caminhoImg);
$img->bindParam(2, $nome);
$img->bindParam(3, $descricao);
$img->bindParam(4, $valor);
$img->bindParam(5, $calorias);
$img->bindParam(6, $carboidratos);
$img->bindParam(7, $proteinas);
$img->bindParam(8, $gordura);
$img->bindParam(9, $sodio);
$img->execute();
?>
