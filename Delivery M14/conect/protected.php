<?php

if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['idusuario'])) {
    die('VOCÊ NÃO PODE ACESSAR ESSA PÁGINA, PORQUE NÃO ESTÁ LOGADO!<p><a href="../view/login.php" class="">ENTRAR</a></p>');
}

?>
