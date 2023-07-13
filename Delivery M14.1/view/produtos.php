<?php
session_start();
require('../conect/protected.php');
include('../conect/conn.php');

$img = $_GET['caminhoImagem'];

$stmt = $pdo->prepare('SELECT nome, calorias, carboidratos, proteinas, gordura, sodio, valor FROM pratos WHERE caminho = ?');
$stmt->execute([$img]);
$imagem = $stmt->fetch(PDO::FETCH_ASSOC);

// Função auxiliar para adicionar um produto ao carrinho
function adicionarProduto($produto, $preco)
{
    if (isset($_SESSION['carrinho'][$produto])) {
        // Se o produto já existe no carrinho, adiciona a quantidade
        $_SESSION['carrinho'][$produto]['quantidade'] += 1;
    } else {
        // Se o produto não existe no carrinho, adiciona como um novo item
        $_SESSION['carrinho'][$produto] = [
            'nome' => $produto,
            'valor' => $preco,
            'quantidade' => 1
        ];
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['adicionar'])) {
        $produto = $imagem['nome'];
        $preco = $imagem['valor'];

        adicionarProduto($produto, $preco);

        echo "<script>
        alert('Produto adicionado ao carrinho')
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/produto.css">
</head>
<script src="../JS/hotbar.js"></script>
<body onload="exibirTrechoHTML()">
    <div id="hotbar">
    </div>
    <div style="height:735px">
        <img class="img" src="../img/<?php echo $img; ?>" alt="Imagem do Produto">
        <p class="nome letras"><?php echo $imagem['nome']; ?></p>
        <p class="tb_nutri letras">Tabela Nutricional (300g )</p>
        <p class="cal letras">Calorias: <?php echo $imagem['calorias']; ?></p>
        <p class="cal letras">Carboidratos: <?php echo $imagem['carboidratos']; ?></p>
        <p class="cal letras">Proteinas: <?php echo $imagem['proteinas']; ?></p>
        <p class="cal letras">Gordura: <?php echo $imagem['gordura']; ?></p>
        <p class="cal letras">Sodio: <?php echo $imagem['sodio']; ?></p>
        <p class="cal letras">Valor R$: <?php echo $imagem['valor']; ?></p>
            <div>
            <form action="" method="post">
                <input type="hidden" name="produto" value="<?php echo htmlspecialchars($imagem['nome']); ?>">
                <button class="add_carrinho letras" type="submit" name="adicionar">Adicionar ao carrinho </button>
                
            </form>
        </div>
    </div>
    
</body>
</html>