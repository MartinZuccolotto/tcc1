<?php

if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['cargo']) || $_SESSION['cargo'] !== 'funcionario') {
    die('VOCÊ NÃO PODE ACESSAR ESSA PÁGINA, PORQUE NÃO ESTÁ LOGADO COMO FUNCIONÁRIO!<p><a href="login.php" class="">ENTRAR</a></p>');
}

?>
