<?php
include('../conect/conn.php');

$caminhoImg = $_POST['img'];
$nome = $_POST['nome'];
$valor = $_POST['valor'];
$carboidratos = $_POST['carboidratos'];
$vitaminas = $_POST['vitaminas'];
$minerais = $_POST['minerais'];

$img = $pdo->prepare('INSERT INTO sucos (caminho, nome, valor, carboidratos, vitaminas, minerais) VALUES (?, ?, ?, ?, ?, ?)');
    $img->bindParam(1, $caminhoImg);
    $img->bindParam(2, $nome);
    $img->bindParam(3, $valor);
    $img->bindParam(4, $carboidratos);
    $img->bindParam(5, $vitaminas);
    $img->bindParam(6, $minerais);
    $img->execute();
    echo "<script>
        alert('Suco cadastrado')
        </script>";
?>