<?php
    include("../conect/conn.php");

    if (isset($_POST['senha'], $_POST['idusuario'])) {
        $senha = $_POST['senha'];
        $idusuario = $_POST['idusuario'];

        $update_usuario = $pdo->prepare('UPDATE usuario SET senha = ? WHERE idusuario = ?');

        $update_usuario->execute([$senha, $idusuario]);

        
        if ($update_usuario->rowCount() > 0) {
            header("Location: configura-conta.php");
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
