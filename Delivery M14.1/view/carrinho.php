<?php
session_start();
require('../conect/protected.php');


if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

function atualizarQuantidade($produto, $quantidade)
{
    if ($quantidade < 1) {
        unset($_SESSION['carrinho'][$produto]);
    } else {
        $_SESSION['carrinho'][$produto]['quantidade'] = $quantidade;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['subtrair']) || isset($_POST['somar'])) {
        $produto = $_POST['produto'];

        if (isset($_SESSION['carrinho'][$produto])) {
            $quantidadeAtual = $_SESSION['carrinho'][$produto]['quantidade'];

            if (isset($_POST['subtrair'])) {
                atualizarQuantidade($produto, $quantidadeAtual - 1);
            } elseif (isset($_POST['somar'])) {
                atualizarQuantidade($produto, $quantidadeAtual + 1);
            }
        }
    }

    header('Location: carrinho.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
<link rel="stylesheet" href="../css/carrinho.css">
</style><link rel="stylesheet" href="../css/confirmar-pedidos.css">
</head>
<script src="../JS/hotbar.js"></script>
<body onload="exibirTrechoHTMLCart()">
<div id="hotbar"></div>
    <div class="container">
    </div>
    <div class="container">
        <h1>Carrinho de Compras</h1>
        <div class="carrinho-container">
            <div class="carrinho">
                <?php
                if (empty($_SESSION['carrinho'])) {
                    echo 'Carrinho vazio';
                } else {
                    $carrinhoTemp = [];
                    $totalGeral = 0;

                    foreach ($_SESSION['carrinho'] as $produto => $item) {
                        $nome = $item['nome'];
                        $preco = $item['valor'];
                        $quantidade = $item['quantidade'];

                        if (isset($carrinhoTemp[$produto])) {
                            $carrinhoTemp[$produto]['quantidade'] += $quantidade;
                        } else {
                            $carrinhoTemp[$produto] = $item;
                        }

                        $total = $preco * $quantidade;
                        $totalGeral += $total;

                        echo '<div class="item">
                            <div class="item-image">
                            <img src="../img/" alt="">
                            </div>
                            <div class="item-info">
                                <h3>' . $nome . '</h3>
                                <p>R$ ' . number_format($preco, 2, ',', '.') . '</p>
                                <form action="" method="post">
                                    <input type="hidden" name="produto" value="' . $produto . '">
                                    <button type="submit" name="subtrair">-</button>
                                    <span>' . $quantidade . '</span>
                                    <button type="submit" name="somar">+</button>
                                </form>
                                <p>Total: R$ ' . number_format($total, 2, ',', '.') . '</p>
                            </div>
                        </div>';
                    }

                    echo '<div class="total">
                        <label>Total Geral:</label>
                        <input value="' . number_format($totalGeral, 2, ',', '.') . '" readonly>
                    </div>';
                }
                ?>
            </div>
            <div class="resumo">
                <?php
                $subtotal = $totalGeral;
                $taxa = 10; // Exemplo de taxa de 10%
                $total = $subtotal + $taxa;

                echo '<label><span>Nome do Cliente:</span> John Doe</label>
                    <label><span>Subtotal:</span> R$ ' . number_format($subtotal, 2, ',', '.') . '</label>
                    <label><span>Taxa:</span> R$ ' . number_format($taxa, 2, ',', '.') . '</label>
                    <label><span>Total:</span> R$ ' . number_format($total, 2, ',', '.') . '</label>';
                ?>
            </div>
        </div>
        <a class="finalizar" href="confirmar_pedido.php">Finalizar pedido</a>
    </div>
</body>
</html>
