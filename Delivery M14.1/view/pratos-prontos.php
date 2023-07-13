<?php
    require('../conect/conn.php');

    $stmt = $pdo->prepare('SELECT caminho, nome, calorias, valor from pratos');
    $stmt->execute();
    $imagens = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/pratos-prontos.css">
</head>
<script src="../JS/hotbar.js">
</script>
<body onload="exibirTrechoHTML()">
    <div id="hotbar">

    </div>

    <div class="content">
        <?php
        foreach($imagens as $imagem){
            $caminhoImagem = $imagem['caminho'];
            $nome = $imagem['nome'];
            $calorias = $imagem['calorias'];
            $valor = $imagem['valor'];
         echo   '<ol>
                <li>
                <a href="produtos.php?caminhoImagem=' . urlencode($caminhoImagem) . '">
                        <img src="../img/'.$caminhoImagem.'">
                        <label id="nome">Nome: '.$nome.'</label> 
                        <br>
                        <label id="calorias">Calorias: '.$calorias.'</label>
                        <br>
                        <label id="preco">R$: '.$valor.'</label>
                        <br>
                        <img id="seta"  src="../img/seta.png">
                    </a>
                </li>
                <hr>
            </ol>';
        };
        ?>
</div>
</body>
</html>