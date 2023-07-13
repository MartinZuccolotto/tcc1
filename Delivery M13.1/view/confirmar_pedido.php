<?php

include('../conect/conn.php');
include('../conect/protected.php');

if (isset($_SESSION['idusuario'])){
    $idusuario = $_SESSION['idusuario'];
} else {
    header("Location: index.php");
}

$tabela = $pdo->prepare("SELECT * FROM usuario WHERE idusuario=:idusuario;");
$tabela->execute(array(':idusuario'=>$idusuario));
$rowTable = $tabela->fetchAll();

if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <style>
        * {
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            line-height: 1.5;
            margin: 0;
            padding: 0;
        }
        
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f9f9f9;
        }
        
        .cart-container {
            max-width: 400px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        
        .cart-header {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }
        
        .form-container {
            margin-top: 20px;
        }
        
        .form-label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        .form-input {
            width: 100%;
            height: 40px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 14px;
        }
        
        .form-select {
            width: 100%;
            height: 40px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 14px;
        }
        
        .form-total {
            margin-top: 20px;
            font-weight: bold;
        }
        
        .submit-button {
            width: 100%;
            height: 40px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 3px;
            font-size: 16px;
            cursor: pointer;
        }
        
        .submit-button:hover {
            background-color: #45a049;
        }
    </style><link rel="stylesheet" href="../css/confirmar-pedidos.css">
</head>
<script src="../JS/hotbar.js"></script>
<body onload="exibirTrechoHTMLPed()">
<div id="hotbar"></div>
    <div class="container">
        <?php
        if (empty($_SESSION['carrinho'])) {
            echo '<div class="cart-container">';
            echo '<h2 class="cart-header">Carrinho vazio</h2>';
            echo '</div>';
        } else {
            // Criar um array temporário para armazenar as quantidades somadas dos produtos
            $carrinhoTemp = [];

            $totalCarrinho = 0;

            foreach ($_SESSION['carrinho'] as $produto => $item) {
                $nome = $item['nome'];
                $preco = $item['valor'];
                $quantidade = $item['quantidade'];
                $total = $preco * $quantidade;

                $totalCarrinho += $total;
            }

            // Taxa de entrega e Total Geral
            $taxaEntrega = 10.00; // Exemplo de taxa de entrega fixa
            $totalGeral = $totalCarrinho + $taxaEntrega;

            echo '<div class="cart-container">';
            echo '<h2 class="cart-header">Finalizar Pedido</h2>';
            echo '<form action="../crud/cad-pedidos.php" method="post" class="form-container">';
            echo '<div>';
            echo '<label for="endereco" class="form-label">Endereço de Entrega:</label>';
            echo '<input class="form-input" type="text" name="endereco" id="endereco" value="'.$rowTable[0]['endereco'].'" required>';
            echo '</div>';
            echo '<div>';
            echo '<label for="forma_pagamento" class="form-label">Forma de Pagamento:</label>';
            echo '<select name="forma_pagamento" id="forma_pagamento" class="form-select" required>';
            echo '<option value="cartao">Cartão de Crédito</option>';
            echo '<option value="boleto">Boleto Bancário</option>';
            echo '<option value="pix">PIX</option>';
            echo '</select>';
            echo '</div>';
            echo '<div>';
            echo '<p class="form-total">Total do Carrinho: R$ ' . number_format($totalCarrinho, 2, ',', '.') . '</p>';
            echo '<p class="form-total">Taxa de Entrega: R$ ' . number_format($taxaEntrega, 2, ',', '.') . '</p>';
            echo '<p class="form-total">Total Geral: R$ ' . number_format($totalGeral, 2, ',', '.') . '</p>';
            echo '<input type="hidden" name="cliente" value="'.$rowTable[0]['idusuario'].'">';
            echo '<input type="hidden" name="valor" value="'.$totalGeral.'">';
            echo '</div>';
            echo '<button type="submit" name="finalizar_pedido" class="submit-button">Finalizar Pedido</button>';
            echo '</form>';
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>