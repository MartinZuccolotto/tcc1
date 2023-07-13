<?php
    include("../conect/conn.php");

    $cargoUsuario = 'usuario';
    $cargoFuncionario = 'funcionario';

    if (isset($_POST['idusuario'],$_POST['cargo'])) {
        $idusuario = $_POST['idusuario'];
        $cargo = $_POST['cargo'];

        $update_usuario = $pdo->prepare('UPDATE usuario SET cargo = ? WHERE idusuario = ?');
        $update_usuario->bindParam(1, $cargo);
        $update_usuario->bindParam(2, $idusuario);
        $update_usuario->execute();

        
        if ($update_usuario->rowCount() > 0) {
            header("Location: ../view/listarUsuarios.php");
            exit();
        } else {
            echo 'Não foi possivel';
            exit();
        }
        
    } else {
        echo 'falta dados';
        exit();
    }
?>
