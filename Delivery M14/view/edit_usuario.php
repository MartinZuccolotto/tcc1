<?php
    include('../conect/protectedFuncionario.php');
    require ("../conect/conn.php");

    if (isset($_GET['idusuario'])){
        $idusuario = $_GET['idusuario'];
    }
        else{
            header("Location: index.php");
    }

    $tabela = $pdo->prepare("SELECT * FROM usuario WHERE idusuario=:idusuario;");

    $tabela->execute(array(':idusuario'=>$idusuario));
    $rowTable = $tabela->fetchAll();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
</head>
<body>
    <div>
        <form action="../crud/update_usuario.php" method="post">
            <input type="text" value='<?php echo $rowTable[0]['nome'] ?>' readonly>
            <input type="text" value='<?php echo $rowTable[0]['email'] ?>' readonly>
            <input type="text" value='<?php echo $rowTable[0]['endereco'] ?>' readonly>
            <input type="text" name='cargo' value='<?php echo $rowTable[0]['cargo'] ?>'>
            <input type="hidden" name='idusuario' value=<?php echo $rowTable[0]['idusuario']?>>
            <input type="submit" values="ENVIAR ALTERAÇÕES">
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
</body>
</html>