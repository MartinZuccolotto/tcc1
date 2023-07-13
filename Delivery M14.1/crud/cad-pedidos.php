<?php

    include("../conect/conn.php");

    $cliente = $_POST['cliente'];
    $valor = $_POST['valor'];
    $endereco = $_POST['endereco'];

    $ped = $pdo->prepare('INSERT INTO pedidos (cliente, valor, endereco) values (?, ?, ?)');
    $ped->bindParam(1, $cliente);
    $ped->bindParam(2, $valor);
    $ped->bindParam(3, $endereco);
    $ped->execute();
?>