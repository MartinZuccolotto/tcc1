<?php
    include('../conect/protected.php');
    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/inicio.css">
</head>
<script src="../JS/hotbar.js"></script>
<body onload="exibirTrechoHTML()">
        <div id="hotbar"></div>
            <div>
                <a style="top: 199px; left: 381px" class="quadrado" href="pratos-prontos.php">
                    <img class="pratos-pront" src="../img/pratos-pront.png" alt="">
                    <p style="top:120px; left:-217px;" class="letras-prods">PRATOS PRONTOS</p>
                </a>
            </div>
            <div style="height:0px">
                <a style="top: -176px; left: 1174px" class="quadrado" href="sucos.php">
                    <img class="sucos" src="../img/sucos.png" alt="">
                    <p style="top:120px; left:-90px;" class="letras-prods">SUCOS</p>
                </a>
            </div>
        </div>
    </div>
</body>
</html>
