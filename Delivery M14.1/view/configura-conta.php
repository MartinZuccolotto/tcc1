<?php
    require('../conect/protected.php');
    require('../conect/conn.php');

    $usuario=$pdo->prepare("SELECT * FROM usuario where idusuario = :idusuario");
    $usuario->execute(array(":idusuario"=> $_SESSION['idusuario']));

    $resultado = $usuario->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações Pessoais</title>
    <link rel="icon" href="../img/logo.png">
    <link rel="stylesheet" href="../css/inf-pessoais.css">
    <script src="../JS/hotbar.js"></script>
</head>
<body>
    <div id="hotbar"><script>exibirTrechoHTMLInf()</script></div>
    <div class="informacoes">
        <h2>Configurações de Conta</h2>
        <form action="../crud/update_usuario.php" method="post">
            <input type="hidden" name="idusuario" value='<?php echo $resultado[0]['idusuario']?>'>
            <input class="campos" type="text" name="email" placeholder='<?php echo $resultado[0]['email']?> '><br>
            <input class="campos" type="password" id="passwordField" name="senha" value='<?php echo $resultado[0]['senha']?>'><br>
            <button id="mostrar-senha"  type="button" onclick="togglePasswordVisibility()">Mostrar Senha</button><br>
            <input id="bnt" type="submit" value="SALVAR">
        </form>
        
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
</body>
</html>

</html>